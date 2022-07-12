<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Voucher extends Model
{
    //
    use SoftDeletes;
    protected $fillable=['user_id','expiry','code','batch_id','status'];
}
