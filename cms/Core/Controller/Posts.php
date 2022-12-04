<?php

namespace Core\Controller;

use Core\Base\Controller;
use Core\Base\View;
use Core\Model\Post;

class Posts extends Controller
{

    public function render()
    {
        if (!empty($this->view))
            $this->view();
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
        $this->data['posts'] = $post->get_all();
        $this->data['posts_count'] = count($post->get_all());
    }

    public function single()
    {
        $this->view = 'posts.single';
        $post = new Post();
        $this->data['post'] = $post->get_by_id($_GET['id']);
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
        $post = new Post();
        $post->create($_POST);
        $this->redirect('/posts');
    }

    /**
     * Display the HTML form for post update
     *
     * @return void
     */
    public function edit()
    {
        $this->view = 'posts.edit';
        $post = new Post();
        $this->data['post'] = $post->get_by_id($_GET['id']);
    }

    /**
     * Updates the post
     *
     * @return void
     */
    public function update()
    {
        $post = new Post();
        $post->update($_POST);
        $this->redirect('/post?id=' . $_POST['id']);
    }

    /**
     * Delete the post
     *
     * @return void
     */
    public function delete()
    {
        $post = new Post();
        $post->delete($_GET['id']);
        $this->redirect('/posts');
    }
}
