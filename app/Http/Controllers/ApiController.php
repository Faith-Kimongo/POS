<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Order;
use Illuminate\Support\Arr;
class ApiController extends Controller
{
    //
    public function index()
    {
    	$client = new Client();
    	$response = $client->request('GET', 'https://mmkkenya.clubspeedtiming.com/api/index.php/products?key=dvQKtNAmaUjHM2ScrNdS');
    	$statusCode = $response->getStatusCode();
    	$body = $response->getBody()->getContents();
        // dd($body);
        // return $body;
        $productType=2;
        $products=json_decode ($body);
      
        return view('welcomebak',['products'=>$products]);
    }
}
