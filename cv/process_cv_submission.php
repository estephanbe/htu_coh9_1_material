<?php

if ($_SERVER['REQUEST_METHOD'] != "POST" || empty($_POST)) // check if the form was submitted using POST method and is not empty
    die("You are a bad guy and you are trying to access this code directly!");


$fname = isset($_POST['fname']) ? $_POST['fname'] : null;
$lname = isset($_POST['lname']) ? $_POST['lname'] : null;
$dob = isset($_POST['dob']) ? $_POST['dob'] : null;
$phone = isset($_POST['phone']) ? $_POST['phone'] : null;
$email = isset($_POST['email']) ? $_POST['email'] : null;
$address = isset($_POST['address']) ? $_POST['address'] : null;
$objective = isset($_POST['objective']) ? $_POST['objective'] : null;
$institute = isset($_POST['institute']) ? $_POST['institute'] : null;
$gdate = isset($_POST['gdate']) ? $_POST['gdate'] : null;
$company = isset($_POST['company']) ? $_POST['company'] : null;
$sdate = isset($_POST['sdate']) ? $_POST['sdate'] : null;

$cvs = json_decode(file_get_contents('./cvs.json'));
$id = count($cvs) + 1;

// /Applications/MAMP/tmp/php/phpLmLsmQ
// ./cv_photos/cv-1.jpeg
// move file from temp directory to new directory. 
$file_name = '';
if (!empty($_FILES)) {
    // $ext_arr = explode('/', $_FILES['photo']['type']);
    // $ext = $ext_arr[array_key_last($ext_arr)];
    $file_ext = substr(
        $_FILES['photo']['type'], // 'image/jpeg'
        strpos($_FILES['photo']['type'], '/') + 1 // 5
    );
    $file_name = "cv-$id.$file_ext";
    move_uploaded_file($_FILES['photo']['tmp_name'], "./cv_photos/$file_name");
}

$cvs[] = array(
    'id' => $id,
    'fname' => $fname,
    'lname' => $lname,
    'dob' => $dob,
    'phone' => $phone,
    'email' => $email,
    'address' => $address,
    'objective' => $objective,
    'institute' => $institute,
    'gdate' => $gdate,
    'company' => $company,
    'sdate' => $sdate,
    'photo' => $file_name
);

file_put_contents('./cvs.json', json_encode($cvs));


header("Location: ./cv_template.php?id=$id");
