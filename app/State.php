<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class State extends Model
{
    //
    use SoftDeletes;
    protected $fillable=['state','description','hotel_id','user_id','cart_id','branch_id'];
    public function cart(){
        return $this->belongsTo('App\Branch', 'cart_id');
    }
}
