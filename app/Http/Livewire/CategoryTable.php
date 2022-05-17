<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CategoryTable extends Component
{
    use WithPagination;
    use WithFileUploads;

    protected $categories;

    public $perPage = 10;
    public $search = '';
    public $orderBy = 'id';
    public $orderAsc = 'asc';

    public $parent_id, $name, $slug, $description, $category_image, $is_featured, $category_id;
    public $updatedImage = null;
    public $editModal = false;
    public $deleteId;

    public $subcategories= null;//belongs to selected category

    public $category = null;
    public $subcategory = null;

    public function render()
    {
        $this->fetchCategories();
        $parents = Category::whereNull('parent_id')->get();
    
        return view('livewire.category', [
            'categories' => $this->categories,
            'parents' => $parents,

        ]);
    }

    public function mount($subcategory = null)
    {
        $this->categories = Category::all();
        $this->subcategories = collect();
    }

    public function updatedCategory($value)
    {
        $this->subcategories = Category::where('parent_id', $value)->get();
        // $this->subcategory = null;
    }

    public function fetchCategories() 
    {
        $categories = Category::searchData($this->search)
        ->orderBy($this->orderBy, $this->orderAsc)
        ->simplePaginate($this->perPage);
        $this->categories = $categories;
    }

    private function resetInput()
    {
        $this->category = null;
        $this->subcategory = null;
        $this->name = null;
        $this->slug = null;
        $this->is_featured =null;
        $this->description = null;
        $this->category_image = null;
        $this->updatedImage = null;
    }

    public function store()
    {
        $this->validate([
            'parent_id' => 'nullable',
            'name' => 'string|required',
            'slug' => 'required|unique:categories,slug',
            'category_image' => 'image',
            'description' => 'string|nullable',
            'is_featured' => 'sometimes|in:1,0',
        ]);
      
        $category = new Category();

        if($this->subcategory){
            $category->parent_id = $this->subcategory;
        }else{
            $category->parent_id = $this->category;
        }

        $category->name = $this->name;
        $category->slug = $this->slug;
        $category->category_image = $this->category_image->store('categories', 'public');
        $category->is_featured = $this->is_featured;
        $category->description = $this->description;
        $category->save();

        session()->flash('message', 'Category has been added successfully!');
        $this->resetInput();
        $this->emit('categoryStore'); // Close model to using to jquery
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $category = Category::where('id', $id)->first();
        $this->category_id = $id;
        $this->name = $category->name;
        $this->slug = $category->slug;
        $this->parent_id = $category->parent_id;
        $this->category_image = $category->category_image;
        $this->description = $category->description;
        $this->is_featured = $category->is_featured;
        $this->editModal = true;
    }

    /**
     * Update the Category resource in storage.
     *
     * @param int $id
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function update()
    {

     
        if($this->category_id) {
            $category = Category::find($this->category_id);

            if($this->updatedImage) {

                $image_name = Str::random(6);
           
                $ext = strtolower($this->updatedImage->getClientOriginalExtension());
                
                $newImageName = $image_name.'.'.$ext;
                   
                $filename = $this->updatedImage->storeAs('categories', $newImageName, 'public');

            }else {
                $filename = $category->category_image;
            }

            $category->update([
                'parent_id' => $this->parent_id,
                'name' => $this->name,
                'slug' => $this->slug,
                'category_image' => $filename,
                'is_featured' => $this->is_featured,
                'description' => $this->description,
            ]);

            session()->flash('message', 'Category Updated Successfully.');
            $this->resetInput();
            $this->editModal = false;
        }
    }
  
    public function cancel()
    {
        $this->editModal = false;
        $this->resetInput();
    }

    public function confirmDelete($id)
    {
        $this->deleteId = $id;
    }

    public function delete()
    {
        if ($this->deleteId) {
            Category::find($this->deleteId)->delete();
            session()->flash('message', 'Category Deleted Successfully.');
        }
    }

}
