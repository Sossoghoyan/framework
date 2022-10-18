<?php

namespace core\components\router;

use core\contracts\RequestInterface;
use core\contracts\RouterInterface;

class Router implements RouterInterface
{
    protected array $routes;

    public function __construct(
        protected RequestInterface $request
    )
    {
        $this->routes = require ROOT . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'routes' . DIRECTORY_SEPARATOR . 'web.php';
    }

    public function route()
    {
        $route = $this->routes[$this->request->path()] ?? null;

        if (null === $route) {
            \http_response_code(404);
            die;
        }

        return $route;
    }

    public function action(): string
    {
        $route = $this->route();
        return $route['action'];
    }

    public function controller(): string
    {
        $route = $this->route();
        return $route['controller'];
    }
}