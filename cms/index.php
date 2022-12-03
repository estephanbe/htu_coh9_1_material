<?php

use Core\Router;

spl_autoload_register(function ($class_name) {
    $class_name = str_replace("\\", '/', $class_name); // \\ = \
    $file_path = __DIR__ . "/" . $class_name . ".php";
    require_once $file_path;
});

Router::get('/', 'front.index'); // Display home.php

Router::get('/posts', "posts.index"); // list of posts (HTML)
Router::get('/posts/create', "posts.create"); // Display the creation form (HTML)
Router::post('/posts/store', "posts.store"); // Creates the posts (PHP)
Router::get('/posts/edit', "posts.edit"); // Display the edit form (HTML)
Router::post('/posts/update', "posts.update"); // Updates the posts (PHP)
Router::get('/posts/delete', "posts.delete"); // Delete the post (PHP)

Router::redirect();
