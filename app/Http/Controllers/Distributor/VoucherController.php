<?php

namespace App\Http\Controllers\Distributor;

use App\Beneficiary;
use App\Http\Controllers\Controller;
use App\Sms;
use App\Voucher;
use App\VoucherAssign;
// use Faker\Provider\bg_BG\PhoneNumber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Propaganistas\LaravelPhone\PhoneNumber;
use AfricasTalking\SDK\AfricasTalking;

class VoucherController extends Controller
{
    //Asign
    public function assign(Request $request)
{
    // dd($request);
$validator = Validator::make($request->all(), [
    'code' => 'required|string',
    'beneficiary' => 'required|string',

]);
    if ($validator->fails()) {
                return back()->with('error',$validator->errors());
            }
//message
$voucher=Voucher::find($request->code)->code;
$phone=  PhoneNumber::make(Beneficiary::find($request->beneficiary)->phone, 'KE')->formatE164();

$message="Centum Foundation has gifted you a COVID-19 package to be redeem in any of the supermarket . Your Voucher code is :$voucher";


$experience = new VoucherAssign([
    'distributor_id' => Auth::id(),
    'beneficiary_id' => $request->beneficiary,
    'voucher_id' =>$request->code,
]);
$experience->save();

            // Voucher status
            Voucher ::where('id',$request->code)
            ->update(['status' => 1]);





            $sms= new Sms([
            'sms'=>$message,
            'sender_id'=>Auth::id(),
            'beneficiary_id'=>$request->beneficiary,
            ]);
            $sms->save();



            // $recipient="254721397357";


        $username   = "sandbox";
        $apiKey     = "2d7683efe824659750ea64b4cd5c052be2f0dab49b45fbe4b4270ea23c8d36cd";

        // Initialize the SDK
        $AT         = new AfricasTalking($username, $apiKey);

        // Get the SMS service
        $sms        = $AT->sms();

        // Set the numbers you want to send to in international format
        $recipients = $phone;

        // Set your message
        $message    = $message;

        // Set your shortCode or senderId
        $from       = "4692";

        try {
            // Thats it, hit send and we'll take care of the rest
            $result = $sms->send([
                'to'      => $recipients,
                'message' => $message,
                'from'    => $from
            ]);
            return back()->with('status','Voucher Succesfully assigned and SMS sent!!!');
            print_r($result);
        } catch (Exception $e) {
            echo "Error: ".$e->getMessage();
        }

// if($sms->save()){
//     return back()->with('status','Voucher Succesfully assigned and SMS send!!!');
// }
// else{
//     return back()->with('error','Please Try Again!!!');
// }

}





}
