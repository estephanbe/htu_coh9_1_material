<?php

use Core\Helpers\Fake;
use Core\Router;

require_once 'vendor/autoload.php';

spl_autoload_register(function ($class_name) {
    if (strpos($class_name, 'Core') === false)
        return;
    $class_name = str_replace("\\", '/', $class_name); // \\ = \
    $file_path = __DIR__ . "/" . $class_name . ".php";
    require_once $file_path;
});

// This code will run only at the first time of using the app.
Fake::is_first_time();

// For public access
Router::get('/', 'front.index'); // Display home.php
Router::get('/front/post', 'front.single'); // Display home.php

// For web administrators
Router::get('/posts', "posts.index"); // list of posts (HTML)
Router::get('/post', "posts.single"); // Displays single post (HTML)
Router::get('/posts/create', "posts.create"); // Display the creation form (HTML)
Router::post('/posts/store', "posts.store"); // Creates the posts (PHP)
Router::get('/posts/edit', "posts.edit"); // Display the edit form (HTML)
Router::post('/posts/update', "posts.update"); // Updates the posts (PHP)
Router::get('/posts/delete', "posts.delete"); // Delete the post (PHP)

Router::get('/users', "users.index"); // list of users (HTML)
Router::get('/user', "users.single"); // Displays single post (HTML)
Router::get('/users/create', "users.create"); // Display the creation form (HTML)
Router::post('/users/store', "users.store"); // Creates the users (PHP)
Router::get('/users/edit', "users.edit"); // Display the edit form (HTML)
Router::post('/users/update', "users.update"); // Updates the users (PHP)
Router::get('/users/delete', "users.delete"); // Delete the post (PHP)



Router::redirect();
