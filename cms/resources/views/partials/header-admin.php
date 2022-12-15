<?php

use Core\Helpers\Helper; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News Agency</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= $_SERVER['REQUEST_SCHEME'] . "://" . $_SERVER['HTTP_HOST'] ?>/resources/css/styles.css">
</head>

<body class="admin-view">

    <nav class="navbar navbar-dark bg-dark navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">News Agency</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="/logout">Logout</a>
                    </li>
                </ul>
                <!-- <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form> -->
            </div>
        </div>
    </nav>

    <div id="admin-area" class="row">
        <div class="col-2 admin-links">
            <ul class="list-group list-group-flush mt-3">
                <?php if (Helper::check_permission(['post:read'])) : ?>
                    <li class="list-group-item">
                        <a href="/posts">All Posts</a>
                    </li>
                <?php endif;
                if (Helper::check_permission(['post:create'])) :
                ?>
                    <li class="list-group-item">
                        <a href="/posts/create">Create Post</a>
                    </li>
                <?php endif;
                if (Helper::check_permission(['tag:read'])) : ?>
                    <li class="list-group-item">
                        <a href="/tags">All Tags</a>
                    </li>
                <?php endif;
                if (Helper::check_permission(['tag:create'])) :
                ?>
                    <li class="list-group-item">
                        <a href="/tags/create">Create Tag</a>
                    </li>
                <?php endif;
                if (Helper::check_permission(['user:read'])) :
                ?>
                    <li class="list-group-item">
                        <a href="/users">All Users</a>
                    </li>
                <?php endif;
                if (Helper::check_permission(['user:create'])) :
                ?>
                    <li class="list-group-item">
                        <a href="/users/create">Create User</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
        <div class="col-10 admin-area-content">
            <div class="container my-5">