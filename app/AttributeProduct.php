<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AttributeProduct extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    public function products() {
        return $this->hasMany(Product::class, 'product_id','id');
    }
    public function attributes() {
        return $this->hasMany(Attribute::class, 'attribute_id','id');
    }
}