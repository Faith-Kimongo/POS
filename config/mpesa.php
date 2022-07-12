<?php
return [
    /*
    |--------------------------------------------------------------------------
    | Default Account
    |--------------------------------------------------------------------------
    |
    | This is the default account to be used when none is specified.
    */
    'default' => 'staging',
    /*
    |--------------------------------------------------------------------------
    | Native File Cache Location
    |--------------------------------------------------------------------------
    |
    | When using the Native Cache driver, this will be the relative directory
    | where the cache information will be stored.
    */
    'cache_location' => '../cache',
    /*
    |--------------------------------------------------------------------------
    | Accounts
    |--------------------------------------------------------------------------
    |
    | These are the accounts that can be used with the package. You can configure
    | as many as needed. Two have been setup for you.
    |
    | Sandbox: Determines whether to use the sandbox, Possible values: sandbox | production
    | Initiator: This is the username used to authenticate the transaction request
    | LNMO:
    |    paybill: Your paybill number
    |    shortcode: Your business shortcode
    |    passkey: The passkey for the paybill number
    |    callback: Endpoint that will be be queried on completion or failure of the transaction.
    |
    */
    'accounts' => [
        'staging' => [
            'sandbox' => false,
            'key' => '5gxdBFLR0ry985pGeiqC8Qn5n6NuJ28Q',
            'secret' => 'CnfdjogAaSNDAklE',
            'initiator' => 'madmax',
            'id_validation_callback' => 'https://demo.smartwaiter.co.ke/api/mpesa/transaction/confirmation',
            'lnmo' => [
                'paybill' =>7005121 ,
                'shortcode' => 4005109,
                'passkey' => 'd89464354acc98af7c05dadb590aa968d26d81b49f79e6afcba85b203dc7700d',
                'callback' => 'https://demo.smartwaiter.co.ke/api/mpesa/transaction/confirmation',
            ]
        ],
        'production' => [
            'sandbox' => false,
            'key' => env('CONSUMER_KEY'),
            'secret' => env('CONSUMER_SECRET'),
            'initiator' => 'apitest363',
            'id_validation_callback' => 'http://example.com/callback?secret=some_secret_hash_key',
            'lnmo' => [
                'paybill' => env('MPESA_SHORT_CODE'),
                'shortcode' => env('MPESA_SHORT_CODE'),
                'passkey' => env('MPESA_PASSKEY'),
                'callback' => env('MPESA_CALLBACK_URL'),
            ]
        ],
    ],
];