<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'title',
        'url_key',
        'price',
        'description',
        'qty',
        'active',
        'sort',
        'onsale',
        'special',
        'need_order'
    ];

    public function photo() {
        return $this->hasMany(ProductPhoto::class, 'product_id','id');
    }
}
