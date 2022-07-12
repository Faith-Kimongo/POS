<?php

namespace App\Http\Controllers;

use App\MpesaTransaction;
use Carbon\Carbon;
use DB;
use Session;
use App\Cart;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use SmoDav\Mpesa\Laravel\Facades\Registrar;
use SmoDav\Mpesa\Laravel\Facades\Simulate;
use SmoDav\Mpesa\C2B\STK;

class MpesaController extends Controller
{

    /**
     * Lipa na M-PESA password
     * */

    public function lipaNaMpesaPassword()
    {
        $lipa_time = Carbon::rawParse('now')->format('YmdHms');
        $passkey = "bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919";
        $BusinessShortCode = 174379;
        $timestamp =$lipa_time;

        $lipa_na_mpesa_password = base64_encode($BusinessShortCode.$passkey.$timestamp);
        return $lipa_na_mpesa_password;
    }


    /**
     * Lipa na M-PESA STK Push method
     * */

    public function customerMpesaSTKPush(Request $request )
    {

        // dd($request);
        
        $amount=$request->amount;
        $verify=$this->verifySafaricomPhoneNo($request->phone);
        if ($verify) {
            // dd('wrong');
            // return true;
            $phone='254' . substr($request->phone, -9);
       



        $url = 'https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest';

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json','Authorization:Bearer '.$this->generateAccessToken()));


        $curl_post_data = [
            //Fill in the request parameters with valid values
            'BusinessShortCode' => 174379,
            'Password' => $this->lipaNaMpesaPassword(),
            'Timestamp' => Carbon::rawParse('now')->format('YmdHms'),
            'TransactionType' => 'CustomerPayBillOnline',
            'Amount' => $amount,
            'PartyA' => $phone, // replace this with your phone number
            'PartyB' => 174379,
            'PhoneNumber' => $phone, // replace this with your phone number
            'CallBackURL' => 'https://demo.smartwaiter.co.ke/api/mpesa/transaction/confirmation',
            'AccountReference' => "0012",
            'TransactionDesc' => "madmax mpesa"
        ];

        $data_string = json_encode($curl_post_data);

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);

        $curl_response = json_decode(curl_exec($curl));
        
        if($curl_response->ResponseCode==0){

            Cart ::where('session_id',Session::getid())->update(['checkout_id' => $curl_response->CheckoutRequestID,'points'=>$request->ilo]);
            return back()->with('status', 'Check Your Phone and Enter your MPESA PIN to complete your payment');
        }
        else{
            return json_decode($curl_response)->ResponseCode;
        }
        
        

    }


    }


    public function generateAccessToken()
    {
        $consumer_key="sMpgnYW62glBlxPXbyTBEGdPib8eJLOL";
        $consumer_secret="IcK2PkAFArVVVffU";
        $credentials = base64_encode($consumer_key.":".$consumer_secret);

        $url = "https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials";
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array("Authorization: Basic ".$credentials));
        curl_setopt($curl, CURLOPT_HEADER,false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $curl_response = curl_exec($curl);
        $access_token=json_decode($curl_response);
        return $access_token->access_token;
    }


    /**
     * J-son Response to M-pesa API feedback - Success or Failure
     */
    public function createValidationResponse($result_code, $result_description){
        $result=json_encode(["ResultCode"=>$result_code, "ResultDesc"=>$result_description]);
        $response = new Response();
        $response->headers->set("Content-Type","application/json; charset=utf-8");
        $response->setContent($result);
        return $response;
    }


    /**
     *  M-pesa Validation Method
     * Safaricom will only call your validation if you have requested by writing an official letter to them
     */

    public function mpesaValidation(Request $request)
    {
        $result_code = "0";
        $result_description = "Accepted validation request.";
        return $this->createValidationResponse($result_code, $result_description);
    }

    /**
     * M-pesa Transaction confirmation method, we save the transaction in our databases
     */

    public function mpesaConfirmation(Request $request)
    {
        // $content=json_decode($request->getContent());

        // $mpesa_transaction = new MpesaTransaction();
        // // $mpesa_transaction->TransactionType = $content->TransactionType;
        // // $mpesa_transaction->TransID = $content->TransID;
        // // $mpesa_transaction->TransTime = $content->TransTime;
        // // $mpesa_transaction->TransAmount = $content->TransAmount;
        // // $mpesa_transaction->BusinessShortCode = $content->BusinessShortCode;
        // $mpesa_transaction->BillRefNumber = $content->stkCallback->CheckoutRequestID;
        // // $mpesa_transaction->InvoiceNumber = $content->InvoiceNumber;
        // // $mpesa_transaction->OrgAccountBalance = $content->OrgAccountBalance;
        // // $mpesa_transaction->ThirdPartyTransID = $content->ThirdPartyTransID;
        // // $mpesa_transaction->MSISDN = $content->MSISDN;
        // // $mpesa_transaction->FirstName = $content->FirstName;
        // // $mpesa_transaction->MiddleName = $content->MiddleName;
        // // $mpesa_transaction->LastName = $content->LastName;
        // $mpesa_transaction->save();


        // // Responding to the confirmation request
        // $response = new Response();
        // $response->headers->set("Content-Type","text/xml; charset=utf-8");
        // $response->setContent(json_encode(["C2BPaymentConfirmationResult"=>"Success"]));


        // return $response;



        $request = file_get_contents('php://input');

        $callbackData = json_decode($request)->Body;
        
        $resultCode = $callbackData->stkCallback->ResultCode;
        $resultDesc = $callbackData->stkCallback->ResultDesc;
        // $merchantRequestID = $callbackData->stkCallback->MerchantRequestID;
        $checkoutRequestID = $callbackData->stkCallback->CheckoutRequestID;
        $transAmount = $callbackData->stkCallback->CallbackMetadata->Item[0]->Value;
        $transID = $callbackData->stkCallback->CallbackMetadata->Item[1]->Value;
        // $balance = $callbackData->stkCallback->CallbackMetadata->Item[2]->Value;
        $PhoneNumber = $callbackData->stkCallback->CallbackMetadata->Item[3]->Value;
        // $PhoneNumber = $callbackData->stkCallback->CallbackMetadata->Item[4]->Value;

        // If Payment was a success
        if ($resultCode == 0) {

            DB::table('mpesa_transactions')->insert(
                [
                    'TransAmount'=>$transAmount,
                    'TransID'=>$transID,
                    // 'BillRefNumber' =>$balance ,
                    'MSISDN' => $PhoneNumber,
                    // 'ownerphone'=>$PhoneNumber,
                    // 'status'=>$resultCode
                ]
            );
            Cart ::where('checkout_id',$checkoutRequestID)->update(['paid' => 1]);
            $carts= Cart ::where('checkout_id',$checkoutRequestID)->get();//->update(['paid' => 1]);
            foreach($carts as $cart){
    
                $url = 'https://dev.ilogroup.co.ke/api/smartwaiter';
    
                $curl = curl_init();
                curl_setopt($curl, CURLOPT_URL, $url);
                curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
    
    
                $curl_post_data = [
                    //Fill in the request parameters with valid values
                    // 'BusinessShortCode' => 174379,
                    "client_id"=> $cart->points,
                    "item"=> $cart->product->name,
                    "description"=>$cart->product->description,
                    "cost"=> $cart->amount,
                    "receipt_no"=> $transID,
                    "quantity"=> $cart->quantity,
                    "by"=> 'Smart Waiter',
                    "merchant_id"=> $cart->hotel->options->where('option','ilo')->last()->value,
                    
                ];
    
                $data_string = json_encode($curl_post_data);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($curl, CURLOPT_POST, true);
                curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
        
                $curl_response = json_decode(curl_exec($curl));
            }


        } else {
            return response([
                'message' => 'Something wrong happened!'
            ], 422)
                ->header('Content-Type', 'text/json');
        }
    }



    private function verifySafaricomPhoneNo($phone)
    {
        $phone_no = '0'.substr($phone, -9);
        if (!preg_match('/^(0){1}[7]{1}([0-2]{1}[0-9]{1}|[9,4]{1}[0-9]{1})[0-9]{6}/',$phone_no))
        {
            return false;
        }
        else{
            return true;
        }
    }

    public function stk(Request $request){


                $verify=$this->verifySafaricomPhoneNo($request->phone);
        if ($verify) {
            // dd('wrong');
            // return true;
        $phone='254' . substr($request->phone, -9);
        $mpesa= new \Safaricom\Mpesa\Mpesa();
        //
        $PartyA=$phone;
         
        
        // $Amount=$request->input('amount');
        // if(Auth::user()->type=='user'){
        // $Amount='200';
        // }
        // elseif(Auth::user()->type=='company'){
        //     $Amount='400';
        // }
        $cart =Cart::where('session_id', Session::getId())->get();
        $Amount=$cart->where('status',1)->where('paid',NULL)->sum('amount');


        $BusinessShortCode ='7005121';
        $LipaNaMpesaPasskey='d89464354acc98af7c05dadb590aa968d26d81b49f79e6afcba85b203dc7700d';
        $TransactionType='CustomerBuyGoodsOnline';
        $PartyB='4005109';
        $CallBackURL = 'https://smartwaiter.co.ke/api/mpesa/transaction/confirmation';
        $AccountReference = 'madmax';

       $stkPushSimulation=$mpesa->STKPushSimulation($BusinessShortCode, $LipaNaMpesaPasskey, $TransactionType, $Amount, $PartyA, $PartyB, $PartyA, $CallBackURL, $AccountReference, 'AJiryVerificationPayment', 'Ajiry.com');
        
        // return $stkPushSimulation;//->CheckoutRequestID;
        if(json_decode($stkPushSimulation)->ResponseCode=="0"){
            // $errMsg = json_decode($stkPushSimulation)->CustomerMessage;
          

            Cart ::where('session_id',Session::getid())->update(['checkout_id' => json_decode($stkPushSimulation)->CheckoutRequestID]);
            
            // return response([
            //     'message' => json_decode($stkPushSimulation)->CheckoutRequestID
            // ], 422);
            return back()->with('status', 'Check Your Phone and Enter your MPESA PIN to complete your payment');
            
        } else {
            $errMsg = json_decode($stkPushSimulation)->errorMessage;
            $test = 0;
        }

         if($test=1){
            echo 'Kindy check your phone, accept payment by submitting mpesa pin on your phone';
        } else {
            echo 'Payment process failed Kindly check your phone number';
        }
    }

    }

    public function postsmart(){


       $carts= Cart ::where('checkout_id','ws_CO_091220200717228099')->get();//->update(['paid' => 1]);
        foreach($carts as $cart){

            $url = 'http://localhost:8000/api/smartwaiter';

            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));


            $curl_post_data = [
                //Fill in the request parameters with valid values
                // 'BusinessShortCode' => 174379,
                "client_id"=> $cart->points,
                "item"=> $cart->product->name,
                "description"=>$cart->product->description,
                "cost"=> $cart->amount,
                "receipt_no"=> "mjkhgstmpesa",
                "quantity"=> $cart->quantity,
                "by"=> 'Smart Waiter',
                "merchant_id"=> $cart->hotel->options->where('option','ilo')->last()->value,
                
            ];

            $data_string = json_encode($curl_post_data);

            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
    
            $curl_response = json_decode(curl_exec($curl));
            
            dd($cart,$curl_post_data);
        }
        
        $url = 'http://localhost:8000/api/smartwaiter';

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));


        $curl_post_data = [
            //Fill in the request parameters with valid values
            // 'BusinessShortCode' => 174379,
            "client_id"=> "1",
            "item"=> "Lemon Juice",
            "description"=>'',
            "cost"=> "120",
            "receipt_no"=> "mjkhgst",
            "quantity"=> "1",
            "merchant_id"=> "3",
            
        ];

        $data_string = json_encode($curl_post_data);

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);

        $curl_response = json_decode(curl_exec($curl));
    }

}