<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TypeProduct extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    public function products() {
        return $this->hasMany('App\Product');
    }

    public function tnveds() {
        return $this->hasMany(Tnved::class, 'tnved_id','id');
    }

    public function producers() {
        return $this->belongsToMany('App\Producer');
    }

    public function producer_type_products() {
        return $this->belongsTo('App\ProducerTypeProduct');
    }

    public function attributes_type_products() {
        return $this->belongsTo('App\Attribute');
    }

    public function attributes() {
        return $this->belongsToMany('App\Attribute')->withPivot('type_product_id','attribute_id');
    }
}