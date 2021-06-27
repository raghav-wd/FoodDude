<?php
include "../includes/config.php";
$id = $_GET['id'];
$name = $_GET['name'];
$change = $_GET['change'];

//changes values acc to id
$sql = "UPDATE orders SET ".$name." = '$change' WHERE id = '$id'";
mysqli_query($conn, $sql);

if($change == 'Cash' || $change == 'Google Pay' || $change == 'Paytm')
{
    $sql = "SELECT * FROM orders WHERE id='$id'";
    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($res);
    $tot = $row['maggi']*15+$row['oreo']*12+$row['kurkure']*12+$row['lays']*12;
    $how_paid = ($row['p_meth'] == 'Google Pay')? "G_pay": $row['p_meth'];

    $sql = "UPDATE orders SET Cash='0', G_pay='0', Paytm='0' WHERE id='$id'";
    mysqli_query($conn, $sql);

    $sql = "UPDATE orders SET $how_paid='$tot' WHERE id='$id'";
    mysqli_query($conn, $sql);
}



if($name == 'maggi' || $name == 'oreo' || $name == 'kurkure' || $name == 'lays')
{
    $sql = "SELECT * FROM orders WHERE id='$id'";
    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($res);
    $tot = $row['maggi']*15+$row['oreo']*12+$row['kurkure']*12+$row['lays']*12;

    $how_paid = ($row['p_meth'] == 'Google Pay')? "G_pay": $row['p_meth'];
    // echo $tot;
    $sql = "UPDATE orders SET " . $how_paid ."='$tot' WHERE id='$id'";
    $res = mysqli_query($conn, $sql);
    // $row = mysqli_fetch_assoc($res);
}



header('Location: database.php');

?>