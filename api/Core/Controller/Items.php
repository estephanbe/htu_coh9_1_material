<?php

namespace Core\Controller;

use Core\Database\DB;

class Items
{
    protected $db;
    protected $request_body;
    protected $http_code = 200;

    protected $response_schema = array(
        "success" => true, // to provide the response status.
        "message_code" => "", // to provide message code for the front-end developer for a better error handling
        "body" => []
    );

    function __construct()
    {
        $this->db = new DB();
        $this->request_body = json_decode(file_get_contents("php://input", true));


        // Error handling demo
        // $logged_in_user = false;
        // try {
        //     if ($logged_in_user === false) {
        //         // through an error
        //         throw new \Exception("User is not logged in");
        //     }
        // } catch (\Exception $error) {
        //     // handle the error
        //     var_dump($error);
        //     echo $error->getMessage();
        // }
    }

    public function render()
    {
        header("Content-Type: application/json"); // changes the header information
        http_response_code($this->http_code); // set the HTTP Code for the response
        echo json_encode($this->response_schema); // convert the data to json format
    }

    /**
     * Get all items
     *
     * @return void
     */
    public function index()
    {
        $items = array();
        try {
            $result = $this->db->submit_query("SELECT * FROM itemss");
            if (!$result) {
                $this->http_code = 500;
                throw new \Exception("sql_response_error");
            } else {
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_object()) {
                        $items[] = $row;
                    }
                } else {
                    $this->http_code = 404;
                }

                $this->response_schema['body'] = $items;
                $this->response_schema['message_code'] = "items_collected_successfuly";
            }
        } catch (\Exception $error) {
            $this->response_schema['success'] = false;
            $this->response_schema['message_code'] = $error->getMessage();
        }
    }

    /**
     * Get single items
     *
     * @return void
     */
    public function single()
    {
    }

    /**
     * Creates an item
     *
     * @return void
     */
    public function create()
    {

        try {
            if (!isset($this->request_body->name)) {
                $this->http_code = 422;
                throw new \Exception('name_param_not_found');
            }
            if (!$this->db->submit_query("INSERT INTO items (name) VALUES ('{$this->request_body->name}')")) {
                $this->http_code = 500;
                throw new \Exception('item_was_not_created');
            }

            $this->response_schema['message_code'] = "item_created";
        } catch (\Exception $error) {
            $this->response_schema['message_code'] = $error->getMessage();
            $this->response_schema['success'] = false;
        }
    }

    /**
     * Updates an item
     *
     * @return void
     */
    public function update()
    {

        try {
            if (!isset($this->request_body->id)) {
                $this->http_code = 422;
                throw new \Exception('id_param_not_found');
            }

            $item = $this->get_item_by_id($this->request_body->id);

            if (empty($item)) {
                $this->http_code = 404;
                throw new \Exception('item_not_found');
            }

            $completed_status = !(bool) $item->completed;
            $completed_status = $completed_status ? "1" : "0";

            if (!$this->db->submit_query("UPDATE items SET completed=$completed_status WHERE id={$this->request_body->id}")) {
                $this->http_code = 500;
                throw new \Exception('item_was_not_updated');
            }

            $this->response_schema['message_code'] = "item_was_updated";
        } catch (\Exception $error) {
            $this->response_schema['message_code'] = $error->getMessage();
            $this->response_schema['success'] = false;
        }
    }

    /**
     * deletes an item
     *
     * @return void
     */
    public function delete()
    {
        try {
            if (!isset($this->request_body->id)) {
                $this->http_code = 422;
                throw new \Exception('id_param_not_found');
            }

            if (!$this->db->submit_query("DELETE FROM items WHERE id={$this->request_body->id}")) {
                $this->http_code = 500;
                throw new \Exception('item_was_not_deleted');
            }

            $this->response_schema['message_code'] = "item_was_deleted";
        } catch (\Exception $error) {
            $this->response_schema['message_code'] = $error->getMessage();
            $this->response_schema['success'] = false;
        }
    }

    protected function get_item_by_id($id)
    {
        $result = $this->db->submit_query("SELECT * FROM items WHERE id=$id");
        return $result->fetch_object(); // this will get the item and return it. 
    }
}
