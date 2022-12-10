<?php

namespace Core\Controller;

use Core\Base\Controller;
use Core\Base\View;
use Core\Helpers\Helper;
use Core\Helpers\Tests;
use Core\Model\Post;
use Core\Model\Tag;

class Posts extends Controller
{

    use Tests;

    public function render()
    {
        if (!empty($this->view))
            $this->view();
    }

    function __construct()
    {
        $this->auth();
        $this->admin_view(true);
    }

    /**
     * Gets all posts
     *
     * @return array
     */
    public function index()
    {
        $this->permissions(['post:read']);
        $this->view = 'posts.index';
        $post = new Post; // new model post.
        $this->data['posts'] = $post->get_all();
        $this->data['posts_count'] = count($post->get_all());
    }

    public function single()
    {

        self::check_if_exists(isset($_GET['id']), "Please make sure the id is exists");

        $this->permissions(['post:read']);
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
        $this->permissions(['post:create']);
        $this->view = 'posts.create';
    }

    /**
     * Creates new post
     *
     * @return void
     */
    public function store()
    {
        $this->permissions(['post:create']);
        $post = new Post();
        $_POST['user_id'] = $_SESSION['user']['user_id']; // this is the id of the current logged in user. Because the post creator would be the same logged in user.
        $post->create($_POST);
        Helper::redirect('/posts');
    }

    /**
     * Display the HTML form for post update
     *
     * @return void
     */
    public function edit()
    {
        $this->permissions(['post:read', 'post:update']);
        $this->view = 'posts.edit';
        $post = new Post();
        $tag = new Tag();
        $selected_post = $post->get_by_id($_GET['id']);
        $selected_post->tags = $tag->get_all();
        $this->data['post'] = $selected_post;
    }

    /**
     * Updates the post
     *
     * @return void
     */
    public function update()
    {
        $this->permissions(['post:read', 'post:update']);
        $post = new Post();

        // Handle posts_tags relations
        $post_id = $_POST['id'];
        $related_tags = $_POST['tags'] ?? null;
        if (!empty($related_tags)) {
            foreach ($related_tags as $tag_id) {
                $sql = "INSERT INTO posts_tags (post_id, tag_id) VALUES ($post_id, $tag_id)";
                $post->connection->query($sql);
            }
        }
        unset($_POST['tags']);

        $post->update($_POST);
        Helper::redirect('/post?id=' . $_POST['id']);
    }

    /**
     * Delete the post
     *
     * @return void
     */
    public function delete()
    {
        $this->permissions(['post:read', 'post:delete']);
        $post = new Post();
        $post->delete($_GET['id']);
        Helper::redirect('/posts');
    }
}
