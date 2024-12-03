<?php

return [
    'client_id' => env('PAYPAL_CLIENT_ID'),
    'client_secret' => env('PAYPAL_CLIENT_SECRET'),
    'settings' => [
        'mode' => env('PAYPAL_MODE', 'sandbox'), // Can be 'sandbox' or 'live'
        'http.ConnectionTimeOut' => 30,
        'http.Retry' => 1,
    ],
];