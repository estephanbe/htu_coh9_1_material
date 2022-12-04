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
        $data = (object) $data;


        include_once \dirname(__DIR__, 2) . "/resources/views/partials/header.php"; // includes the header for all the views

        include_once \dirname(__DIR__, 2) . "/resources/views/$view.php";

        include_once \dirname(__DIR__, 2) . "/resources/views/partials/footer.php"; // include the footer for all the views
    }
}
