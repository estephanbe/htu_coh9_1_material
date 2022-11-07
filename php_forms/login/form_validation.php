<?php
session_start();

$_SESSION['error'] = null;

// username should be between 5 and 10 chars.

if ($_SERVER['REQUEST_METHOD'] != "POST" && empty($_POST)) // check if the form was submitted using POST method and is not empty
    die("You are a bad guy and you are trying to access this code directly!");

// var_dump($_SERVER);
// var_dump($_POST);

$username = isset($_POST['username']) ? $_POST['username'] : null;
$password = isset($_POST['password']) ? $_POST['password'] : null;

$db_username = 'test1234';
$db_pasword = '1234567';

if (!empty($username) && !empty($password)) {
    if (strlen($username) > 5 && strlen($username) < 10) {
        // proceed and check if the username is correct
    } else {
        $_SESSION['error'] = "Username should be between 5 and 10 Chars";
        // var_dump($_SESSION);
        header('Location: ./');
        exit();
    }
}
