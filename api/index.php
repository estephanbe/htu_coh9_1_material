<?php
// include './Core/Router.php';
// include './Core/Controller/Items.php';
// include './Core/Database/DB.php';
// INSTEDE OF:

// use Core\Controller\Items;
// use Core\Database\DB;
use Core\Router;
// use Functional\Router as FunctionalRouter;

spl_autoload_register(function ($class_name) {
    $class_name = str_replace("\\", '/', $class_name); // \\ = \
    $file_path = __DIR__ . "/" . $class_name . ".php";
    require_once $file_path;
});

// $router = new Router();
// $Items = new Items();
// $DB = new DB();
// $router2 = new FunctionalRouter();


// Routing tool (Instence)
// $router = new Router();
// $router->add('GET', '/items');

// Routing tool (static)
// Router::get('/items');



// $router->add('POST', '/items');
// $router->add('UPDATE', '/items/1');
// $router->redirect();
// Todo List Items tool

// Routes to perform CRUD operations
// Get all items
Router::get('/', 'front');
Router::get('/items', 'items.index');
Router::get('/items/single', 'items.single');
// Create item
Router::post('/items/create', 'items.create');
// Update item
Router::put('/items/update', 'items.update');
// Delete Item
Router::delete('/items/delete', 'items.delete');

Router::redirect();
