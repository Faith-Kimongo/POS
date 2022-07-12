<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hotel;
use App\User;
use App\Cart;
use App\Category;
use App\SubCategory;
use App\Products;
use App\Court;
use Session;
use GuzzleHttp\Client;

class ClientController extends Controller
{
    //


    public function front ($branch,$hotel_id,$table){
        $hotel=User::find($hotel_id);
        // session()->put('ip_address', '127.0.0.1');
        Session::put(['hotel_id'=>$hotel_id,'table_no'=>$table,'branch'=>$branch]);

        // dd($hotel);
        // $products=Products::where('hotel_id',$id)->get();
        if($hotel->api!=NULL)
        {
            $products=$hotel->products;


           return view('front.apiproducts',['products'=>$products]);
        }
        else{
            return view('front.home',compact(['hotel','table']));
        }
        
    
       }


       public function product($name,$id){
        $product=Products::find($id);
        // dd($product,$id);
        return view('front.single',['product'=>$product]);
       }

    //    confirm
       public function confirm(){
        
        Cart ::where('session_id',Session::getid())->update(['status' => 1]);
        return redirect('/orders')->with('Status','Succesfully confirmed!!');

       }

       public function category($id){
           $category=Category::find($id);
           return view('front.sub',['category'=>$category]);
       }


       public function subcategory($id){
        $category=SubCategory::find($id);
        return view('front.products',['category'=>$category]);
    }

    public function court ($court,$table){
        $courts=Court::find($court);
        // session()->put('ip_address', '127.0.0.1');
        Session::put(['court'=>$court,'table_no'=>$table]);

        // dd($courts);
        // $products=Products::where('hotel_id',$id)->get();
        return view('front.court',['courts'=>$courts]);
    
    }
}
