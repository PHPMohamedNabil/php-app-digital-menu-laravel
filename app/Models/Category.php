<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use  App\Models\Food;

class Category extends Model
{
    //

    protected $guarded=[];


     public function category()
    {
    	return $this->belongsTo(Food::class,'cat_id','id');
    }
}
