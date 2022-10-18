<?php

namespace core\contracts;

interface RouterInterface
{
    public function action(): string;

    public function controller(): string;
}