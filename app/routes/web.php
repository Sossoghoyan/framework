<?php

use app\controllers\AboutUsController;
use app\controllers\HomeController;
use app\controllers\NewsController;

return [
    '/' => [
        'controller' => HomeController::class,
        'action' => 'index'
    ],
    '/news' => [
        'controller' => NewsController::class,
        'action' => 'index'
    ],
    '/about-us' => [
        'controller' => AboutUsController::class,
        'action' => 'index'
    ]
];