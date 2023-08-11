<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Food extends Model
{
    //

    protected $guarded=[];

    public function category()
    {
    	return $this->hasOne(Category::class,'id','cat_id');
    }
}
