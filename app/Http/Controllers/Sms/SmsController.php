<?php

namespace App\Http\Controllers\Sms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use AfricasTalking\SDK\AfricasTalking;

class SmsController extends Controller
{
    //
    public function send()
    {

        // api key l3Eze2le83UX926bxsa7yOc9w3762R5zv7969sa39A046bGdcz5btD8JaqdA6B8a
        // $recipient=request('recipient');
        $recipient="254721397357";
        // $message=request('message');
        $message="SMS";
        // $id=Bio::where('phone',$recipient)->firstOrFail()->user_id;
        // $username   = "tribus-tsg";
        // $apiKey     = "a3b26af0c7480bdba6c1a7df9d6ea5b96fd9897ceb483787cf0abf8ee6d284b1";

        $username   = "sandbox";
        $apiKey     = "2d7683efe824659750ea64b4cd5c052be2f0dab49b45fbe4b4270ea23c8d36cd";

        // Initialize the SDK
        $AT         = new AfricasTalking($username, $apiKey);

        // Get the SMS service
        $sms        = $AT->sms();

        // Set the numbers you want to send to in international format
        $recipients = $recipient;

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

            // $info= new SMS();
            // $info->message=$message;
            // $info->recipient=$recipients;
            // $info->sent_by=Auth::id();
            // $info->user_id=$id;
            // $info->save();
            // return redirect('/communications/sms')->with('status','SMS Sent Successfully!');
            print_r($result);
        } catch (Exception $e) {
            echo "Error: ".$e->getMessage();
        }
    }


    public function ck (){
        $api_key = "l3Eze2le83UX926bxsa7yOc9w3762R5zv7969sa39A046bGdcz5btD8JaqdA6B8a";

        $shortcode = "CSEJAY";
        $serviceId = '0';
        $mobile = "254721397357";
        $message = "Test outbound bulk message";

        $smsdata = array(
            "api_key" => $api_key,
            "shortcode" => $shortcode,
            "mobile" => $mobile,
            "message" => $message,
            // "serviceId" => $serviceId,
            "response_type" => "json",
            );

        $smsdata_string = json_encode($smsdata);
        echo $smsdata_string . "\n";

        // $smsURL = "http://www.csejaysystems.com/sms/smsout.php";
        $smsURL = "http://sms.csejaysystems.com:7211/sms/v3/sendsms";

        //POST
        $ch = curl_init($smsURL);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");

        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

        curl_setopt($ch, CURLOPT_POSTFIELDS, $smsdata_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($smsdata_string))
        );

        $apiresult = curl_exec($ch);
        echo("API Response: $apiresult\n");

        if (!$apiresult) {
            dd($ch);
            // die("ERROR on URL[$urls] | error[" . curl_error($ch) . "] | error code[" . curl_errno($ch) . "]\n");
        }

        curl_close($ch);
    }
    }

