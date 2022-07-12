<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Voucher;
class VoucherController extends Controller
{
    //
    public function generate (Request $request)
    {
        $number= request('number');
        $code="COVID-19-";
        $expiry=  Carbon::now()->addMonth(2);

        for ($x = 0; $x < $number; $x++){

        $uuid=strtoupper(Str::random(6));
        $voucher= $code.$uuid;

            $experience = new Voucher([
                'user_id' => Auth::id(),
                'batch_id' => $request->batch,
                'code'=>$voucher,
                'expiry'=>$expiry,
            ]);
            $experience->save();
    }

    return back()->with('status','Voucher Codes Successfully Generated');
}
}
