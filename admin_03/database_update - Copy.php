<?php
include "../includes/config.php";
$id = $_GET['id'];
$name = $_GET['name'];
$change = $_GET['change'];

$sql = "UPDATE orders SET ".$name." = '$change' WHERE id = '$id'";
mysqli_query($conn, $sql);

header('Location: database.php');

?>