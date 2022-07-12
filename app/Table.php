<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Table extends Model
{
    //
    use SoftDeletes;
    protected $fillable = [
        'name', 'number', 'spaces','hotel_id','branch_id','court_id'
    ];

    public function orders ()
    {
    return $this->hasMany('App\Cart', 'table_id');
   }
}
