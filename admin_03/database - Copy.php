<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Thefoodster | Order in process</title>
    <meta name="Keywords"
        content="Order Food, Paari, Kaari, Sannasi, Manoranjitham, PF, Hostel Food, Snacks, SRM Institute of Science and Technology, Chennai, Kaacheepuram, India">
    <meta name="Description" content="Get snacks">
    <meta name="theme-color" content="#64ffda" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <link rel="stylesheet" type="text/css" media="screen" href="../main.css">
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
</head>

<style>
    body {
        padding-bottom: 140px;
    }
</style>

<body>

<table class="striped responsive-table">
    <thead>
        <tr>
            <th>Id</th>
            <th>Order Number</th>
            <th>Paid</th>
            <th>Room No</th>
            <th>Phone No</th>
            <th>Maggi</th>
            <th>Oreo</th>
            <th>Kurkure</th>
            <th>Lays</th>
            <th>Total</th>
            <th>Pay Method</th>
            <th>Time</th>
            <th>Pickup</th>
        </tr>
    </thead>
    <tbody>

<?php
include "../includes/config.php";

$sql = "SELECT * FROM orders";
$res = mysqli_query($conn, $sql);
$num_arrays = mysqli_num_rows($res);
// echo $num_arrays;

for($j = 1; $j<=$num_arrays; $j++)
{
    $tot = 0;

    $row = mysqli_fetch_assoc($res);

    if(Is_Numeric($row['maggi']))
    $tot += $row['maggi']*15;
    if(Is_Numeric($row['oreo']))
    $tot += $row['oreo']*12;
    if(Is_Numeric($row['kurkure']))
    $tot += $row['kurkure']*12;
    if(Is_Numeric($row['lays']))
    $tot += $row['lays']*12;
    
    echo "<tr>
            <td>".$row['id']."</td>
            <td>".$row['order_no']."</td>
            <td><div class='input-field inline'><input data-change='paid' type='text' data-id='".$row['id']."' value='".$row['paid']."' onkeypress='insert(event, this)'></div></td>
            <td>".$row['room_no']."</td>
            <td>".$row['phno']."</td>
            <td><label for='first_name2'>Maggi</label><div class='input-field inline'><input data-change='maggi' type='text' data-id='".$row['id']."' value='".$row['maggi']."' onkeypress='insert(event, this)'></div></td>
            <td><label for='first_name2'>Oreo</label><div class='input-field inline'><input data-change='oreo' type='text' data-id='".$row['id']."' value='".$row['oreo']."' onkeypress='insert(event, this)'></div></td>
            <td><label for='first_name2'>Kurkure</label><div class='input-field inline'><input data-change='kurkure' type='text' data-id='".$row['id']."' value='".$row['kurkure']."' onkeypress='insert(event, this)'></div></td>
            <td><label for='first_name2'>Lays</label><div class='input-field inline'><input data-change='lays' type='text' data-id='".$row['id']."' value='".$row['lays']."' onkeypress='insert(event, this)'></div></td>
            <td>". $tot ."</td>
            <td><div class='input-field inline'><input data-change='p_meth' type='text' data-id='".$row['id']."' value='".$row['p_meth']."' onkeypress='insert(event, this)'></div></td>
            <td>" .$row['time'] ."</td>
            <td>".$row['pickup']."</td>
        </tr>";
        if($j == $num_arrays)
        {
            if(function_exists('date_default_timezone_set')) {
                date_default_timezone_set("Asia/Kolkata");
            }


            $time = date("H:i");
            if(substr($time, 0, 5) == '00:00' )
            $timeprev = "59:59";
            else if(substr($time, 3, 2) == 0)
            $timeprev = ((int)substr($time, 0, 2) - 1).":59";
            else
            $timeprev = substr($time, 0, 2).":".(((int)substr($time, 3, 4)) - 1);
            // echo $time;
            if(strlen($timeprev) == 4)
            if($timeprev == "0:59")
            $timeprev = '0'.$timeprev;
            else
            $timeprev = $timeprev.'0';
            // echo ;
            if(substr($row['time'], 0, 5) == $time || substr($row['time'], 0, 5) == $timeprev){
                echo "<audio controls autoplay>
                    <source src='yuri.mp3' type='audio/mpeg'>
                    Your browser does not support the audio element.
                    </audio>";
            }
        }
}

?>

</tbody>
</table>

<?php
    $sql =  "SELECT SUM(maggi) FROM orders WHERE paid='YES'";
    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($res);
    $maggi_sum = $row['SUM(maggi)'];

    $sql =  "SELECT SUM(oreo) FROM orders WHERE paid='YES'";
    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($res);
    $oreo_sum = $row['SUM(oreo)'];

    $sql =  "SELECT SUM(kurkure) FROM orders WHERE paid='YES'";
    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($res);
    $kurkure_sum = $row['SUM(kurkure)'];

    $sql =  "SELECT SUM(lays) FROM orders WHERE paid='YES'";
    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($res);
    $lays_sum = $row['SUM(lays)'];
?>
    <div id="instock" class="card-panel teal">
        <span class="white-text">
            <div class="row">
                <div class="col m5">
                    <div class="center">
                        <div class="container">
                            <table class="responsive-table">
                                <thead>
                                    <tr>
                                        <th>Maggi</th>
                                        <th>Oreo</th>
                                        <th>Kurkure</th>
                                        <th>Lays</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><?php echo $maggi_sum; ?></td>
                                        <td><?php echo $oreo_sum; ?></td>
                                        <td><?php echo $kurkure_sum; ?></td>
                                        <td><?php echo $lays_sum; ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </span>
    </div>

<script>
    
    function insert(e, tagchange) {

        if(e.keyCode == '13')
        {
            id = tagchange.getAttribute('data-id');
            name = tagchange.getAttribute('data-change');
            
            window.location.href = 'database_update.php?id='+id+'&name='+name+'&change='+tagchange.value;
        }
    }

    //Refresh the page
    setTimeout(function(){
        location.reload();
    }, 30000)

</script>

</body>
</html>