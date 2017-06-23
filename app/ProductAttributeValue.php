<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductAttributeValue extends Model
{
    protected $table = 'products_attribute_value';

    public function attribute()
    {
        return $this->belongsTo('App\ProductAttribute');
    }

    public function product()
    {
        return $this->belongsTo('App\Product');
    }
}