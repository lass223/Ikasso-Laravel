<?php

return [

    'defaults' => [
        'guard' => 'web',
        'passwords' => 'users',
    ],

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],

        'api' => [
            'driver' => 'token',
            'provider' => 'users',
            'hash' => false,
        ],

        'proprietaire' => [
            'driver' => 'session',
            'provider' => 'proprietaires', // Assurez-vous que ce provider est défini ci-dessous
        ],

        'client' => [
            'driver' => 'session',
            'provider' => 'clients', // Assurez-vous que ce provider est défini ci-dessous
        ],
    ],

    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => App\Models\User::class,
        ],

        'proprietaires' => [
            'driver' => 'eloquent',
            'model' => App\Models\Proprietaire::class, // Assurez-vous d'avoir ce modèle
        ],

        'clients' => [
            'driver' => 'eloquent',
            'model' => App\Models\Client::class, // Assurez-vous d'avoir ce modèle
        ],
    ],

    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => 'password_resets',
            'expire' => 60,
            'throttle' => 60,
        ],

        'proprietaires' => [
            'provider' => 'proprietaires',
            'table' => 'password_resets',
            'expire' => 60,
            'throttle' => 60,
        ],

        'clients' => [
            'provider' => 'clients',
            'table' => 'password_resets',
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    'password_timeout' => 10800,

];
