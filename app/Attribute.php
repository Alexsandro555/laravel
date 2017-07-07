<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Attribute extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];


    protected $fillable = [
        'sort',
        'title',
        'alias',
        'inshort'
    ];

    public function type_products() {
        return $this->belongsToMany('App\TypeProduct');
    }

    public function attribute_products() {
        return $this->belongsTo('App\AttributeProduct');
    }

    public function products() {
        return $this->belongsToMany('App\Product');
    }
}
