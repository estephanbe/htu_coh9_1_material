<?php

use Core\Router;

spl_autoload_register(function ($class_name) {
    $class_name = str_replace("\\", '/', $class_name); // \\ = \
    $file_path = __DIR__ . "/" . $class_name . ".php";
    require_once $file_path;
});

Router::get('/', "front.index");


Router::redirect();
