<?php

namespace Core\Controller;

use Core\Base\Controller;
use Core\Base\View;

class Front extends Controller
{
    public function render()
    {
        $view = new View('home');
    }

    public function index()
    {
        // Create an instance of Post model. 
        // Get data brom the posts table.
        // pass the data to the render method
    }
}
