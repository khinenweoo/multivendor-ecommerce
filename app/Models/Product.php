<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \DateTimeInterface;
use App\Models\Category;
use App\Models\Seller;
use App\Models\Product;
use App\Models\Brand;

class Product extends Model
{
    use HasFactory;
    
    public $table = 'products';
    protected $primaryKey = 'product_id';

    public $fillable = [
        'product_name',
        'product_slug',
        'sku',
        'short_description',
        'category_id',
        'brand_id',
        'seller_id',
        'product_image',
        'product_video',
        'stock_status',
        'quantity',
        'weight',
        'price',
        'discount',
        'sale_price',
        'description',
        'conditions',
        'status',
        'added_by'
    ];

    public function rel_products() {
        return $this->hasMany(Product::class, 'category_id', 'category_id')->where('status', 'active')->limit(10);
    }

    public static function searchData($search)
    {
        return empty($search)? static::query()
        : static::query()->where('product_id', 'like', '%'.$search.'%')
        ->orWhere('product_name', 'like', '%'.$search.'%')
        ->orWhere('stock_status', 'like', '%'.$search.'%')
        ->orWhere('price', 'like', '%'.$search.'%')
        ->orWhere('conditions', 'like', '%'.$search.'%');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function seller()
    {
        return $this->belongsTo(Seller::class, 'seller_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function attributes()
    {
        return $this->hasMany(Attribute::class,'product_id', 'product_id')->with('attributeValues');
    }
}
