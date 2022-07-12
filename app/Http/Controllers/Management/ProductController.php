<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\SubCategory;
use App\Products;
use App\Image;
use Session;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('management.products.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories=Category::where('hotel_id',Auth::id())->get();
        return view('management.products.create',compact('categories'));
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
    //    dd($request->photos);








        $contact = new Products([
            'name' => $request->name,
            'description'=>$request->description,
            'cost'=>$request->cost,
            'sub_category'=>$request->sub_category,
            'preparation'=>$request->preparation,
            'hotel_id'=>Auth::id(),
            'branch_id'=>Session::get('branch'),
        ]);
        $contact->save(); 
        $product_id=$contact->id;


        
        if($request->hasFile('photos'))
        {
        $allowedfileExtension=['pdf','jpg','jpeg','png'];
        $files = $request->file('photos');
        foreach($files as $photo){
        $filename = $photo->getClientOriginalName();
        $extension = $photo->getClientOriginalExtension();
        $check=in_array($extension,$allowedfileExtension);
        //dd($check);
        if($check)
        {
        
        // $files = $request->file('photos');
        //     foreach($files as $photo){
        $imageName = $photo->getClientOriginalName();
        $photo->move(public_path('media/products'), $imageName);

        $contact = new Image([
            'name' => $imageName,
            'product_id'=>$product_id,
            'branch_id'=>Session::get('branch'),
            'hotel_id'=>Auth::id(),
        ]);
        $contact->save(); 

            }
        }
        // Worker::where('user_id',$user_id)->update( array('profile'=>$imageName));




        return redirect('/management/products')->with('success', 'Product  added succefully!');
        // dd($request);
    }

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
        $product=Products::find($id);
        // dd($product);
        return view('management.products.single',compact('product'));
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

    public function add($id){
        $subcategory= SubCategory::find($id);
        return view('management.products.new',compact('subcategory'));

    }


    public function import(){
        $client = new Client();
    	$response = $client->request('GET', 'https://mmkkenya.clubspeedtiming.com/api/index.php/products?key=dvQKtNAmaUjHM2ScrNdS');
    	$statusCode = $response->getStatusCode();
    	$body = $response->getBody()->getContents();
        
    
        $products=json_decode ($body);

        
        foreach ($products->products as $product){
            if($product->productType){
                // dd($product);
                $contact = new Products([
                    'name' => $product->description,
                    'description'=>$product->description,
                    'cost'=>$product->price1,
                    'api_id'=>$product->productId,
                    'preparation'=>'10',
                    'hotel_id'=>Auth::id(),
                    'branch_id'=>Session::get('branch'),

                ]);
                $contact->save();
            }
            

        }


    }
}
