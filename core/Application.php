<?php

namespace core;

use core\components\response\Response;
use core\contracts\RequestInterface;
use core\contracts\RouterInterface;

class Application
{
    public static RequestInterface $request;
    public static RouterInterface $router;

    public function __construct(
        RequestInterface $request,
        RouterInterface $router
    )
    {
        self::$request = $request;
        self::$router = $router;
    }

    public function run(): void
    {
        $controller = new (self::$router->controller());
        $response = $controller->{self::$router->action()}();
        echo new Response($response);
    }
}