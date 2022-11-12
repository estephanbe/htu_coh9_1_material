<?php
require './header.php';

$courses = json_decode(file_get_contents('./api_data/courses.json'));


?>
<main class="container my-5">
    <h1 class="text-center">Featured Courses</h1>
    <hr class="w-100 mb-5">
    <div class="row">

        <?php foreach ($courses as $course) :
            if (!$course->featured)
                continue;
        ?>

            <div class="htu-card-wrapper mb-5 col-12 col-md-6 col-lg-4 col-xl-3">
                <div class="card w-100">
                    <img src="./assets/images/c1.jpeg" class="card-img-top" alt="PHP Course">
                    <div class="card-body">
                        <h5 class="card-title">
                            <?= $course->title ?>
                        </h5>
                        <p class="card-text">
                            <?= $course->excerpt ?>
                        </p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>

        <?php endforeach; ?>

    </div>
</main>
<?php require './footer.php' ?>