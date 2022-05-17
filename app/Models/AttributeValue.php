<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttributeValue extends Model
{
    use HasFactory;

    public $primaryKey = 'attrvalue_id';
    public $table = 'attribute_values';


    public $fillable = [
        'value',
        'attr_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'attrvalue_id' => 'integer',
        'value' => 'string',
        'attr_id' => 'integer'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function attributes()
    {
        return $this->belongsTo(Attribute::class,'attr_id','attr_id');
    }
}
