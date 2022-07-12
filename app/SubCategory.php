<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class SubCategory extends Model
{
    //
    use SoftDeletes;
    protected $fillable=['name','description','hotel_id','category_id','branch_id'];

    public function products()
    {
     return $this->hasMany('App\Products', 'sub_category');
    }

    public function category()
    {
        return $this->belongsTo('App\Category', 'category_id');
    }

}
