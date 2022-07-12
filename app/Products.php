<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Products extends Model
{
    //
    use SoftDeletes;
    protected $fillable=['name','description','hotel_id','cost','sub_category','preparation','branch_id','api_id'];

    public function images ()
    {
    return $this->hasMany('App\Image', 'product_id');
   }

   public function subcat()
   {
       return $this->belongsTo('App\SubCategory', 'sub_category');
   }


   public function hotel()
   {
       return $this->belongsTo('App\User', 'hotel_id');
   }
}
