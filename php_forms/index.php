<?php
$email_from_db = 'test@test.com';
$password_from_db = '12345';
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PHP Forms</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body class="container my-5">
    <a href="../">Back</a>
    <h1>PHP Forms Demo</h1>
    <hr>


    <div class="my-5">
        <a href="./login/" class="btn btn-primary">Login Form - Full</a>
    </div>

    <?php



    if (!empty($_GET) && isset($_GET['email']) && isset($_GET['password'])) {
        if ($_GET['email'] == $email_from_db && $_GET['password'] == $password_from_db) {
            echo "
            <div class='alert alert-success' role='alert'>
            You are logged in
            </div>
            ";
        } else {
            echo "
            <div class='alert alert-danger' role='alert'>
            Incorrect username or password
            </div>
            ";
        }
    }

    ?>

    <form class="w-50" method="GET" action="./">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" name="password">
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>