<?php

namespace Core\Controller;


class Front
{
    public function render()
    {
        include dirname(__DIR__, 2) . "/resources/todo.php";
    }
}
