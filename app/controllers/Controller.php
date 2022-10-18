<?php

namespace app\controllers;

use core\Application;
use core\contracts\RequestInterface;

abstract class Controller
{
    protected RequestInterface $request;

    public function __construct()
    {
        $this->request = Application::$request;
    }
}