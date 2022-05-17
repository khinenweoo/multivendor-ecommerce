<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;


use App\Models\Category;
use App\Models\Seller;


class Shop extends Model
{
    use HasFactory, Notifiable;
    public $table = 'shops';
    protected $primaryKey = 'shop_id';

    public $fillable = [
        'shop_name',
        'shop_slug',
        'seller_id',
        'company_name',
        'account_type',
        'other_category',
        'business_register_no',
        'business_register_form',
        'licence_certi_file',
        'business_address',
        'pickup_address',
        'website_url',
        'business_email',
        'logo_image',
        'banner',
        'is_active',
        'featured_expiry_date'
    ];

    protected $casts = [
        'main_categories' => 'array',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function seller()
    {
        return $this->belongsTo(Seller::class, 'seller_id');
    }

    /**
     * Search Shop Requests 
     */
    public static function searchRequests($search)
    {
        return empty($search)? static::query()
        : static::query()->where('shop_id', 'like', '%'.$search.'%')
        ->orWhere('shop_name', 'like', '%'.$search.'%')
        ->orWhere('business_email', 'like', '%'.$search.'%');
    }
    /**
     * Search Approved shops 
     */
    public static function searchShops($search)
    {
        return empty($search)? static::query()
        : static::query()->where('shop_id', 'like', '%'.$search.'%')
        ->orWhere('shop_name', 'like', '%'.$search.'%')
        ->orWhere('company_name', 'like', '%'.$search.'%')
        ->orWhere('main_categories', 'like', '%'.$search.'%')
        ->orWhere('business_email', 'like', '%'.$search.'%')
        ->orWhere('is_active', 'like', '%'.$search.'%');
    }


}
