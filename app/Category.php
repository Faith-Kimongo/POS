<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Category extends Model
{
    //
    use SoftDeletes;
    protected $fillable=['name','description','hotel_id','branch_id'];

    public function subcategories()
    {
     return $this->hasMany('App\SubCategory', 'category_id');
    }

}
