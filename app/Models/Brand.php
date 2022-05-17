<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    public $table = 'brands';
    protected $primaryKey = 'brand_id';

    public $fillable = [
        'brand_name',
        'brand_slug',
        'brand_image',
        'brand_description',
        'status',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public static function search($search)
    {
        return empty($search)? static::query()
        : static::query()->where('brand_id', 'like', '%'.$search.'%')
        ->orWhere('brand_name', 'like', '%'.$search.'%')
        ->orWhere('brand_slug', 'like', '%'.$search.'%')
        ->orWhere('brand_description', 'like', '%'.$search.'%');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products()
    {
        return $this->hasMany(Product::class, 'brand_id', 'brand_id');
    }
}
