<?php
session_start();
include "./functions.php";

$_SESSION['error'] = null;

if ($_SERVER['REQUEST_METHOD'] != "POST" && empty($_POST)) // check if the form was submitted using POST method and is not empty
    die("You are a bad guy and you are trying to access this code directly!");

$title = isset($_POST['title']) ? $_POST['title'] : null;
$excerpt = isset($_POST['excerpt']) ? $_POST['excerpt'] : null;
$description = isset($_POST['description']) ? $_POST['description'] : null;
$is_featured = isset($_POST['is_featured']) ? $_POST['is_featured'] : null;

$error = false;
$error_msg = '';

if (!empty($title) && !empty($excerpt) && !empty($description)) {
    // Get all courses
    $courses = json_decode(file_get_contents('./api_data/courses.json'));
    // add the new course to the all courses array.
    $courses[] = (object) array(
        'id' => count($courses) + 1,
        'title' => $title,
        'excerpt' => $excerpt,
        'description' => $description,
        'featured' => !empty($is_featured) ? 1 : 0
    );
    // convert the new array (courses) to JSON string.
    $json_courses = json_encode($courses);
    // rewrite the courses.json file with the new courses array. 
    file_put_contents('./api_data/courses.json', $json_courses);
} else {
    $error_msg = "Please fillout the required information";
    $error = true;
}

if ($error) {
    $_SESSION['error'] = $error_msg;
    htu_redirect("./create.php");
} else {
    htu_redirect("./all_courses.php");
}
