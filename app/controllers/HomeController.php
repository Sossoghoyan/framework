<?php

namespace app\controllers;

class HomeController extends Controller
{
    public function index(): array
    {
        return [
            'name' => $this->request->get('name'),
            'surname' => $this->request->get('surname')
        ];
    }
}