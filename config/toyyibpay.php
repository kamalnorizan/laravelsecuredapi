<?php

return [

    /*
    |--------------------------------------------------------------------------
    | ToyyibPay API Key
    |--------------------------------------------------------------------------
    |
    | This is your ToyyibPay API key, which you can find in your ToyyibPay
    | account settings. Be sure to add this to your .env file.
    |
    */

    'api_key' => env('TOYYIBPAY_API_KEY', 'your-api-key-here'),

    /*
    |--------------------------------------------------------------------------
    | ToyyibPay API Endpoint
    |--------------------------------------------------------------------------
    |
    | This is the endpoint for ToyyibPay's API. You shouldn't need to change
    | this unless ToyyibPay updates their API endpoint.
    |
    */

    'endpoint' => 'https://toyyibpay.com/',

];
