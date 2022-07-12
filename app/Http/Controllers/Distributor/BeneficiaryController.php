<?php

namespace App\Http\Controllers\Distributor;

use App\Beneficiary;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Auth;
use DB;
use App\User;
use App\Voucher;

class BeneficiaryController extends Controller
{
    public function index()
    {
        $beneficiary=Beneficiary::where('distributor_id',Auth::id())->get();
        return view('distributor.list',['beneficiaries'=>$beneficiary]);
    }


    public function list()
    {
        $beneficiary=Beneficiary::where('distributor_id',Auth::id())->get();
        return view('distributor.beneficiary',['beneficiaries'=>$beneficiary]);
    }
// new package
public function store(Request $request)
{
$validator = Validator::make($request->all(), [
    'lname' => 'required|string',
    'fname' => 'required|string',
    'mname' => 'string',
    'phone' => 'required|string',
    'county' => 'required|string',
    'idnumber' => 'required|string',
    'dob' => 'date',
]);
    if ($validator->fails()) {
                return back()->with('error',$validator->errors());
            }


$experience = new Beneficiary([
    'distributor_id' => Auth::id(),
    'fname' => $request->fname,
    'lname' => $request->lname,
    'mname' => $request->mname,
    'phone' => $request->phone,
    'idnumber' => $request->idnumber,
    'county' => $request->county,
    'dob' => $request->dob,
]);
if($experience->save()){
    return back()->with('status','Beneficiary Succesfully Registered');
}
else{
    return back()->with('error','Please Try Again!!!');
}

}

// profile
public function profile($id)
{
    $beneficiary=Beneficiary::find($id);
    $code= Voucher::where('status',0)->orderBy('created_at','asc')->first();
    return view('distributor.profile',['beneficiary'=>$beneficiary,'code'=>$code]);
}

}
