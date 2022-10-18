<?php

namespace core\contracts;

interface RequestInterface
{
    public function get(string $name = null): string|array|null;

    public function post(string $name = null): string|array|null;

    public function all(string $name = null): string|array|null;
}