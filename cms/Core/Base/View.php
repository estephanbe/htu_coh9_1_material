<?php

namespace Core\Base;

/**
 * Include the php html template
 */
class View
{
    public function __construct($view, $data)
    {
        $view = \str_replace('.', '/', $view);
        $posts = $data;
        include_once \dirname(__DIR__, 2) . "/resources/views/$view.php";
    }
}
