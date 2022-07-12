<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Branch extends Model
{
    //
    use SoftDeletes;
    protected $fillable=['name','location','hotel_id','email','phone'];



    public function categories()
    {
     return $this->hasMany('App\Category', 'branch_id');
    }
   public function tables ()
    {
    return $this->hasMany('App\Table', 'branch_id');
   }

   // products
   public function products()
   {
    return $this->hasMany('App\Products', 'branch_id');
   }

   public function hotel(){
       return $this->belongsTo('App\User', 'hotel_id');
   }

   public function orders()
   {
    return $this->hasMany('App\Cart', 'branch_id');
   }

   public function branches ()
   {
   return $this->hasMany('App\Branch', 'branch_id');
  }

}
