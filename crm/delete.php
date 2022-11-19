<?php
require './functions.php';


$id = $_GET['id'];

$sql = "DELETE FROM Customers WHERE id=$id";
$result = mysqli_query(connect(), $sql);

header('Location: ./');
