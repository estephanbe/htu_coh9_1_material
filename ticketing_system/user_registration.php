<?php
require './header.php' ?>

<div class="container my-5 p-5">

    <h1 class="text-center my-3">Register</h1>

    <?php if (!empty($_SESSION) && isset($_SESSION['error']) && !empty($_SESSION['error'])) : ?>
        <div class='alert alert-danger w-50 m-auto my-3' role='alert'>
            <?= $_SESSION['error'] ?>
        </div>
    <?php
    endif;
    unset($_SESSION['error']); // to apply flash msgs
    ?>

    <div class="d-flex justify-content-center align-items-center">
        <form class="w-50" action="./auth/create_user.php" method="POST">
            <div class="mb-3">
                <label for="display_name" class="form-label">Full Name</label>
                <input type="text" name="display_name" class="form-control" id="display_name" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1" required>
            </div>
            <button type="submit" class="btn btn-primary">Register</button>
        </form>
    </div>
</div>


<?php require './footer.php' ?>