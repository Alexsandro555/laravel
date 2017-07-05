<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AttributeTypeProduct extends Model
{

    use SoftDeletes;

    protected $table = 'attribute_type_product';

    protected $dates = ['deleted_at'];

    public function attribute() {
        return $this->hasMany(Attribute::class, 'type_product_id','id');
    }

    public function type_products()
    {
        return $this->hasMany(Attribute::class, 'attribute_id','id');
    }
}