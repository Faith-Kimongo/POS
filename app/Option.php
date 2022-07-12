<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Option extends Model
{
    //
    use SoftDeletes;
    protected $fillable=['option','value','hotel_id'];
}
