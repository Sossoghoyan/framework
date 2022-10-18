<?php

namespace core\components\url;

use core\contracts\UrlInterface;

class UrlParser implements UrlInterface
{
    public function scheme(): string
    {
        return isset($_SERVER['HTTPS']) ? 'https' : 'http';
    }

    public function url(): string
    {
        return sprintf('%s://%s%s', $this->scheme(), $this->host(), $this->uri());
    }

    public function host(): string
    {
        return $_SERVER['HTTP_HOST'];
    }

    public function uri(): string
    {
        return $_SERVER['REQUEST_URI'];
    }

    public function path(): string
    {
        return parse_url($this->url(), PHP_URL_PATH);
    }
}