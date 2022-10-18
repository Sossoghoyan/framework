<?php

spl_autoload_register(function ($namespace) {
    require ROOT . DIRECTORY_SEPARATOR . $namespace . '.php';
});