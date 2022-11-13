<?php
include "./header.php";
$courses = json_decode(file_get_contents('./api_data/courses.json'));


$search_term = !empty($_GET['s']) ? $_GET['s'] : null;
$final_courses = array();

foreach ($courses as $course) {
    if (strpos($course->description, $search_term) !== false) {
        $final_courses[] = $course;
    }
}

?>

<main class="container my-5">
    <h1 class="text-center">You Are Search For "<?= $search_term ?>"</h1>
    <hr class="w-100 mb-5">
    <div class="row">

        <?php if (!empty($final_courses)) { ?>

            <?php foreach ($final_courses as $course) : ?>

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
                            <a href="./course.php?id=<?= $course->id ?>" class="btn btn-primary">Check Course</a>
                        </div>
                    </div>
                </div>

            <?php endforeach; ?>

        <?php } else {
            echo "<p class='test-center col-12'>Nothing was found!</p>";
        } ?>

    </div>
</main>

<?php
include "./footer.php" ?>