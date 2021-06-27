<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Maggi</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="../main.css">
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
</head>

<body>
    <?php
    session_start();
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

    <nav class="light-blue lighten-1">
        <!-- navbar content here  -->
        <a href="#" class="brand-logo"></a>
        <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
    </nav>

    <ul id="slide-out" class="sidenav">
        <li>
            <div class="user-view">
                <div class="background">
                    <!-- <img src="IMG_20190206_115024_476.jpg"> -->
                </div>
                <!-- <a href="#user"><img class="circle" src="images/yuna.jpg"></a>
                <a href="#name"><span class="black-text name">John Doe</span></a>
                <a href="#email"><span class="black-text email">jdandturk@gmail.com</span></a> -->
            </div>
        </li>
        <li><a href="../"><i class="material-icons">home</i>Home</a></li>
        <li><a href="../cart/"><i class="material-icons">shopping_cart</i>Cart</a></li>
        <!-- <li><a href="#!"><i class="material-icons">style</i>Orders</a></li> -->
        
        <li><a class="subheader">Details</a></li>
        <li><a class="waves-effect" href="#!">Profile</a></li>
        <li><a class="waves-effect" href="/signup/">Sign Up</a></li>
        <li><a class="waves-effect" href="../login/">Log In</a></li>
    </ul>

    
    <div class="container">
        <div class="row">
            <div class="card-panel center white-text light-blue">
                Profile
                <div class="error red-text small"><?php if(isset($_SESSION['error']))echo $_SESSION['error'];unset($_SESSION['error']); ?></div>
            </div>
            <form class="col s12" method="POST" action="signup.php">
                <div class="row">
                    <div class="input-field col s6">
                        <input name='name' id="name" type="text" value="<?php if(isset($row['name'])) echo $row['name'];?>" class="validate">
                        <label for="name">Name</label>
                    </div>
                    <div class="input-field col s6">
                        <input name="room_no" id="room_no" type="number" value="<?php if(isset($row['room_no'])) echo $row['room_no'];?>" class="validate">
                        <label for="room_no">Room No.</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input name="hostel" id="hostel" type="text" value="<?php if(isset($row['hostel'])) echo $row['hostel'];?>" class="validate">
                        <label for="hostel">Hostel</label>
                    </div>
                </div>
            </form>
        </div>

        <div class="divider"></div>

    </div>


    <footer class="page-footer light-blue lighten-1">
        <div class="container">
            <div class="row">
                <div class="col l6 s12">
                    <h5 class="white-text">FoodDude</h5>
                    <p class="grey-text text-lighten-4">
                        We deliver night snacks
                    </p>
                </div>
                <div class="col l4 offset-l2 s12">
                    <h5 class="white-text">Links</h5>
                    <ul>
                        <li><a class="grey-text text-lighten-3" href="www.stufflost.xyz" target='_blank'>StuffLost</a></li>
                        <li><a class="grey-text text-lighten-3" href="www.wennn.xyz" target='_blank'>Wennn</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <div class="container">
                © 2019 FoodDude
                <a class="grey-text text-lighten-4 right" href="www.theraghavgupta.com" target="_blank">theraghavgupta.com</a>
            </div>
        </div>
    </footer>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="main.js"></script>
    <script>

        $(document).ready(function () {
            $('.sidenav').sidenav();
            $('select').formSelect();
            var num_packs = document.getElementById('num_packs');
            var total = document.getElementById('total');
            num_packs.addEventListener("click", function () {
                document.getElementById('packs').innerHTML = " X " + num_packs.value;
                total.innerHTML = (num_packs.value * 15);
            });
        });

        function submit() {
            alert('hey');
        }

    </script>

</body>

</html>