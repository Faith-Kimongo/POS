<?php

return [
    'name' => 'Smart Waiter',
    'manifest' => [
        'name' => env('APP_NAME', 'Smart Waiter'),
        'short_name' => 'Smart Waiter',
        'start_url' => '/',
        'background_color' => '#ffffff',
        'theme_color' => '#000000',
        'display' => 'standalone',
        'orientation'=> 'any',
        'status_bar'=> 'black',
        'prefer_related_applications' =>'true',
        'icons' => [
            '72x72' => [
                'path' => '/media/icon/logo.png',
                'purpose' => 'any'
            ],
            '96x96' => [
                'path' => '/media/icon/logo.png',
                'purpose' => 'any'
            ],
            '128x128' => [
                'path' => '/media/icon/logo.png',
                'purpose' => 'any'
            ],
            '144x144' => [
                'path' => '/media/icon/logo.png',
                'purpose' => 'any'
            ],
            '152x152' => [
                'path' => '/media/icon/logo.png',
                'purpose' => 'any'
            ],
            '192x192' => [
                'path' => '/media/icon/logo.png',
                'purpose' => 'any'
            ],
            '384x384' => [
                'path' => '/media/icon/logo.png',
                'purpose' => 'any'
            ],
            '512x512' => [
                'path' => '/media/icon/logo.png',
                'purpose' => 'any'
            ],
        ],
        'splash' => [
            '640x1136' => '/images/icons/splash-640x1136.png',
            '750x1334' => '/images/icons/splash-750x1334.png',
            '828x1792' => '/images/icons/splash-828x1792.png',
            '1125x2436' => '/images/icons/splash-1125x2436.png',
            '1242x2208' => '/images/icons/splash-1242x2208.png',
            '1242x2688' => '/images/icons/splash-1242x2688.png',
            '1536x2048' => '/images/icons/splash-1536x2048.png',
            '1668x2224' => '/images/icons/splash-1668x2224.png',
            '1668x2388' => '/images/icons/splash-1668x2388.png',
            '2048x2732' => '/images/icons/splash-2048x2732.png',
        ],
        'shortcuts' => [
            [
                'name' => 'Smart Waiter',
                'description' => 'Zero Contact Menu',
                'url' => '/',
                'icons' => [
                    "src" => "/media/icon/logo.png",
                    "purpose" => "any"
                ]
            ]
        ],
        'custom' => []
    ]
];
