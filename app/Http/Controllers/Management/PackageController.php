<?php

namespace App\Http\Controllers\Management;

use App\Distributor;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Auth;
use App\Package;
use App\User;
use DB;

class PackageController extends Controller
{
    //




    public function index()
    {

        // $packages= Package::orderby('created_at','DESC')->get();
        $users=User::where('role_id',1)->get();
        $package= Package::orderby('created_at','DESC')->where('user_id',Auth::id())->get();
        return view('management.package',['users'=>$users,'packag'=>$package]);

    }
    //single
    public function single($id)
    {
        $users=User::where('role_id',1)->get();
        $package= Package::orderby('created_at','DESC')->where('id',$id)->get();
        return view('management.package',['users'=>$users,'packag'=>$package]);

    }

// new package
    public function store(Request $request)
    {
    $validator = Validator::make($request->all(), [
        'name' => 'required|string',
        'quantity' => 'required|string',
        // 'description' => 'required|string',
        // 'end_date' => 'required|date',
        // 'descr' => 'required|string',
    ]);
        if ($validator->fails()) {
                    return back()->with('error',$validator->errors());
                }


    $experience = new Package([
        'user_id' => Auth::id(),
        'name' => $request->name,
        'quantity' => $request->quantity,
        'descr' => $request->descr,
        // 'from_date'=>$request->start_date,
        // 'to_date' => $request->end_date

    ]);
    if($experience->save()){
        return back()->with('status','Package Succesfully Recorded');
    }
    else{
        return back()->with('error','Please Try Again!!!');
    }

}

// Assign distributor

public function asign(Request $request)
{
$validator = Validator::make($request->all(), [
    'name' => 'required|string',
    'quantity' => 'required|string',
    'package' => 'required|string',
    // 'end_date' => 'required|date',
    'remarks' => 'string',
]);
    if ($validator->fails()) {
                return back()->with('error',$validator->errors());
            }


$experience = new Distributor([
    'user_id' => Auth::id(),
    'distributor_id' => $request->name,
    'quantity' => $request->quantity,
    'remarks' => $request->remarks,
    'package_id' => $request->package,
]);
if($experience->save()){
    return back()->with('status','Succesfully assigned!!!');
}
else{
    return back()->with('error','Please Try Again!!!');
}

}


}
