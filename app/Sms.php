<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sms extends Model
{
    //
    use SoftDeletes;
    protected $fillable=['sender_id','beneficiary_id','sms',];

}
