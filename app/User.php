<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','phone','role_id','location','added_by','branch_id','court_id','api'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function distributor()
    {
        return $this->hasMany('App\Distributor', 'distributor_id');
        }

        // Beneficiary
        public function hotels()
        {
            return $this->hasMany('App\User', 'added_by');
            }

            //
            public function package()
            {
                return $this->hasMany('App\Package', 'user_id');
                }
                //batch

                public function batch()
                {
                    return $this->hasMany('App\Batch', 'user_id');
                    }

                    //Batch assigned
     public function categories()
     {
      return $this->hasMany('App\Category', 'hotel_id');
     }
    public function tables ()
     {
     return $this->hasMany('App\Table', 'hotel_id');
    }

    // products
    public function products()
    {
     return $this->hasMany('App\Products', 'hotel_id');
    }

    public function hotel(){
        return $this->belongsTo('App\User', 'added_by');
    }

    public function orders()
    {
     return $this->hasMany('App\Cart', 'hotel_id');
    }

    public function branches ()
    {
    return $this->hasMany('App\Branch', 'hotel_id');
   }

   public function options ()
   {
   return $this->hasMany('App\Option', 'hotel_id');
    }

    public function branch(){
        return $this->belongsTo('App\Branch', 'branch_id');
    }

    public function states ()
    {
    return $this->hasMany('App\State', 'user_id');
     }
    

    //  public function court(){
    //     return $this->belongsTo('App\Court', 'user_id');
    // }
}
