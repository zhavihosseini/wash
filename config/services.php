<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],
    'recaptcha' => [
        'sitekey' => env('6LfiF9AaAAAAAEuLQOiYtGuBnLKVe_wc1b-WycVO'),
        'secret' => env('6LfiF9AaAAAAABiOjuOHAeswTyCir4SdBWXFOixh'),
    ],

    'raygansms' => [
        'user_name' => env('RAYGANSMS_USERNAME'),
        'password' => env('RAYGANSMS_PASSWORD'),
        'phone_number' => env('RAYGANSMS_PHONE_NUMBER'),
    ],


];
