<?php
if (empty($_GET['id']))
    die("You are trying to access directly!");
include './functions.php';

$seat = get_seat($_GET['id']);

var_dump($seat);

if ($seat->is_available) {
    update_seat_reservation($seat->id, 0);
} else {
    update_seat_reservation($seat->id, 1);
}


ts_redirect('./home.php');
