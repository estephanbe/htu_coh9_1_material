<?php

namespace Core\Controller;

use Core\Base\Controller;
use Core\Base\View;
use Core\Model\Post;

class Posts extends Controller
{

    private $view = null;
    private $data;

    public function render()
    {
        if (!empty($this->view))
            new View($this->view, $this->data);
    }

    /**
     * Gets all posts
     *
     * @return array
     */
    public function index()
    {
        $this->view = 'posts.index';
        $post = new Post; // new model post.
        $this->data = $post->get_all();
    }

    /**
     * Display the HTML form for post creation
     *
     * @return void
     */
    public function create()
    {
        $this->view = 'posts.create';
    }

    /**
     * Creates new post
     *
     * @return void
     */
    public function store()
    {
    }

    /**
     * Display the HTML form for post update
     *
     * @return void
     */
    public function edit()
    {
        $this->view = 'posts.edit';
    }

    /**
     * Updates the post
     *
     * @return void
     */
    public function update()
    {
    }

    /**
     * Delete the post
     *
     * @return void
     */
    public function delete()
    {
    }
}
