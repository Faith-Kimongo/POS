<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Session;

class KitchenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $waiters=User::where('role_id',1)->get();
        return view('management.kitchen.index',compact('waiters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('management.waiters.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz';
        // $password='54esmdr0qf';
        $password = substr(str_shuffle($permitted_chars), 0,8);






        $contact = new User([
            'name' => $request->name,
            'phone'=>$request->phone,
            'email' => $request->email,
            'location' => $request->location,
            'role_id'=>1,
            'added_by'=>Auth::id(),
            'password' => Hash::make($password),
        ]);
        $contact->save();
        $data = array('name'=>$request->name,'password'=>$password,'email'=>$request->email);
        Mail::send('management.waiters.password', $data, function($message) use($request){
            $message->to($request->email, $request->name)->subject
               ('Smart Waiter Registration');
            $message->from('no-reply@ajiry.co.ke', Auth::user()->name);
         });
         

        return redirect('/management/waiters')->with('success', 'Restaurant added succefully!');
        // dd($password);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
