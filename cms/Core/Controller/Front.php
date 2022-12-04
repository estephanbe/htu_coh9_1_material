<?php

namespace Core\Controller;

use Core\Base\Controller;
use Core\Model\Post;


class Front extends Controller
{
    public function render()
    {
        if (!empty($this->view))
            $this->view();
    }

    /**
     * List all news
     *
     * @return void
     */
    public function index()
    {
        $this->view = 'home';
        $post = new Post();
        $this->data['posts'] = $post->get_all();
    }

    public function single()
    {
        $this->view = 'single';
        $post = new Post();
        $this->data['post'] = $post->get_by_id($_GET['id']);
    }
}
