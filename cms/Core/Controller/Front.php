<?php

namespace Core\Controller;

use Core\Base\Controller;
use Core\Model\Post;
use Core\Model\User;
use DateTime;

class Front extends Controller
{
    public function render()
    {
        if (!empty($this->view))
            $this->view();
    }

    function __construct()
    {
        $this->admin_view(false);
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
        $selected_post = $post->get_by_id($_GET['id']); // get the post data (including the user_id)
        $user = new User(); // get the user model to get the author info
        $author = $user->get_by_id($selected_post->user_id); // get the author by using the user_id in the $selected_post
        $selected_post->author = !empty($author) ? $author->display_name : null; // check if we got a user withe the provided user_id

        $date = new \DateTime($selected_post->created_at);
        $selected_post->created_at = $date->format('d/m/Y');

        $this->data['post'] = $selected_post;
    }
}
