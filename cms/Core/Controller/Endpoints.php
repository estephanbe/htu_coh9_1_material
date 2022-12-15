<?php

namespace Core\Controller;

use Core\Base\Controller;
use Core\Helpers\Tests;
use Core\Model\Post;
use Exception;

class Endpoints extends Controller
{
        use Tests;

        protected $request_body;
        protected $http_code = 200;

        protected $response_schema = array(
                "success" => true, // to provide the response status.
                "message_code" => "", // to provide message code for the front-end developer for a better error handling
                "body" => []
        );

        function __construct()
        {
                $this->request_body = (array) json_decode(file_get_contents("php://input"));
        }

        public function render()
        {
                header("Content-Type: application/json"); // changes the header information
                http_response_code($this->http_code); // set the HTTP Code for the response
                echo json_encode($this->response_schema); // convert the data to json format
        }

        function posts()
        {
                try {
                        $post = new Post;
                        $posts = $post->get_all();
                        if (empty($posts)) {
                                throw new \Exception('No posts were found!');
                        }
                        $this->response_schema['body'] = $posts;
                        $this->response_schema['message_code'] = "posts_collected_successfuly";
                } catch (\Exception $error) {
                        $this->response_schema['success'] = false;
                        $this->response_schema['message_code'] = $error->getMessage();
                        $this->http_code = 404;
                }
        }

        function posts_create()
        {
                self::check_if_empty($this->request_body);
                try {
                        $post = new Post;
                        $post->create($this->request_body);
                        $this->response_schema['message_code'] = "post_created_successfuly";
                } catch (\Exception $error) {
                        $this->response_schema['message_code'] = "post_was_not_created";
                        $this->http_code = 421;
                }
        }
}
