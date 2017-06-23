<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductAttribute extends Model
{
    protected $table = 'products_attribute';

    protected $fillable = [
        'sort',
        'title',
        'alias',
        'inshort'
    ];

    public function productAttributeValue() {
        return $this->hasMany(ProductAttributeValue::class, 'attribute_id','id');
    }
}
