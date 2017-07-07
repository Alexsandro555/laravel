<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Product extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

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

    public function type_product() {
        return $this->belongsTo('App\TypeProduct');
    }

    public function category() {
        return $this->belongsTo('App\Category');
    }

    public function product_attributes() {
        return $this->belongsTo('App\AttributeProduct');
    }

    public function attributes() {
        return $this->belongsToMany('App\Attribute');
    }
}
