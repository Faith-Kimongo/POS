<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Court extends Model
{
    //
    protected $fillable = [
        'name', 'location',
    ];

    public function restaurant ()
    {
    return $this->hasMany('App\User', 'court_id');
     }


     public function tables ()
     {
     return $this->hasMany('App\Table', 'court_id');
     }
}
