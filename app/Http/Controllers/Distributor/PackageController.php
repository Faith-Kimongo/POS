<?php

namespace App\Http\Controllers\Distributor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Distributor;
use App\Issue;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
class PackageController extends Controller
{
    //

    public function package($id){

        $package= Distributor::orderby('created_at','DESC')->where('id',$id)->get();

        return view('distributor.home',['pack'=>$package]);

    }




    //issue package
    public function issue(Request $request)
                {
                $validator = Validator::make($request->all(), [
                    'package' => 'required|string',
                    'quantity' => 'required|string',
                    'beneficiary' => 'required|string',
                ]);
                    if ($validator->fails()) {
                                return back()->with('error',$validator->errors());
                            }


                $experience = new Issue([
                    'distributor_id' => Auth::id(),
                    'Distributor_id' => $request->package,
                    'quantity' => $request->quantity,
                    'beneficiary_id' => $request->beneficiary,
                    // 'package_id' => $request->package,


                ]);
                if($experience->save()){
                    return back()->with('status','Package Succesfully issued!!!');
                }
                else{
                    return back()->with('error','Please Try Again!!!');
                }

                }
}
