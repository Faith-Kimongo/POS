<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Cart extends Model
{
    //
    use SoftDeletes;
    protected $fillable=['session_id','hotel_id','table_id','quantity','status','user_id','product_id','amount','branch_id','checkout_id','paid','points'];


    public function product()
    {
        return $this->belongsTo('App\Products', 'product_id');
    }

    public function table()
    {
        return $this->belongsTo('App\Table', 'table_id');
    }


    public function hotel()
    {
        return $this->belongsTo('App\User', 'hotel_id');
    }
}
