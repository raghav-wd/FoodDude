<?php

include "../includes/config.php";

//fetching last_id
$sql = "SELECT last_id FROM site_status WHERE id='1'";
$res = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($res);
$last_id = $row['last_id'];

//inserting all records uptill last_id
$sql = "INSERT allorders SELECT * FROM orders WHERE id>'$last_id'";
$res = mysqli_query($conn, $sql);

//calculating last_id
$sql = "SELECT MAX(id) FROM orders";
$res = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($res);
$last_id = $row['MAX(id)'];

//upadating last id
$sql =  "UPDATE site_status SET last_id='$last_id' WHERE id='1'";
$res = mysqli_query($conn, $sql);

//deleting old records
$sql = "DELETE FROM orders";
$res = mysqli_query($conn, $sql);

header('location: database.php');