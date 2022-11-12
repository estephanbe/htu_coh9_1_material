<?php
require './header.php' ?>

<div class="container my-5 p-5">

    <?php if (!empty($_SESSION) && isset($_SESSION['error']) && !empty($_SESSION['error'])) : ?>
        <div class='alert alert-danger' role='alert'>
            <?= $_SESSION['error'] ?>
        </div>
    <?php endif; ?>

    <form class="w-50" action="./auth/validation.php" method="POST">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1" required>
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
    </form>
</div>


<?php require './footer.php' ?>