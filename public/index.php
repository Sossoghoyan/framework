<?php

use core\Application;
use core\components\request\Request;
use core\components\router\Router;
use core\components\url\UrlParser;

const ROOT = __DIR__ . DIRECTORY_SEPARATOR . '..';
require ROOT . DIRECTORY_SEPARATOR . 'core' . DIRECTORY_SEPARATOR . 'bootstrap' . DIRECTORY_SEPARATOR . 'autoload.php';

$url = new UrlParser();
$request = new Request($url);
$router = new Router($request);

$app = new Application(
    $request,
    $router
);

$app->run();