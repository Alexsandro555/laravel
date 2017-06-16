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
        'need_order',
        'category_id'
    ];

    public function photo() {
        return $this->hasMany(ProductPhoto::class, 'product_id','id');
    }

    public function category() {
        return $this->belongsTo('App\Category');
    }
}
