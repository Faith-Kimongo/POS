<?php

namespace App\Http\Controllers\Store;

use App\Beneficiary;
use App\Http\Controllers\Controller;
use App\Voucher;
use App\Category;
use App\SubCategory;
use Carbon\Carbon;
use App\Cart;
use App\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
class StoreController extends Controller
{
    //

    public function index()
    {
        return view('store.index');
    }


    //verify code
    public function verify(Request $request)
    {
            $validator = Validator::make($request->all(), [
                'idnumber' => 'required|string',
                // 'beneficiary' => 'required|string',

            ]);
                if ($validator->fails()) {
                            return back()->with('error',$validator->errors());
                        }

        $beneficiary= Beneficiary::where('idnumber',$request->idnumber)->orwhere('phone',$request->idnumber)->first();
                            if($beneficiary->count()>0){
        return view('store.list',['beneficiary'=>$beneficiary]);
                            }
                            else {
                                return back()->with('error','The owner of the ID or Phone is not a beneficiary!!!');
                            }
    }
    public function pending()
    {
        $orders=Cart::where('status',1)->where('branch_id',Auth::user()->branch_id)->get();
        return view('store.orders' ,['orders'=>$orders]);
    }

    public function received()
    {
        $orders=Cart::where('status',2)->where('branch_id',Auth::user()->branch_id)->get();
        return view('store.orders' ,['orders'=>$orders]);
    }
    public function ready()
    {
        $orders=Cart::where('status',3)->where('branch_id',Auth::user()->branch_id)->get();
        return view('store.orders' ,['orders'=>$orders]);
    }

    public function closed()
    {
        $orders=Cart::where('status',4)->where('branch_id',Auth::user()->branch_id)->get();
        return view('store.orders',['orders'=>$orders]);
    }
    public function update (Request $request ){
        // dd($request);
        $product=Cart::find($request->order);
        $state=$request->state + 1;
        Cart ::where('id',$product->id)->update(['status' =>$state]);

        $contact = new State([
            'cart_id' => $product->id,
            'branch_id' => $product->branch_id,
            'hotel_id' => $product->hotel_id,
            'description'=>'new state',
            'state'=>$state,
            'user_id'=>Auth::id(),
        ]);
        $contact->save();  

        return back()->with('status','Order updated Successfully');


    }

    public function tables(){
        return view('store.tables');
    }
    public function categories(){

        $category=Category::where('branch_id',Auth::user()->branch_id)->get();
        // return view('front.products',);
        return view('store.categories',['category'=>$category]);
    }
    public function subcategories($id){
        $category=Category::find($id);
        // dd($category);
        return view('store.sub',['category'=>$category]);
    }

    public function products($id){
        $category=SubCategory::find($id);
        return view('store.products',['category'=>$category]);
    }


    public function report(){

        //  $state=State::where();
        return view('store.summary');
    }
}
