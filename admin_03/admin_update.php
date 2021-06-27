<?php
include "../includes/config.php";
$name = $_GET['name'];
$change = $_GET['change'];

$sql = "UPDATE site_status SET ".$name." = '$change' WHERE id = '1'";
mysqli_query($conn, $sql);

header('Location: index.php');

?>