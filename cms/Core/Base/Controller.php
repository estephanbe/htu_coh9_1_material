<?php

namespace Core\Base;

abstract class Controller
{
    abstract public function render();

    protected $view = null;
    protected $data = array();

    protected function view()
    {
        new View($this->view, $this->data);
    }

    protected function redirect($url)
    {
        \header("Location: $url");
    }
}
