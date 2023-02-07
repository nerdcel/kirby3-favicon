<?php

/** @var \Kirby\Cms\App $kirby */
/** @var \Kirby\Cms\Page $page */

load([
    'PHP_ICO' => 'src/php-ico.php',
    'FaviconMap' => 'src/FaviconMap.php',
], __DIR__);

kirby()->plugin('nerdcel/kirby3-favicon', [
    // Manifest route
    'routes' => require __DIR__ . '/src/routes.php',
    'snippets' => [
        'favicons' => __DIR__ . '/snippets/favicons.php'
    ],
    'siteMethods' => [
        'faviconmap' => require __DIR__ . '/methods/faviconmap.php'
    ],
]);
