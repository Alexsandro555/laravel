<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TypeProduct extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    public function products() {
        return $this->belongsTo('App\Products');
    }

    public function tnveds() {
        return $this->hasMany(Tnved::class, 'tnved_id','id');
    }

    public function producers() {
        return $this->belongsToMany('App\Producer');
    }

    public function type_products()
    {
        return $this->belongsToMany('App\Attribute');
    }

    public function producer_type_products() {
        return $this->belongsTo('App\ProducerTypeProduct');
    }
}