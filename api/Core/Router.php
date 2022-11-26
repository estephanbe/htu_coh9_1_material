<?php

namespace Core;

use Core\Controller\Items;

/**
 * Manages the routing process in the application
 */
class Router
{
    // Requests types
    // GET requests
    protected static $get_routes = array();
    // POST requests
    protected static $post_routes = array();
    // PUT requests
    protected static $put_routes = array();
    // DELETE requests
    protected static $delete_routes = array();

    public static function redirect(): void
    {

        $request = $_SERVER['REQUEST_URI'];
        $routes = array();

        switch ($_SERVER['REQUEST_METHOD']) {
            case 'GET':
                $routes = self::$get_routes;
                break;
            case 'POST':
                $routes = self::$post_routes;
                break;
            case 'PUT':
                $routes = self::$put_routes;
                break;
            case 'DELETE':
                $routes = self::$delete_routes;
                break;
        }

        if (empty($routes) || !array_key_exists($request, $routes)) {
            http_response_code(404);
            die("Page is not existed");
        }

        $controller_namespace = 'Core\\Controller\\';
        $class_arr = explode('.', $routes[$request]);
        $class_name = ucfirst($class_arr[0]);
        $class = $controller_namespace . $class_name;

        $instence = new $class;

        if (count($class_arr) == 2) {
            call_user_func([$instence, $class_arr[1]]);
        }
    }

    public static function get($route, $controller): void
    {
        self::$get_routes[$route] = $controller; // (self::) when we use a static method/property in the class
        // $this->$get_routes[] = $route; // ($this->) when we use the class as an instance (new)
    }

    public static function post($route, $controller): void
    {
        self::$post_routes[$route] = $controller;
    }

    public static function put($route, $controller): void
    {
        self::$put_routes[$route] = $controller;
    }

    public static function delete($route, $controller): void
    {
        self::$delete_routes[$route] = $controller;
    }
}
