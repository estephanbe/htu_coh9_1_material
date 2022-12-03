<?php

namespace Core\Controller;

use Core\Base\Controller;
use Core\Base\View;
use Core\Model\Post;


class Front extends Controller
{
    public function render()
    {
        $view = new View('home');
    }

    public function index()
    {
        // Create an instance of Post model. 
        $post = new Post();
        // Get data brom the posts table.
        // pass the data to the render method
    }
}
