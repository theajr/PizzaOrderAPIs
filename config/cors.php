<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Laravel CORS
    |--------------------------------------------------------------------------
    |
    | allowedOrigins, allowedHeaders and allowedMethods can be set to array('*')
    | to accept any value.
    |
    */


    'supportsCredentials' => false,
    'allowedOrigins' => ['*'],
    'allowedHeaders' => [
        'Content-Type',
        'X-Auth-Token',
        'Origin',
        'Authorization',],
    'allowedMethods' => [
        'POST',
        'GET',
        'OPTIONS',
        'PUT',
        'PATCH',
        'DELETE',
    ],
    'exposedHeaders' => [],
    'maxAge' => 0,

];
