<?php
session_start();
include "../functions.php";

$_SESSION['error'] = null;

if ($_SERVER['REQUEST_METHOD'] != "POST" || empty($_POST)) // check if the form was submitted using POST method and is not empty
    die("You are a bad guy and you are trying to access this code directly!");

$email = isset($_POST['email']) ? $_POST['email'] : null;
$password = isset($_POST['password']) ? $_POST['password'] : null;

$error = false;
$error_msg = '';


if (!empty($email) && !empty($password)) {

    $connection = connect();
    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($connection, $sql);
    mysqli_close($connection);
    $user = mysqli_fetch_object($result);

    if (!empty($user)) {
        //validate the password
        if ($user->password != $password) {
            $error_msg = "Incorrect email or password";
            $error = true;
        }
    } else {
        $error_msg = "Incorrect email or password";
        $error = true;
    }
} else {
    $error_msg = "Please fillout the required information";
    $error = true;
}

if ($error) {
    $_SESSION['error'] = $error_msg;
    ts_redirect("../");
} else {
    $_SESSION['user'] = array(
        'display_name' => $user->display_name,
        'is_admin' => $user->is_admin,
        'user_id' => $user->id
    );
    ts_redirect("../home.php");
}
