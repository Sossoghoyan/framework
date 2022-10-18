<?php

namespace core\contracts;

interface UrlInterface
{
    public function scheme(): string;

    public function url(): string;

    public function host(): string;

    public function uri(): string;

    public function path(): string;
}