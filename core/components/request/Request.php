<?php

namespace core\components\request;

use core\components\url\UrlParser;
use core\contracts\RequestInterface;

class Request implements RequestInterface, \ArrayAccess, \IteratorAggregate
{
    public function __construct(
        protected UrlParser $url
    )
    {
    }

    public function __call(string $name, array $arguments)
    {
        return $this->url->{$name}(...$arguments);
    }

    public function __get(string $name)
    {
        return $this->all($name);
    }

    public function get(string $name = null): string|array|null
    {
        return $name
            ? $_GET[$name] ?? null
            : $_GET;
    }

    public function post(string $name = null): string|array|null
    {
        return $name
            ? $_POST[$name] ?? null
            : $_POST;
    }

    public function all(string $name = null): string|array|null
    {
        $params = array_merge($this->get(), $this->post());
        return $name
            ? $params[$name] ?? null
            : $params;
    }

    public function offsetExists(mixed $offset)
    {
        return (bool) $this->all($offset);
    }

    public function offsetGet(mixed $offset)
    {
        return $this->all($offset);
    }

    /**
     * @throws \Exception
     */
    public function offsetSet(mixed $offset, mixed $value)
    {
        throw new \Exception('Can not modify request parameters');
    }

    public function offsetUnset(mixed $offset)
    {
        unset($_GET[$offset], $_POST[$offset]);
    }

    public function getIterator(): \ArrayIterator
    {
        return new \ArrayIterator($this->all());
    }
}