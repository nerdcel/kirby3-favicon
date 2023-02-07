<?php

use Kirby\Http\Response;

return [
    [
        'pattern' => '/manifest.webmanifest',
        'action' => function () {
            return Response::json(site()->faviconmap()->manifest());
        }
    ],
    [
        'pattern' => '/favicon.ico',
        'action' => function () {
            return site()->faviconmap()->favicon();
        }
    ],
    [
        'pattern' => '/favicon.svg',
        'action' => function () {
            return site()->faviconmap()->faviconsvg();
        }
    ],
    [
        'pattern' => '/apple-touch-icon.png',
        'action' => function () {
            return site()->faviconmap()->apple180();
        }
    ],
    [
        'pattern' => '/icon-192.png',
        'action' => function () {
            return site()->faviconmap()->icon192();
        }
    ],
    [
        'pattern' => '/icon-512.png',
        'action' => function () {
            return site()->faviconmap()->icon512();
        }
    ],
    [
        'pattern' => '/icon-16x16.png',
        'action' => function () {
            return site()->faviconmap()->icon16();
        }
    ],
    [
        'pattern' => '/icon-32x32.png',
        'action' => function () {
            return site()->faviconmap()->icon32();
        }
    ]
];
