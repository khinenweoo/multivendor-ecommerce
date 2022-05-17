<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;

class AddProductComponent extends Component
{

    use WithFileUploads;
    public $perPage = 10;
    public $search = '';
    public $orderBy = 'product_id';
    public $orderAsc = 'asc';

    public $name, $slug, $sku, $short_description, $image, $video, $stock_status;
    public $quantity, $weight, $price, $discount, $description, $conditions, $status;
    public $category_id;
    public $brand_id;
    public $sale_price;
    public $route;
    public $added_by;

    public $categories;
    public $subcategories;
    public $childcategories;

    public $category;
    public $subcategory;
    public $childcategory;

    public function mount()
    {
        $this->added_by = 'admin';
        $this->categories = Category::all();
        $this->subcategories = collect();
        $this->childcategories = collect();
        $this->route = url()->previous();
    }

    public function generateslug()
    {
        $this->slug = Str::slug($this->name);
    }

    public function updatedCategory($value)
    {
        $this->subcategories = Category::where('parent_id', $value)->get();
        $this->subcategory = null;
    }

    public function updatedSubcategory($value)
    {
        if(!is_null($value)){
            $this->childcategories = Category::where('parent_id', $value)->get();
        }
    }
    
    public function storeProduct()
    { 

        $validateData = $this->validate([
            'name' => 'required',
            'slug' => 'required|unique:products,product_slug',
            'sku' => 'required',
            'short_description' => 'string|min:10|max:100',
            'childcategory' => 'required|exists:categories,id',
            'brand_id' => 'required|exists:brands,brand_id',
            'image' => 'required|image|mimes:png,jpg,jpeg',
            'video' => 'nullable',
            'stock_status' => 'nullable|in:0,1',
            'quantity' => 'required|integer|min:1',
            'weight' => 'string|nullable',
            'price' => 'numeric',
            'discount' => 'numeric|nullable|max:80',
            'description' => 'string',
            'conditions' => 'required|in:new,popular,recommend',
            'status' => 'required'
        ]);

        if(isset($validateData)){
            if($this->discount > 0 && $this->discount <= 80) {
                $this->sale_price = $this->price-(($this->price*$this->discount)/100);
            }else {
                $this->sale_price = 0.00;
            }
         
            $product = new Product();
            $product->product_name = $this->name;
            $product->product_slug = $this->slug;
            $product->sku = $this->sku;
            $product->short_description = $this->short_description;
            $product->category_id = $this->childcategory;
            $product->brand_id = $this->brand_id;
    
            $image_name = Str::random(20);
            $ext = strtolower($this->image->getClientOriginalExtension()); // You can use also getClientOriginalName()
            $imageFullName = $image_name.'.'.$ext;
    
            $this->image->storeAs('products', $imageFullName, 'public');
            // $this->image->move(public_path('products'), $imageFullName);
            $product->product_image = $imageFullName;
    
            // video save
            if(isset($this->video)){
                $video_FullName = $this->videoUpload();
                $product->product_video = $video_FullName;
            }else {
                $product->product_video = 'null';
            }
            // stock status
            if($this->stock_status == 1){
                $product->stock_status = "instock";
            }else {
                $product->stock_status = "out of stock";
            }
    
            $product->quantity = $this->quantity;
            $product->weight = $this->weight;
            $product->price = $this->price;
            $product->sale_price = $this->sale_price;
            $product->discount = $this->discount;
            $product->description = $this->description;
            $product->conditions = $this->conditions;
            $product->status = $this->status;
            $product->save();
    
            toastr()->success('Product has been added successfully!');
    
            $this->resetInput();
            return redirect()->route('admin.products');
        }
       
    }

    public function render()
    {
        $parent_categories = Category::whereNull('parent_id')->get();
        $categories = Category::all();

        $brands = Brand::all();
        $products = Product::with('attributes')->get();

        return view('livewire.admin.add-product-component', ['parent_categories' => $parent_categories,'categories' => $categories, 'brands' => $brands, 'products' => $products]);
    }

    public function videoUpload()
    {
        $video_name = Str::random(20);
        $extension = strtolower($this->video->getClientOriginalExtension());
        $videoFullName = $video_name.'.'.$extension;
        $this->video->storeAs('prod_videos', $videoFullName, 'public');

        return $videoFullName;
    }

    private function resetInput()
    {
        $this->name = null;
        $this->slug = null;
        $this->sku = null;
        $this->short_description = null;
        $this->image =null;
        $this->video =null;
        $this->stock_status =null;
        $this->quantity =null;
        $this->weight =null;
        $this->price = null;
        $this->sale_price = null;
        $this->description = null;
        $this->image = null;
        $this->video = null;
        $this->category_id = null;
        $this->brand_id = null;
        $this->conditions = null;
    }
}
