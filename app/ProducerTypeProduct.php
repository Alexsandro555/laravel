<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProducerTypeProduct extends Model
{
    protected $table = 'producer_type_product';

    use SoftDeletes;

    protected $guarded = [];

    public function type_products() {
        return $this->hasMany(TypeProduct::class, 'type_product_id','id');
    }

    public function products() {
        return $this->hasMany(Product::class);
    }
}