<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VoucherAssign extends Model
{
    //
    use SoftDeletes;
    protected $fillable=['beneficiary_id','distributor_id','redeemed_on','redeemed_by','voucher_id'];

    //voucher
    public function voucher()
    {
        return $this->belongsTo('App\Voucher', 'voucher_id');
    }
}
