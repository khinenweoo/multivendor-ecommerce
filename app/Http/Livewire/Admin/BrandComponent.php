<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\Brand;
use Illuminate\Support\Str;

class BrandComponent extends Component
{
    use WithPagination;
    use WithFileUploads;
    public $perPage = 10;
    public $search = '';
    public $orderBy = 'brand_id';
    public $orderAsc = 'asc';

    public $brand_name, $brand_slug, $brand_description, $brand_image, $status;
    public $brand_id;
    public $updatedLogo = null;
    public $editModal = false;
    public $deleteId;


    protected $brands;

    public function render()
    {
        $this->fetchBrands();
        return view('livewire.admin.brand-component', ['brands' => $this->brands]);
    }

    public function generateslug()
    {
        $this->brand_slug = Str::slug($this->brand_name);
    }

    public function fetchBrands() 
    {
        $brands = Brand::search($this->search)
        ->orderBy($this->orderBy, $this->orderAsc)
        ->simplePaginate($this->perPage);
        $this->brands = $brands;
    }
    
    /**
     *  Store the Brand resource in storage.
     * @param 
     * @return JsonResponse|RedirectResponse
     * @throws ValidationException
     */
    public function store()
    {
        $this->validate([
            'brand_name' => 'string|required',
            'brand_slug' => 'required|unique:brands,brand_slug',
            'brand_image' => 'image|mimes:png,jpg,jpeg',
            'brand_description' => 'string|nullable',
            'status' => 'required|in:active,inactive',
        ]);
      
        $brand = new Brand();
        $brand->brand_name = $this->brand_name;
        $brand->brand_slug = $this->brand_slug;

        // image save
        if(isset($this->brand_image)){
            $imageFullName = $this->imageUpload();
            $brand->brand_image = $imageFullName;
        }else {
            $brand->brand_image = 'noimage.jpg';
        }

        $brand->brand_description = $this->brand_description;
        $brand->status = $this->status;
        $brand->save();

        session()->flash('message', 'A new brand has been added successfully!');
        $this->resetInput();
        $this->emit('brandStore'); // Close model to using to jquery by adding js in app layout
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $brand = Brand::where('brand_id', $id)->first();
        $this->brand_id = $id;
        $this->brand_name = $brand->brand_name;
        $this->brand_slug = $brand->brand_slug;
        $this->brand_image = $brand->brand_image;
        $this->brand_description = $brand->brand_description;
        $this->status = $brand->status;
        $this->editModal = true;
    }

    /**
     * Update the Brand resource in storage.
     *
     * @param BrandUpdateRequest $request
     * @param int $id
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function update() {
        $validatedData = $this->validate([
            'brand_name' => 'string|required',
            'brand_slug' => 'required',
            'updatedLogo' => 'nullable',
            'brand_description' => 'string|nullable',
            'status' => 'required|in:active,inactive',
        ]);

        if($this->updatedLogo) {
            $filename =  $this->imageNewUpload();
        }else {
            $filename = $validatedData['brand_image'];
        }

        $data = array(
            'brand_name' => $this->brand_name,
            'brand_slug' => $this->brand_slug,
            'brand_image' => $filename,
            'brand_description' => $this->brand_description,
            'status' => $this->status,
        );

        $updateBrand = Brand::updateOrCreate(['brand_id' => $this->brand_id], $data);

        if($updateBrand){
            $this->resetUpdateInput();
            session()->flash('message', 'Brand Updated Successfully.');
            $this->editModal = false;
        }else {
            return redirect()->back();
            session()->flash('message', 'Updating Failed');
        }

    }


    /**
     * Brand Image Upload
     *
     * @return string
     **/
    public function imageUpload()
    {
        $image_name = Str::random(20);
        $extension = strtolower($this->brand_image->getClientOriginalExtension());
        $imageFullName = $image_name.'.'.$extension;
        $this->brand_image->storeAs('brands', $imageFullName, 'public');

        return $imageFullName;
    }

    /**
     * Brand New Image Uploaded
     *
     * @return string
     **/
    public function imageNewUpload()
    {
        $image_name = Str::random(20);
        $extension = strtolower($this->updatedLogo->getClientOriginalExtension());
        $updateFileName = $image_name.'.'.$extension;
        $this->updatedLogo->storeAs('brands', $updateFileName, 'public');

        return $updateFileName;
    }

    private function resetInput()
    {
        $this->brand_name = null;
        $this->brand_slug = null;
        $this->brand_image =null;
        $this->brand_description =null;
        $this->status = null;
    }
    private function resetUpdateInput()
    {
        $this->brand_name = null;
        $this->brand_slug = null;
        $this->brand_image =null;
        $this->updatedLogo = null;
        $this->brand_description =null;
        $this->status = null;
    }

    public function cancel()
    {
        $this->editModal = false;
        $this->resetUpdateInput();
    }

    /**
     * Remove the brand from storage.
     * @param int $id
     * 
     */
    public function confirmDelete($id)
    {
        $this->deleteId = $id;
    }

    public function delete()
    {
        if ($this->deleteId) {
            Brand::find($this->deleteId)->delete();
            session()->flash('message', 'Brand Deleted Successfully.');
        }
    }
}
