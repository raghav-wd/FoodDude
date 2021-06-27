<html>
<head>
    <meta name="theme-color" content="#18ffff" />
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    </head>
    <body>

    <?php
    include "../includes/config.php";
    //Cookies extraction of reg. users
        if(isset($_COOKIE['fooddude']))
        {
            $sql = "SELECT * FROM users WHERE phno='".$_COOKIE['fooddude']."'";
            $res = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($res);
            $name = $row['name'];
        }
    ?>

    <div class="navbar-fixed">
        <nav class="light-blue lighten-2">
            <!-- navbar content here  -->
            <a href="#" class="brand-logo" style="padding-left: 10px;">Orders</a>
            <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        </nav>
    </div>

    <ul id="slide-out" class="sidenav">
        <li>
            <div class="user-view">
                <div class="background">
                </div>
                <div class="name"><i class="material-icons" style="padding: 0 14px 0 4px">person_pin</i><span class="black-text"><?php if(isset($name))echo $name; ?></span></div>
            </div>
        </li>
        <li><a href="../index.php"><i class="material-icons">home</i>Home</a></li>
        <li><a href="../cart/"><i class="material-icons">shopping_cart</i>Cart</a></li>
         <li><a class="" href="/"><i class="material-icons">style</i>Orders</a></li> 
        <li><a href="#!"></a></li>
        <li><a class="subheader">Details</a></li>
        <li><a class="" href="../profile/">Profile</a></li>
        <li><a class="" href="../signup/">Sign Up</a></li>
        <li><a class="" href="../login/">Log In</a></li>

    </ul>

<?php


$sql = "SELECT * FROM allorders WHERE phno='". $_COOKIE['fooddude'] ."'";
$res = mysqli_query($conn, $sql);
$num_rows = mysqli_num_rows($res);
$colors = array("lime accent-4", "cyan accent-2", " red accent-3", "green accent-3");

if($num_rows != 0)
for($i = 1; $i<= $num_rows; $i++)
{
    $row=mysqli_fetch_assoc($res);
    $color = $colors[rand(0, 3)];
    orders($i, $color, $row['maggi'], $row['oreo'], $row['kurkure'], $row['lays'], explode('||', $row['time'])[1]);
}

function dash($val) {
    if($val == 0 || !isset($val)) return "-"; else return $val;
}

function orders($i, $color, $maggi_nos, $oreo_nos, $kurkure_nos, $lays_nos, $time)
{
    echo 
    '<div class="row">
        <div class="col s12 m5">
            <div class="card-panel '.$color.'">
                <span class="white-text">
                    <table>
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Maggi</th>
                            <th>Oreo</th>
                            <th>Kurkure</th>
                            <th>Lays</th>
                            <th>Time</th>
                        </tr>
                        </thead>

                        <tbody>
                        <tr class="white-text">
                            <td class="black-text">'.$i.'</td>
                            <td>'.dash($maggi_nos).'</td>
                            <td>'.dash($oreo_nos).'</td>
                            <td>'.dash($kurkure_nos).'</td>
                            <td>'.dash($lays_nos).'</td>
                            <td>'.dash($time).'</td>
                        </tr>
                        </tbody>
                    </table>
                </span>
            </div>
        </div>
    </div>';
}



?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <script>

    $('.sidenav').sidenav();

    </script>
</body>
</html>