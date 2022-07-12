<?php

namespace App\Http\Controllers\Distributor;

use App\Batch;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\BatchAsign;
use Illuminate\Support\Facades\Auth;
class BatchController extends Controller
{
    //
public function index(){


    $batch= BatchAsign::orderby('created_at','DESC')->where('distributor_id',Auth::id())->get();
    // dd($batch->count());
            return view('distributor.home',['batches'=>$batch]);
}


// Single Batch
public function single($id){

    $batch= BatchAsign::orderby('created_at','DESC')->where('id',$id)->get();

    return view('distributor.home',['batches'=>$batch]);

}
}
