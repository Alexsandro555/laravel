<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    protected $fillable = ['title','url_key','description','active','sort','parent'];

    public function products() {
        return $this->hasMany(Product::class, 'category_id','id');
    }

    public function parent()
    {
        return $this->belongsTo('App\Category','parent')->where('parent',0)->with('parent');
    }

    public function children()
    {
        return $this->hasMany('App\Category','parent')->with('children');
    }

    protected static function boot()
    {
        parent::boot(); // TODO: Change the autogenerated stub

        static::deleting(function($category) {
            // before delete() method call this
            $category->products()->delete();
            $category->children()->delete();
        });
    }
}
