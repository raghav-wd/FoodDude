<?php
include "../includes/config.php";

session_start();

$name = $_POST['name'];
$room_no = $_POST['room_no'];
$hostel = $_POST['hostel'];
$phno = $_POST['phno'];
$pass = $_POST['pass'];
$cpass = $_POST['cpass'];

$name = mysqli_real_escape_string($conn, $name);
$room_no = mysqli_real_escape_string($conn, $room_no);
$hostel = mysqli_real_escape_string($conn, $hostel);
$pass = mysqli_real_escape_string($conn, $pass);
$cpass = mysqli_real_escape_string($conn, $cpass);
$name = htmlentities($name);
$room_no = htmlentities($room_no);
$hostel = htmlentities($hostel);
$pass = htmlentities($pass);
$cpass = htmlentities($cpass);

if($pass != $cpass)$_SESSION['error'] = "Password Mismatched!";
if($hostel == "")$_SESSION['error'] = "Select your Hostel!";
if(strlen($phno) < 10 || strlen($phno) >10)$_SESSION['error'] = "Invalid mobile no.!";
if(strlen($pass) < 8)$_SESSION['error'] = "Password should atleast contain 8 characters.";

$sql = "SELECT phno FROM users WHERE phno='$phno'";
$res = mysqli_query($conn, $sql);
$num_rows = mysqli_num_rows($res);
if($num_rows > 0)$_SESSION['error'] = "Account already exist!";

if(!isset($_SESSION['error']))
{
    $pass = password_hash($pass, PASSWORD_BCRYPT);

    $sql = "insert into users(`phno` ,`name`, `room_no` , `hostel`, `password`) value('$phno', '$name','$room_no', '$hostel', '$pass')";
    $res = mysqli_query($conn, $sql);
    if($res) {
    $sql = "CREATE TABLE "."z".$phno."(id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, maggi BIGINT(5) NOT NULL, oreo BIGINT(5) NOT NULL, kurkure BIGINT(5) NOT NULL, date text NOT NULL)";
    mysqli_query($conn, $sql);
    
    $_SESSION['message'] = "Account Created.";
    header("Location: ../login/index.php");
    }
}
else
{
    header('Location: index.php');
}

?>