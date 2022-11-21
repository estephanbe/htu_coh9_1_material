<?php include "./header.php";
?>


<div class="row my-5">
    <?php foreach (get_seats() as $seat) : ?>
        <?php
        // if the seat is available, allow any user to reserve the seat. 
        if ($seat->is_available) {
        ?>
            <a href="./seat_reservation.php?id=<?= $seat->id ?>" class="ts-seat col-2 mb-4 m-2 d-flex justify-content-center align-items-center <?= $seat->is_available ? 'available-seat' : 'unavailable-seat' ?>">
                <?= $seat->seat_num ?>
            </a>
            <?php
        } else {
            // if the seat is unavailable, check if the current user is the user who reserved the seat.
            if ($_SESSION['user']['user_id'] == $seat->user_id) {
                // true?
                // allow the user to unreserve the seat. 
            ?>
                <a href="./seat_reservation.php?id=<?= $seat->id ?>" class="ts-seat col-2 mb-4 m-2 d-flex justify-content-center align-items-center <?= $seat->is_available ? 'available-seat' : 'unavailable-seat' ?>">
                    <?= $seat->seat_num ?>
                </a>
            <?php
            } else {
                // false? 
                // Do not allow the user to unreserve the seat. 
            ?>
                <div class="ts-seat col-2 mb-4 m-2 d-flex justify-content-center align-items-center <?= $seat->is_available ? 'available-seat' : 'unavailable-seat' ?>">
                    <?= $seat->seat_num ?>
                </div>
        <?php
            }
        }

        ?>



    <?php endforeach; ?>

</div>



<?php include "./footer.php" ?>