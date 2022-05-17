<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;

class CategoryLevelSelect extends Component
{
    public $selectedCategory = null;
    public $selectedSubcategory = null;
    public $selectedChildcategory = null;

    public $categories;
    public $subcategories= null;//belongs to selected category
    public $childcategories= null;//belongs to selected subcategory

    public function mount($selectedChildcategory = null)
    {
        $this->categories = Category::all();
        $this->subcategories = collect();
        $this->childcategories = collect();
        $this->selectedChildcategory = $selectedChildcategory;

        if(!is_null($selectedChildcategory)) {
            $childcategory =  Category::with('parent')->find($selectedChildcategory);

            if($childcategory) {

               $this->childcategories = Category::where('parent_id', $childcategory->parent_id)->get();
                $this->subcategories = Category::where('parent_id', $childcategory->parent->parent_id)->get();
                
                $this->selectedCategory = $childcategory->parent->parent_id;
                $this->selectedSubcategory =  $childcategory->parent_id;
            }
        }
    }

    public function render()
    {
        $parent_categories = Category::whereNull('parent_id')->get();
        $categories = Category::all();

        return view('livewire.category-level-select',  ['parent_categories' => $parent_categories,'categories' => $categories]);
    }

    public function updatedSelectedCategory($parent_id)
    {
        $this->subcategories = Category::where('parent_id', $parent_id)->get();
        $this->subcategory = NULL;
    }

    public function updatedSelectedSubcategory($subcategory)
    {
        if(!is_null($subcategory)) {
            $this->childcategories = Category::where('parent_id', $subcategory)->get();
        }
    }

}
