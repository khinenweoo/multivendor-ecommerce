<?php

namespace App\Http\Livewire\Seller;

use Livewire\Component;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;
use Carbon\Carbon;

class EditProductComponent extends Component
{
    use WithFileUploads;
    
    protected $product;
    public $name, $slug, $sku, $short_description, $image, $video, $stock_status;
    public $quantity, $weight, $price, $discount, $description, $conditions, $status;
    public $sale_price;
    public $newimage;
    public $newvideo;
    public $product_id;
    public $category_id;
    public $brand_id;
    public $seller_id;
    public $added_by;
 
    public $selectedChildcategory;

    public function mount($slug) {
        $product = Product::where('product_slug', $slug)->first();
        $this->product_id = $product->product_id;  
        $this->seller_id = $product->seller_id;
        $this->category_id = $product->category_id;
        $this->brand_id = $product->brand_id;
        $this->name = $product->product_name;
        $this->slug = $product->product_slug;
        $this->sku = $product->sku;
        $this->short_description = $product->short_description;
        $this->image = $product->product_image;
        $this->video = $product->product_video;
        $this->stock_status = $product->stock_status;
        $this->quantity = $product->quantity;
        $this->weight = $product->weight;
        $this->price = $product->price;
        $this->discount = $product->discount;
        $this->description = $product->description;
        $this->conditions = $product->conditions;
        $this->status = $product->status;
        $this->added_by = 'seller';

    }
    public function render()
    {
        $product = $this->product;
        $parent_categories = Category::whereNull('parent_id')->get();
        $categories = Category::all();
        $brands = Brand::all();

        return view('livewire.seller.edit-product-component',  ['product'=> $product ,'parent_categories' => $parent_categories,'categories' => $categories, 'brands'=>$brands]);
    }

    public function generateSlug()
    {
        $this->slug = Str::slug($this->name);
    }

    public function videoUpload($newvideo)
    {
        $video_name = Str::random(20);
        $extension = strtolower($newvideo->getClientOriginalExtension());
        $videoFullName = $video_name.'.'.$extension;
        $this->newvideo->storeAs('prod_videos', $videoFullName, 'public');

        return $videoFullName;
    }

    public function updateProduct()
    {
    
        $this->validate([
            'selectedChildcategory' => 'nullable',
            'brand_id' => 'nullable',
            'name' => 'required',
            'slug' => 'required',
            'sku' => 'required',
            'short_description' => 'string|min:10|max:400',
            'newimage' => 'nullable',
            'newvideo' => 'nullable',
            'stock_status' => 'nullable',
            'quantity' => 'required|integer|min:1',
            'weight' => 'string|nullable',
            'price' => 'numeric',
            'discount' => 'numeric',
            'description' => 'string',
            'conditions' => 'nullable',
            'status' => 'required',
        ]);


        if($this->discount > 0 && $this->discount <= 80) {
            $this->sale_price = $this->price-(($this->price*$this->discount)/100);
        }else {
            $this->sale_price = 0.00;
        }
    
        if($this->newimage) {
               
            $image_name = Str::random(10);
           
            $ext = strtolower($this->newimage->getClientOriginalExtension());
            
            $imageFullName = $image_name.'.'.$ext;

            $this->newimage->storeAs('products', $imageFullName, 'public');
        }else {
            $imageFullName = $this->image;
        }
        if($this->newvideo) {
            // video save
            $video_FullName = $this->videoUpload($this->newvideo);
        }else {
            $video_FullName = $this->video;
        }
     
        $data = array(
            'category_id' => $this->category_id,
            'brand_id' => $this->brand_id,
            'seller_id' => $this->seller_id,
            'product_name' => $this->name,
            'product_slug' => $this->slug,
            'sku' => $this->sku,
            'short_description' => $this->short_description,
            'product_image' => $imageFullName,
            'product_video' => $video_FullName,
            'stock_status' => $this->stock_status,
            'quantity' => $this->quantity,
            'weight' => $this->weight,
            'price' => $this->price,
            'discount' => $this->discount,
            'sale_price' => $this->sale_price,
            'description' => $this->description,
            'conditions' => $this->conditions,
            'status' => $this->status,
            'added_by' => $this->added_by,
        );


        $updateproduct = Product::updateOrCreate(['product_id' => $this->product_id], $data);        
        session()->flash('message', 'Product has been updated successfully!');
        $this->resetInput();
        // return view('livewire.admin.product-component');
        return redirect()->route('seller.products');

    }

    private function resetInput()
    {
        $this->name = null;
        $this->slug = null;
        $this->sku = null;
        $this->short_description = null;
        $this->category_id = null;
        $this->quantity = null;
        $this->weight = null;
        $this->price = null;
        $this->discount = null;
        $this->description = null;
        $this->conditions = null;
        $this->status = null;
    }
}
