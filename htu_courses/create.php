<?php
include "./header.php"; ?>

<div class="container my-5 py-4">
    <h1 class="text-center">Create Course</h1>
    <hr class="w-100 mb-5">
    <?php if (!empty($_SESSION) && isset($_SESSION['error']) && !empty($_SESSION['error'])) : ?>
        <div class='alert alert-danger' role='alert'>
            <?= $_SESSION['error'] ?>
        </div>
    <?php endif; ?>
    <form class="w-50" method="POST" action="./store.php">
        <div class="mb-3">
            <label for="course-title" class="form-label">Course Title</label>
            <input type="text" class="form-control" id="course-title" name="title">
        </div>
        <div class="mb-3">
            <label for="course-excerpt" class="form-label">Course Excerpt</label>
            <input type="text" class="form-control" id="course-excerpt" name="excerpt">
        </div>
        <div class="mb-3">
            <label for="course-description" class="form-label">Course Description</label>
            <textarea type="text" class="form-control" id="course-description" name="description"></textarea>
        </div>
        <div class="mb-3">
            <input class="form-check-input" type="checkbox" id="course-featured" name="is_featured">
            <label class="form-check-label" for="course-featured">
                Is Featured?
            </label>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>

<?php include "./footer.php" ?>