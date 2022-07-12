<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Package;
class PackageController extends Controller
{
    //
    public function store(Request $request)
    {
    $validator = Validator::make($request->all(), [
        'name' => 'required|string',
        'quantity' => 'required|string',
        // 'description' => 'required|string',
        // 'end_date' => 'required|date',
        'descr' => 'required|string',
    ]);
        if ($validator->fails()) {
                    return response()->json(['error'=>$validator->errors()], 401);
                }


    $experience = new Package([
        'user_id' => Auth::id(),
        'name' => $request->name,
        // 'role' => $request->role,
        'descr' => $request->descr,
        // 'from_date'=>$request->start_date,
        // 'to_date' => $request->end_date

    ]);
    if($experience->save()){
        return back()->with('status','Succesfull Update');
    }
    else{
        return back()->with('error','Please Try Again!!!');
    }

}
}
