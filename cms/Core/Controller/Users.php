<?php

namespace Core\Controller;

use Core\Base\Controller;
use Core\Model\User;

class Users extends Controller
{
        public function render()
        {
                if (!empty($this->view))
                        $this->view();
        }

        /**
         * Gets all users
         *
         * @return array
         */
        public function index()
        {
                $this->view = 'users.index';
                $user = new User; // new model post.
                $this->data['users'] = $user->get_all();
                $this->data['users_count'] = count($user->get_all());
        }

        public function single()
        {
                $this->view = 'users.single';
                $user = new User();
                $this->data['user'] = $user->get_by_id($_GET['id']);
        }

        /**
         * Display the HTML form for post creation
         *
         * @return void
         */
        public function create()
        {
                $this->view = 'users.create';
        }

        /**
         * Creates new post
         *
         * @return void
         */
        public function store()
        {
                $user = new User();
                $user->create($_POST);
                $this->redirect('/users');
        }

        /**
         * Display the HTML form for post update
         *
         * @return void
         */
        public function edit()
        {
                $this->view = 'users.edit';
                $user = new User();
                $this->data['user'] = $user->get_by_id($_GET['id']);
        }

        /**
         * Updates the post
         *
         * @return void
         */
        public function update()
        {
                $user = new User();
                $user->update($_POST);
                $this->redirect('/user?id=' . $_POST['id']);
        }

        /**
         * Delete the post
         *
         * @return void
         */
        public function delete()
        {
                $user = new User();
                $user->delete($_GET['id']);
                $this->redirect('/users');
        }
}
