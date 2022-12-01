<?php

namespace Core\Controller;

use Core\Base\Controller;
use Core\Base\Test;

class Front extends Controller
{
    public function render()
    {
        echo 'test';
    }

    public function index()
    {
        echo 1;
    }
}
