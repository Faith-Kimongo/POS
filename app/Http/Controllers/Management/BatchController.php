<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Voucher;
use App\Batch;
use App\BatchAsign;
use App\User;
use Illuminate\Support\Facades\Auth;
use Validator;
class BatchController extends Controller
{
    //home
    public function index(){

            $users=User::where('role_id',1)->get();
            $batch= Batch::orderby('created_at','DESC')->where('user_id',Auth::id())->get();
            $batcha= Batch::orderby('created_at','DESC')->where('user_id',Auth::id())->get();
            return view('management.batch',['users'=>$users,'batch'=>$batch,'batcha'=>$batcha]);
    }


        //single
        public function single($id)
        {
            $users=User::where('role_id',1)->get();
            $batch= Batch::where('id',$id)->where('user_id',Auth::id())->get();
            $batcha= Batch::where('id',$id)->where('user_id',Auth::id())->get();
            return view('management.batch',['users'=>$users,'batch'=>$batch,'batcha'=>$batcha]);

        }
// new Batch
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


    $experience = new Batch([
        'user_id' => Auth::id(),
        'name' => $request->name,
        'number' => $request->quantity,
        'descr' => $request->descr,
        // 'from_date'=>$request->start_date,
        // 'to_date' => $request->end_date

    ]);
    if($experience->save()){
        return back()->with('status','Batch Succesfully Created');
    }
    else{
        return back()->with('error','Please Try Again!!!');
    }

}

// Assign new distributor
public function asign(Request $request)
{
$validator = Validator::make($request->all(), [
    'name' => 'required|string',
    // 'quantity' => 'required|string',
    'batch' => 'required|string',
    // 'end_date' => 'required|date',
    'remarks' => 'string',
]);
    if ($validator->fails()) {
                return back()->with('error',$validator->errors());
            }


$experience = new BatchAsign([
    'user_id' => Auth::id(),
    'distributor_id' => $request->name,
    // 'quantity' => $request->quantity,
    'remarks' => $request->remarks,
    'batch_id' => $request->batch,


]);
if($experience->save()){
    return back()->with('status','Succesfully assigned!!!');
}
else{
    return back()->with('error','Please Try Again!!!');
}

}

}
