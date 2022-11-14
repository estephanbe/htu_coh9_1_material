<?php include "./header.php";

$animals = get_animals_data();
// $_SESSION['animals'] = $animals;
// define random col size for each card
?>



<div class="d-flex flex-row-reverse mt-5">
    <a href="./refresh_api_data.php" class="btn btn-success">Refresh API</a>
</div>

<?php echo_page_title(); ?>

<div class="row justify-content-around">

    <?php foreach ($animals as $animal) : ?>
        <div class="card-wrapper col-<?= rand(3, 6) ?> mb-5">
            <div class="card">
                <!-- <a href="./animal.php?id=<?= $animal->id ?>"> -->
                <form method="GET" action="./animal.php">
                    <img src="<?= $animal->image_link ?>" class="card-img-top" alt="<?= $animal->name ?>">
                    <input type="hidden" name="name" value="<?= $animal->name ?>">
                    <input type="hidden" name="latin_name" value="<?= $animal->latin_name ?>">
                    <input type="hidden" name="animal_type" value="<?= $animal->animal_type ?>">
                    <input type="hidden" name="active_time" value="<?= $animal->active_time ?>">
                    <input type="hidden" name="length_min" value="<?= $animal->length_min ?>">
                    <input type="hidden" name="length_max" value="<?= $animal->length_max ?>">
                    <input type="hidden" name="weight_min" value="<?= $animal->weight_min ?>">
                    <input type="hidden" name="weight_max" value="<?= $animal->weight_max ?>">
                    <input type="hidden" name="lifespan" value="<?= $animal->lifespan ?>">
                    <input type="hidden" name="habitat" value="<?= $animal->habitat ?>">
                    <input type="hidden" name="diet" value="<?= $animal->diet ?>">
                    <input type="hidden" name="geo_range" value="<?= $animal->geo_range ?>">
                    <input type="hidden" name="image_link" value="<?= $animal->image_link ?>">
                    <input type="hidden" name="id" value="<?= $animal->id ?>">
                </form>
                <div class="card-body">
                    <h5 class="card-title"><?= $animal->name ?></h5>
                    <p class="card-text"><?= $animal->diet ?></p>
                </div>
            </div>
        </div>
    <?php endforeach; ?>

</div>



<?php include "./footer.php" ?>