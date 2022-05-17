<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\AttributeController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ShopController;
use App\Http\Livewire\Admin\EditProductComponent;

use App\Http\Controllers\Front\AccountController;
use App\Http\Controllers\Front\StoreController;
use App\Http\Controllers\Front\CheckoutController;
use App\Http\Controllers\Front\PurchaseController;

use App\Http\Controllers\Seller\SellerAuthController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => 'web'], function() {

    /** FRONT ROUTES */
    Route::get('/', 'App\Http\Livewire\FrontHomepageComponent')->name('home');
    Route::get('/demo', 'App\Http\Livewire\FrontDemopageComponent')->name('demopage');

    /** LISTS, CATEGORY PRODUCT */
    Route::get('/shop', 'App\Http\Livewire\Front\ShopComponent')->name('shop.products');
    //filter by category
    Route::get('/shop/{category_slug}', 'App\Http\Livewire\Front\CategoryComponent')->name('category.products');
    //filter by brand
    Route::get('/shop/brands/{brand_slug}', 'App\Http\Livewire\Front\BrandComponent')->name('brand.products');

    // Product Detail Page
    Route::get('/shop/product-detail/{product_slug}', 'App\Http\Livewire\ProductDetailComponent')->name('product.detail');

    // Cart Page
    Route::get('/cart', 'App\Http\Livewire\CartComponent')->name('product.cart');
    Route::get('/sidebarcart', 'App\Http\Livewire\SidebarCartComponent')->name('shoppingcart');

    // Local Market Page
    Route::get('/vendors/farmermarket', [StoreController::class, 'listShops'])->name('farmermarket');
    /** STORE ROUTES */
    Route::prefix('vendor-shop')->name('vendor-shop.')->group(function() {
        Route::get('/list',  [StoreController::class, 'list'])->name('list');
        Route::get('/home/{shop_slug}', 'App\Http\Livewire\Front\ShopHomepageComponent')->name('home');
        Route::get('/profile', [StoreController::class, 'profile'])->name('profile');
        Route::get('/products', [StoreController::class, 'products'])->name('products');
    });
    
    /** ERROR Page */
    // fallback method redirect user to 404 page if they hit unknown url 
    Route::fallback(function() {
        return view("errors.404");
    });

});



Route::get('/sell', function () {
    return view('sell');
})->name('becomeseller');

Route::get('/blogs', function () {
    return view('blogs');
})->name('blogs');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/aboutus', function () {
    return view('about');
})->name('about');


require __DIR__.'/auth.php';

//Admin Routes
Route::prefix('admin')->middleware('theme:admin')->name('admin.')->group(function () {

    Route::middleware(['guest:admin'])->group(function() {
        //Login View Routes
        Route::view('/login', 'auth.login')->name('login');
        Route::view('/register', 'auth.register')->name('register');
        //Login Auth check
        Route::post('/login', [AuthController::class, 'check']);
        //Register route
        Route::post('/create', [AuthController::class, 'create'])->name('create');
    });

    Route::middleware(['auth:admin'])->group(function() {
        Route::post('/logout', [AuthController::class, 'destroy'])->name('logout');

        /*---------------ACCOUNT------------------*/
        // Route::view('/home', 'home')->name('home');

        /*---------------DASHBOARD------------------*/
        Route::get('/home', [DashboardController::class, 'index'])->name('home');

        /*--------------- CATEGORIES ------------------*/
        Route::get('/categories', [CategoryController::class, 'index'])->name('categories');

        /*--------------- BRANDS ------------------*/
        Route::get('/brands', [BrandController::class, 'index'])->name('brands');

        /*--------------- PRODUCTS ------------------*/
        Route::get('/products', [ProductController::class, 'index'])->name('products');
        Route::get('/product/add', [ProductController::class, 'add'])->name('addproduct');
        Route::get('/product/edit/{product_slug}', [ProductController::class, 'edit'])->name('editproduct');

        /*--------------- SHOPS ------------------*/
        Route::get('/shop-requests', [ShopController::class, 'listShopRequests'])->name('shoprequests');
        Route::get('/shop-request/edit/{shop_slug}', [ShopController::class, 'viewShopRequest'])->name('showrequest');

        Route::get('/approved-shops', [ShopController::class, 'listApprovedShops'])->name('approvedshops');
        Route::get('/stores/{shop_slug}/edit', [ShopController::class, 'editShop'])->name('editshop');

        /*--------------- USERS ------------------*/
        Route::get('/users', [UserController::class, 'index'])->name('users');
        Route::get('/user/edit/{user_id}', [UserController::class, 'edit'])->name('edituser');

         /*--------------- ATTRIBUTES ------------------*/
        //show form when create new attribute calling from product
        Route::get('/attribute/create/{product_id}', [AttributeController::class, 'create'])->name('createattribute');
        //save route to store attribute
        Route::post('/attribute/add', [AttributeController::class, 'saveAttribute'])->name('storeattribute');
        Route::delete('/attribute/delete/{id}',[AttributeController::class, 'deleteAttribute'] )->name('deleteattr');

        /*--------------- COUPONS ------------------*/
        Route::get('/coupons', [CouponController::class, 'index'])->name('coupons');
        Route::get('/coupons/add', [CouponController::class, 'store'])->name('addcoupon');
        Route::get('/coupons/edit/{coupon_id}', [CouponController::class, 'edit'])->name('editcoupon');

        /*--------------- ORDERS ------------------*/
        Route::get('/orders', [OrderController::class, 'index'])->name('orders');
        Route::get('/order/edit/{order_id}', 'App\Http\Livewire\Admin\UpdateOrderComponent')->name('updateorder');


        /*--------------- BLOGS ------------------*/
        Route::get('/blogs', [BlogController::class, 'index'])->name('blogs');
        
    });
});


Route::prefix('user')->middleware('theme:frontend')->name('user.')->group(function () {

    Route::middleware(['guest:web'])->group(function() {
        Route::view('/login', 'auth.login')->name('login');
        Route::view('/register', 'auth.register')->name('register');
        Route::view('/checkout/account', 'auth.registeraccount')->name('regaccount');

        //Login Auth check
        Route::post('/login', [LoginController::class, 'check'])->name('check');
        //Register route
        Route::post('/create', [LoginController::class, 'create'])->name('create');

        //Register Account route
        Route::post('/storeuser', [LoginController::class, 'store'])->name('store');

        Route::view('/forgot-password', 'auth.passwords.forget' )->name('password.request');
    });

    /*------------------------------FRONT AUTH ROUTES------------------*/
    Route::middleware(['auth:web'])->group(function() {
        Route::post('/logout', [LoginController::class, 'destroy'])->name('logout');
        // Route::view('/home', 'home')->name('home');
        Route::get('/home', 'App\Http\Controllers\Front\HomeController@home')->name('home');

        /*---------------ACCOUNT------------------*/
        Route::get('/dashboard', [AccountController::class, 'dashboard'])->name('dashboard');
        Route::get('/profile', [AccountController::class, 'profile'])->name('profile');
        Route::get('/orders', [AccountController::class, 'myOrders'])->name('orders');
        Route::get('/address', [AccountController::class, 'userAddress'])->name('address');
        Route::post('/update/{id}', [AccountController::class, 'update'])->name('updateprofile');
        /*--------------- ACCOUNT PASSWORD ------------------*/
        Route::get('/account', [AccountController::class, 'passwordForm'])->name('password');
        Route::post('/account/{id}', [AccountController::class, 'updatePassword'])->name('updatepassword');
        
        /*--------------- CHECKOUT ------------------*/
   
        Route::get('/confirm-purchasing', 'App\Http\Livewire\Front\CheckoutComponent')->name('checkout.confirm');

        Route::get('/thank-you', 'App\Http\Livewire\Front\ThankyouComponent')->name('thankyou');
    });

});

//Seller Routes
Route::prefix('seller')->middleware('theme:seller')->name('seller.')->group(function () {

    Route::middleware(['guest:seller'])->group(function() {
        Route::view('/login', 'auth.login')->name('login');
        // Route::view('/register', 'auth.register')->name('register');
        Route::post('/login', [SellerAuthController::class, 'check']);

        /*--------------- SHOP REGISTER ------------------*/
        Route::get('/register', [SellerAuthController::class, 'createForm'])->name('register');

        Route::get('/register-success', [SellerAuthController::class, 'successPage'])->name('successpage');

    });
    Route::middleware(['auth:seller'])->group(function() {
        Route::post('/logout', [SellerAuthController::class, 'destroy'])->name('logout');

        /*--------------- DASHBOARD ------------------*/
        Route::view('/dashboard', 'home')->name('home');

        /*--------------- PRODUCTS ------------------*/
        Route::get('/seller-products', 'App\Http\Controllers\Seller\ProductController@index')->name('products');
        Route::get('/seller-product/create','App\Http\Controllers\Seller\ProductController@create')->name('createproduct');
        Route::get('/seller-product/edit/{product_slug}', 'App\Http\Controllers\Seller\ProductController@edit')->name('editproduct');

        /*--------------- BANNER ------------------*/
        Route::get('/banner', 'App\Http\Controllers\Seller\ShopProfileController@index')->name('banner');
        Route::get('/user/profile/edit', 'App\Http\Controllers\Seller\ShopProfileController@editUserProfile')->name('editprofile');

    });
});



