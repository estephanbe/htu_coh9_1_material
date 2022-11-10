<?php
session_start();

$_SESSION['error'] = null;

// username and password should be between 5 and 10 chars.

if ($_SERVER['REQUEST_METHOD'] != "POST" && empty($_POST)) // check if the form was submitted using POST method and is not empty
    die("You are a bad guy and you are trying to access this code directly!");

// var_dump($_SERVER);
// var_dump($_POST);

$username = isset($_POST['username']) ? $_POST['username'] : null;
$password = isset($_POST['password']) ? $_POST['password'] : null;

$error = false;
$error_msg = '';

$db_username = 'test1234';
$db_pasword = '1234567';



if (!empty($username) && !empty($password)) {
    // check username
    if (strlen($username) > 5 && strlen($username) < 10) {
        // proceed and check if the username is correct
        if ($username != $db_username) {
            $error_msg = "Incorrect username or password";
            $error = true;
        }
    } else {
        $error_msg = "Username should be between 5 and 10 Chars";
        $error = true;
    }

    // check username
    if (strlen($username) > 5 && strlen($username) < 10) {
        // proceed and check if the username is correct
        if ($username == $db_username) {
            //!preg_match('/[1-9a-zA-Z]/', $password) - if we need the password to contain only numbers and letters
            if ($password != $db_pasword) {
                $error_msg = "Incorrect username or password";
                $error = true;
            }
        } else {
            $error_msg = "Incorrect username or password";
            $error = true;
        }
    } else {
        $error_msg = "Username should be between 5 and 10 Chars";
        $error = true;
    }
}


if ($error) {
    $_SESSION['error'] = $error_msg;
    header('Location: ./');
} else {
    $_SESSION['user'] = array('username' => $username);
    header('Location: ./home.php');
}

exit();
