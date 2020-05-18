<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $table = 'categories'; // tu dinh nghia table

    public function parent()
    {
        return $this->$this->belongsTo("App\Category", "parentID");
    }

    public function products()
    {
        return $this->hasMany('App\Product');
    }
}
