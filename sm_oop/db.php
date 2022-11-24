<?php

class DB
{
    public $connection;

    public function __construct()
    {
        $servername = "localhost";
        $username = "root";
        $password = "root";
        $database = "c9php_sm1";

        // Create connection
        $this->connection = new mysqli($servername, $username, $password, $database);

        // Check connection
        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }

        return $this->connection;
    }

    public function __destruct()
    {
        $this->connection->close();
    }

    public function submit_query($sql)
    {
        return $this->connection->query($sql);
    }
}
