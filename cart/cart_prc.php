<?php
include "../includes/config.php";

$Maggi_nos = "0";
$Oreo_nos = "0";
$Kurkure_nos = "0";
$Lays_nos = "0";

for($i = 1; $i<5; $i++)
{
    if($_COOKIE['prod_'.$i] != '')
    {
        $obj = json_decode($_COOKIE['prod_'.$i]);
        if($obj->name == 'Maggi')
        $Maggi_nos = $obj->nos;
        if($obj->name == 'Oreo')
        $Oreo_nos = $obj->nos;
        if($obj->name == 'Kurkure')
        $Kurkure_nos = $obj->nos;
        if($obj->name == 'Lays')
        $Lays_nos = $obj->nos;
    }
}

$p_meth = $_GET['p_meth'];
$room_no = $_GET['room_no'];
$phno = $_GET['phno'];
$grand_tot = $_GET['grand_tot'];

$order_no = "#ORD".mt_rand(1000, 9999);

$rishi = 8299024870;
$aditya = 8052059089;

$how_paid = ($p_meth == 'Google Pay')? "G_pay": $p_meth;
$how_much_paid = $Maggi_nos*15+$Oreo_nos*12+$Kurkure_nos*12+$Lays_nos*12;

//Randomness in pickups
// if($room_no < 699){$pickup = 504; $contact = $mudit;}
if($room_no < 1100)
        {   
            // $r = mt_rand(0,1);
            $pickup = 702; $contact = $rishi;
        }


// set the timezone first
if(function_exists('date_default_timezone_set')) {
    date_default_timezone_set("Asia/Kolkata");
}

// then use the date functions, not the other way around
$date = date("d/m/Y");
$date1 =  date("H:i a");
$time = $date1."||".$date;
$paid = "NOT";

//Blocks same orders at same time
$sql = "SELECT * FROM orders WHERE room_no='$room_no' AND phno='$phno' AND maggi='$Maggi_nos' AND oreo='$Oreo_nos' AND kurkure='$Kurkure_nos' AND lays = '$Lays_nos' AND time='$time'";
$res = mysqli_query($conn, $sql);

//Ignores blank entries
if(mysqli_num_rows($res)<=0 && ($Maggi_nos != "" || $Oreo_nos != "" || $Kurkure_nos != "" || $Lays_nos != ""))
{
    $sql = "insert into `orders`(`order_no`,`paid`, `room_no`, `phno`, `maggi`, `oreo`, `kurkure`, `lays`, `p_meth`, `$how_paid`, `time`, `pickup`) values('$order_no', '$paid', '$room_no', '$phno', '$Maggi_nos', '$Oreo_nos', '$Kurkure_nos', '$Lays_nos', '$p_meth', '$how_much_paid', '$time', '$pickup')";
    $res = mysqli_query($conn, $sql);
}

?>
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

<body>

    <div class="center">
        <div class="container" style="font-size: 18px;">
            <h5>Your Order has been registered</h5>
            
            <div class="divider"></div>
            <div class="seperator"></div>
            <div class="divider"></div>

            <div class="row">
                <div class="col s6 m6">
                    <div class="left"><span class="grey-text">Order No:</span></div><br/>
                    <div class="left"><span class="grey-text">Pickup Room:</span></div><br/>
                    <div class="left"><span class="grey-text">Conctact Us:</span></div>
                </div>

                <div class="col s6 m6">
                    <div><div class="left"><span class="red-text"><?php echo $order_no;?></span></div></div><br/>

                    <div><div class="left"><span class="black-text"><?php echo $pickup;?></span></div></div><br/>

                    <div><div class="left"><span class="black-text"><?php echo $contact;?></span></div></div>
                </div>
                <br/>
            <br/>
        </div>

        <div class="divider"></div>
        <div class="seperator"></div>
        <div class="divider"></div>

        <div class="center">
            <div>
                <span class="large">Instruction</span>
            </div>
            <!-- <div><span class="grey-text small">1. Wait for your Order number.</span></div> -->
            <div><span class="grey-text small">1. Reach the pickup room and collect your Order.</span></div>
            <div><span class="red-text small">*Refresh the homepage before placing the order for getting latest updates.</span>
            </div>
        </div>          

        <div class="bottom">
            <div class="blue-text">We recommend you to take a screenshot.</div>
            <div class="blue-text">Come Again!</div>
        </div>

    </div>

   

</body>

</html>