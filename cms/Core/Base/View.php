<?php

namespace Core\Base;

/**
 * Include the php html template
 */
class View
{
    public function __construct($view)
    {
        // $view = home
        include_once \dirname(__DIR__, 2) . "/resources/views/$view.php";
    }
}
