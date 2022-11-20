<?php


/**
 * TS Redirect - redirects to another script
 *
 * @param String $path
 * @return void
 */
function ts_redirect($path)
{
    header("Location: $path");
    exit();
}

function connect()
{
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $database = "c9php_ts";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $database);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    return $conn;
}

function create_seats($num_of_seats)
{
    // create seats;
    for ($i = 1; $i <= $num_of_seats; $i++) {
        $connection = connect();
        $sql = "INSERT INTO seats (seat_num) VALUES ($i)";
        mysqli_query($connection, $sql);
        mysqli_close($connection);
    }
}

function create_user($email, $password, $display_name)
{
    $connection = connect();
    $id = 0;
    $sql = "INSERT INTO users (email, password, display_name) VALUES ('$email', '$password', '$display_name')";
    if (mysqli_query($connection, $sql)) {
        $id = $connection->insert_id;
    }
    mysqli_close($connection);
    return $id;
}

function get_user($id)
{
    $connection = connect();
    $sql = "SELECT * FROM users WHERE id=$id";
    $result = mysqli_query($connection, $sql);
    mysqli_close($connection);
    return mysqli_fetch_object($result);
}

function get_seats()
{
    $seats = array();
    $connection = connect();
    $sql = "SELECT * FROM seats";
    $result = mysqli_query($connection, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_object($result)) {
            $seats[] = $row;
        }
    }
    mysqli_close($connection);
    return $seats;
}

function get_seat($id)
{
    $connection = connect();
    $sql = "SELECT * FROM seats WHERE id=$id";
    $result = mysqli_query($connection, $sql);
    mysqli_close($connection);
    return mysqli_fetch_object($result);
}

function update_seat_reservation($id, $status)
{
    $connection = connect();
    $sql = <<<EOD
    UPDATE seats
        SET is_available=$status
        WHERE id=$id
    EOD;
    $result = mysqli_query($connection, $sql);
    mysqli_close($connection);
}
