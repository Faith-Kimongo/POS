<?php

namespace App\Http\Controllers\Management;

use App\Option;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Session;


class OptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('management.options.create');
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
       
        if($request->has('tag'))
        {
            $contact = new Option([
                'option' =>'tag',
                'value'=>$request->tag,
                'hotel_id'=>Auth::id(),
                // 'branch_id'=>Session::get('branch'),
            ]);
            $contact->save();   

        }
        if($request->has('color'))
        {
            $contact = new Option([
                'option' =>'color',
                'value'=>$request->color,
                'hotel_id'=>Auth::id(),
                // 'branch_id'=>Session::get('branch'),
            ]);
            $contact->save();   

        }


        if($request->has('ilo'))
        {
            $contact = new Option([
                'option' =>'ilo',
                'value'=>$request->ilo,
                'hotel_id'=>Auth::id(),
                // 'branch_id'=>Session::get('branch'),
            ]);
            $contact->save();   

        }


        if($request->has('logo'))
        {
        $allowedfileExtension=['jpg','png','jpeg'];
        $files = $request->file('logo');
            // dd($request,$files);
        // foreach($files as $photo){
        $filename = $files->getClientOriginalName();
        $extension = $files->getClientOriginalExtension();
        $check=in_array($extension,$allowedfileExtension);
        // dd($check);
        if($check)
        {
        
        // $files = $request->file('photos');
        //     foreach($files as $photo){
        $imageName = $files->getClientOriginalName();
        $files->move(public_path('media/icon'), $imageName);

        $contact = new Option([
            'option' =>'logo',
            'value'=>$imageName,
            'hotel_id'=>Auth::id(),
            // 'branch_id'=>Session::get('branch'),
        ]);
        $contact->save();

            }
        // }
    }
    return redirect('/management')->with('success', 'Options  added succefully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Option  $option
     * @return \Illuminate\Http\Response
     */
    public function show(Option $option)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Option  $option
     * @return \Illuminate\Http\Response
     */
    public function edit(Option $option)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Option  $option
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Option $option)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Option  $option
     * @return \Illuminate\Http\Response
     */
    public function destroy(Option $option)
    {
        //
    }
}
