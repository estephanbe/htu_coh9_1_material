<?php
session_start();
include './includes/env.php';

// first solution
// $current_file_arr = explode('/', $_SERVER['SCRIPT_FILENAME']);
// $current_file_name = $current_file_arr[array_key_last($current_file_arr)];
// if ($current_file_name !== 'index.php'){}

if (!isset($_SESSION['user']) && !strpos($_SERVER['SCRIPT_FILENAME'], 'index.php'))
    header("Location: ./");

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= TITLE ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/styles.css">



    <?php if (isset($_SESSION['user'])) :  ?>
        <style>
            header {
                height: 70vh;
                background-image: url("./assets/images/home_bg.jpeg");
                background-position: center;
                background-size: cover;
                background-repeat: no-repeat;
            }
        </style>
    <?php else : ?>
        <style>
            body {

                height: 100vh !important;
            }

            footer {
                position: absolute;
                bottom: 0;
                left: 0;
                width: 100vw;
            }
        </style>
    <?php endif; ?>

</head>

<body>

    <header>
        <nav class="navbar navbar-expand-lg bg-light px-5">
            <div class="container-fluid">
                <a class="navbar-brand" href="./"><?= TITLE ?></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <?php if (isset($_SESSION['user'])) :
                        $menu_items = json_decode(file_get_contents('./api_data/menu.json'));
                    ?>
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <?php foreach ($menu_items as $item) : ?>
                                <li class="nav-item">
                                    <a class="nav-link 
                                    <?= strpos($_SERVER['SCRIPT_FILENAME'], $item->script_name) ? "active" : null ?>" aria-current="page" href="./<?= $item->script_name ?>">
                                        <?= $item->title ?>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                        <div>
                            <span class="me-3"><?= $_SESSION['user']['display_name'] ?></span>
                            <a href="./auth/logout.php" class="btn btn-danger">Logout</a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </nav>
        <?php if (isset($_SESSION['user'])) :  ?>
            <div id="htu-hero-wrapper" class="w-100 h-100 d-flex justify-content-center align-items-center">
                <div id="htu-hero" class="w-25 h-50 d-flex flex-column justify-content-center align-items-center">
                    <p id="htu-slogan"><?= SLOGAN ?></p>
                    <h1 id="htu-hp-title"><?= TITLE ?></h1>
                    <form class="d-flex w-75" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="s">
                        <button class="btn btn-outline-success" type="submit">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </button>
                    </form>
                </div>
            </div>
        <?php endif; ?>

    </header>