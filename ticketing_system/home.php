<?php include "./header.php";

var_dump($_SESSION);
?>


<div class="row my-5">

    <?php foreach (get_seats() as $seat) : ?>
        <a href="./seat_reservation.php?id=<?= $seat->id ?>" class="ts-seat col-2 mb-4 m-2 d-flex justify-content-center align-items-center <?= $seat->is_available ? 'available-seat' : 'unavailable-seat' ?>">
            <?= $seat->seat_num ?>
        </a>
    <?php endforeach; ?>

</div>



<?php include "./footer.php" ?>