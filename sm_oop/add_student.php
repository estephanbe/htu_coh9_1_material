<?php
require_once './db.php';
require_once './student.php';

$student = new Student();
$student->create($_POST);

header('Location: ./');

// if ($student->create($_POST) == true) {
//     // redirect with no error
// } else {
//     // redirect with error
// }
