<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Broadcaster
    |--------------------------------------------------------------------------
    |
    | This option controls the default broadcaster that will be used by the
    | framework when an event needs to be broadcast. You may set this to
    | any of the connections defined in the "connections" array below.
    |
    | Supported: "pusher", "redis", "log", "null"
    |
    */

    'default' => 'pusher',//env('BROADCAST_DRIVER', 'null'),

    /*
    |--------------------------------------------------------------------------
    | Broadcast Connections
    |--------------------------------------------------------------------------
    |
    | Here you may define all of the broadcast connections that will be used
    | to broadcast events to other systems or over websockets. Samples of
    | each available type of connection are provided inside this array.
    |
    */

    'connections' => [

        'pusher' => [
            'driver' => 'pusher',
            'key' => '3d554cfd8eeb7d708495',
            'secret' => '0688a6febe3422f66698',
            'app_id' => '956486',
            'options' => [
                'cluster' => 'ap2',
                'encrypted' => true
            ],
        ],
        // 'pusher' => [
        //     'driver' => 'pusher',
        //     'key' => env('d0d651f9e483ea8969ea'),
        //     'secret' => env('6d12451542cdad8206ef'),
        //     'app_id' => env('951794'),
        //     'options' => [
        //         'cluster' => env('ap2'),
        //         'useTLS' => true,
        //     ],
        // ],


        'redis' => [
            'driver' => 'redis',
            'connection' => 'default',
        ],

        'log' => [
            'driver' => 'log',
        ],

        'null' => [
            'driver' => 'null',
        ],

    ],

];
