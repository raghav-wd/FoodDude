<?php
include "../includes/config.php";
session_start();

$phno = $_POST['phno'];
$pass = $_POST['pass'];

$phno = mysqli_real_escape_string($conn, $phno);
$pass = mysqli_real_escape_string($conn, $pass);

$phno = htmlentities($phno);
$pass = htmlentities($pass);

$sql = "select * from users where phno='$phno'";
$res = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($res);
$r_pass = $row['password'];

if(password_verify($pass, $r_pass)){

    setcookie("fooddude", $row['phno'], time()+(86400 * 100), "/");

    header("Location: ../index.php");
}
else {
    $_SESSION['message'] = "Username or Password is entered wrong";
    header("Location: index.php");
}

?>