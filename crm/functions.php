<?php

function connect()
{
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $database = "coh9_php";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $database);
    // var_dump($conn);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    return $conn;
}

function get_customers()
{
    $sql = "SELECT * FROM Customers";
    $result = mysqli_query(connect(), $sql);

    // $first_row = mysqli_fetch_assoc($result);
    // $second_row = mysqli_fetch_assoc($result);
    // $third_row = mysqli_fetch_assoc($result);
    $customers = array();

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $customers[] = $row;
        }
    }

    return $customers;
}

function get_customer($id)
{
    $sql = "SELECT * FROM Customers WHERE id=$id";
    $result = mysqli_query(connect(), $sql);

    return mysqli_fetch_assoc($result);
}
