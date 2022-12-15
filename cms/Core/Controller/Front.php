<?php

namespace Core\Controller;

use Core\Base\Controller;
use Core\Model\Post;
use Core\Model\Tag;
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

        // get tags related to the current post
        $tag = new Tag();
        // get related tags (Should be implemented in the Tag Model)
        $sql = "SELECT * FROM posts_tags WHERE post_id={$_GET['id']}";
        $tags_query = $tag->connection->query($sql); // get data from mysql
        $post_tags_relations = array(); // create container (Array) for the relations
        if ($tags_query->num_rows > 0) { // fill out the relations container
            while ($row = $tags_query->fetch_object()) {
                $post_tags_relations[] = $row;
            }
        }

        // get the tags by id from the tags table
        $tags = array();
        foreach ($post_tags_relations as $relation) {
            $tags[] = $tag->get_by_id($relation->tag_id);
        }

        // get the unique tags. 
        $final_tags = array();
        foreach ($tags as $tag) {
            if (!in_array($tag->name, $final_tags)) {
                $final_tags[$tag->id] = $tag->name;
            }
        }

        // escape XSS attacks
        $selected_post->content = \htmlspecialchars($selected_post->content);

        $selected_post->tags = $final_tags;
        $this->data['post'] = $selected_post;
    }

    function test_ajax()
    {
        $this->view = "test_ajax";
    }
}
