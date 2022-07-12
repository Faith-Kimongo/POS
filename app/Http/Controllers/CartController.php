<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Products;
use Session;
use Illuminate\Http\Request;

class CartController extends Controller
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
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //]
        $table=Session::get('table_no');
        $hotel=Session::get('hotel_id');
        $product=Products::find($request->product);
        

        $cart = new Cart([
            'session_id' => Session::getid(),
            'branch_id' => Session::get('branch'),
            'table_id' => $table,
            'product_id'=>$request->product,
            'quantity' => $request->quantity,
            'amount' => ($request->quantity)*($product->cost),
            'hotel_id' => $hotel,
    
           
        ]);
        $cart->save();
        return redirect('/restaurant/'.Session::get('branch').'/'.Session::get('hotel_id').'/'.Session::get('table_no'))->with('status','Product succesfully added to cart!!!');
        // return back()->with('status', 'Product succesfully added to cart');
        // dd($request,$hotel,$table);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart)
    {
        //
    }
}
