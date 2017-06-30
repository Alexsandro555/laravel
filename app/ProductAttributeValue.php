<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductAttributeValue extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $table = 'products_attribute_value';

    public function attribute()
    {
        return $this->belongsTo('App\ProductAttribute');
    }

    public function type_products()
    {
        return $this->belongsTo('App\TypeProduct');
    }
}