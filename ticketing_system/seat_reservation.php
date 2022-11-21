<?php
session_start();
if (empty($_GET['id']))
    die("You are trying to access directly!");
include './functions.php';

$seat = get_seat($_GET['id']);

// if the seat is available, allow any user to reserve the seat. 
// if the seat is unavailable, check if the current user is the user who reserved the seat.
// true?
// allow the user to unreserve the seat. 
// false? 
// Do not allow the user to unreserve the seat. 

if ($seat->is_available) {
    update_seat_reservation($seat->id, 0, $_SESSION['user']['user_id']);
} else {
    if ($_SESSION['user']['user_id'] != $seat->user_id)
        die('You are trying to unreserve a seat that does not belong to you!');
    update_seat_reservation($seat->id, 1, null);
}


ts_redirect('./home.php');
