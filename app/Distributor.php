<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Distributor extends Model
{
    //
    use SoftDeletes;
    protected $fillable=['user_id','distributor_id','quantity','package_id','remarks'];
// user
    public function user()
{
    return $this->belongsTo('App\User', 'distributor_id');
}

// package
public function package()
{
    return $this->belongsTo('App\Package', 'package_id');
}
//issue
            public function issue()
                                {
                                    return $this->hasMany('App\Issue', 'Distributor_id');
                                    }

        // left

        public function left($id)
{
    $left=(Distributor::find($id)->quantity)-(Distributor::find($id)->issue->sum('quantity'));
    return $left;
}

}
