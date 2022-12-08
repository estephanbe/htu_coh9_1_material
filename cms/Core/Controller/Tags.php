<?php

namespace Core\Controller;

use Core\Base\Controller;
use Core\Base\View;
use Core\Helpers\Helper;
use Core\Model\Tag;

class Tags extends Controller
{

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
     * Gets all tags
     *
     * @return array
     */
    public function index()
    {
        $this->permissions(['tag:read']);
        $this->view = 'tags.index';
        $tag = new Tag; // new model post.
        $this->data['tags'] = $tag->get_all();
        $this->data['tags_count'] = count($tag->get_all());
    }

    public function single()
    {
        $this->permissions(['tag:read']);
        $this->view = 'tags.single';
        $tag = new Tag();
        $this->data['tag'] = $tag->get_by_id($_GET['id']);
    }

    /**
     * Display the HTML form for post creation
     *
     * @return void
     */
    public function create()
    {
        $this->permissions(['tag:create']);
        $this->view = 'tags.create';
    }

    /**
     * Creates new post
     *
     * @return void
     */
    public function store()
    {
        $this->permissions(['tag:create']);
        $tag = new Tag();
        $tag->create($_POST);
        Helper::redirect('/tags');
    }

    /**
     * Display the HTML form for post update
     *
     * @return void
     */
    public function edit()
    {
        $this->permissions(['tag:read', 'tag:update']);
        $this->view = 'tags.edit';
        $tag = new Tag();
        $this->data['tag'] = $tag->get_by_id($_GET['id']);
    }

    /**
     * Updates the post
     *
     * @return void
     */
    public function update()
    {
        $this->permissions(['tag:read', 'tag:update']);
        $tag = new Tag();
        $tag->update($_POST);
        Helper::redirect('/tag?id=' . $_POST['id']);
    }

    /**
     * Delete the post
     *
     * @return void
     */
    public function delete()
    {
        $this->permissions(['tag:read', 'tag:delete']);
        $tag = new Tag();
        $tag->delete($_GET['id']);
        Helper::redirect('/tags');
    }
}
