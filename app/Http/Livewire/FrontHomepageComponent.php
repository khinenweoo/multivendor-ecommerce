<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use App\Models\Product;
use App\Models\Shop;
use Carbon\Carbon;
use Cart;

class FrontHomepageComponent extends Component
{

    public $qty;
    public $attributes = [];

    public function mount()
    {
        $this->qty = 1;
    }

    public function render()
    {
                //Get Featured Categories
                $featuredCategories = Category::where('is_featured',1)->limit(12)->orderBy('id','DESC')->get();

                //Get Hot Deal Stores
                $active_stores = Shop::where('is_active', 1)->inRandomOrder()->get()->take(10);
        
                // Get Featured Stores which are active and not beyond expiry date
                $current_time = Carbon::now();
                $query = DB::table('shops');
                $query->where('is_active', '=', 1);
                $query->where('featured_expiry_date', '>', $current_time);
                $featured_stores = $query->get();
        
                //Get parent Categories
                $categories = Category::whereNull('parent_id')->get();
        
                //Get Latest Products
                // $new_products = Product::orderBy('created_at','DESC')->get()->take(20);
                $new_products = Product::where(['conditions' => 'new', 'status' => 'active'])->limit(20)->get();
        
                //Trending Products
                $trending_products = Product::where(['conditions' => 'popular', 'status'=> 'active'])->limit(20)->get();
        
                //Recommended Products
                $recommend_products = Product::where(['conditions' => 'recommend', 'status'=> 'active'])->limit(20)->get();
        
                //Default Products for top ranked section
                $default_products = Product::where('status', 'active')->limit(20)->get();

        return view('livewire.front-homepage-component', [
            'categories' => $categories,
            'featured_categories' => $featuredCategories,
            'featured_stores' => $featured_stores,
            'new_products' => $new_products,
            'trending_products' => $trending_products,
            'recommend_products' => $recommend_products,
            'default_products' => $default_products
        ])->layout("layouts.base");
    }

    /**
     * Add Product to Shopping Cart
     *
     * @param Type $prduct_id,$product_name,$product_price 
     * @return view
     **/
    public function addtocart($product_id, $product_name, $product_price)
    {
        $attributes= ' ';
        $attr_values = array_values($this->attributes);
        // $attributes = implode(', ', $attr_values);

        Cart::add(['id' => $product_id, 'name' => '$product_name', 'qty' => $this->qty, 'price' => $product_price, 
            'options' => [
                'attr' => $attr_values
            ]
        ])->associate('App\Models\Product');

        $this->emitTo( 'sticky-cart-value-component','cartvalue-refresh');
        $this->emitTo('cart-count-component', 'refreshComponent');

        session()->flash('message', 'Added product to cart successfully!');
        return redirect()->back();
    }

    public function increaseQuantity($rowId)
    {
        $cart_item = Cart::get($rowId);
        $qty = $cart_item->qty + 1;
        Cart::update($rowId, $qty);
        $this->emitTo('cart-count-component', 'refreshComponent');
        $this->emitTo( 'sticky-cart-value-component','cartvalue-refresh');
    }

    public function decreaseQuantity($rowId)
    {
        $cart_item = Cart::get($rowId);
        $qty = $cart_item->qty - 1;
        Cart::update($rowId, $qty); 
        $this->emitTo('cart-count-component', 'refreshComponent');
        $this->emitTo( 'sticky-cart-value-component','cartvalue-refresh');
    }

    public function destroy($rowId)
    {
        Cart::remove($rowId);
        $this->emitTo('cart-count-component', 'refreshComponent');
        $this->emitTo( 'sticky-cart-value-component','cartvalue-refresh');
        session()->flash('message', 'Cart item has been removed.');
    }

}
