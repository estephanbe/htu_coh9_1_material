<?php
session_start();
include "../functions.php";

$_SESSION['error'] = null;

if ($_SERVER['REQUEST_METHOD'] != "POST" || empty($_POST)) // check if the form was submitted using POST method and is not empty
    die("You are a bad guy and you are trying to access this code directly!");

$display_name = isset($_POST['display_name']) ? $_POST['display_name'] : null;
$email = isset($_POST['email']) ? $_POST['email'] : null;
$password = isset($_POST['password']) ? $_POST['password'] : null;

$error = false;
$error_msg = '';

if (!empty($email) && !empty($password) && !empty($display_name)) {
    $new_user_id = create_user($email, $password, $display_name);
    if ($new_user_id) {
        $new_user = get_user($new_user_id);
        if (empty($new_user)) {
            $error_msg = "User was not created!";
            $error = true;
        }
    } else {
        $error_msg = "User is already registered by this email";
        $error = true;
    }
} else {
    $error_msg = "Please fillout the required information";
    $error = true;
}

if ($error) {
    $_SESSION['error'] = $error_msg;
    ts_redirect("../user_registration.php");
} else {
    $_SESSION['user'] = array(
        'display_name' => $user->display_name,
        'is_admin' => $user->is_admin,
        'user_id' => $user->id
    );
    ts_redirect("../home.php");
}
