<?php

namespace app\controllers;

use core\components\response\Response;

class AboutUsController extends Controller
{
    public function index(): Response
    {
        return new Response('Hello, I\'m an object.', 404);
    }
}