<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Maggi | Login</title>
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
    ?>
    <nav>
        <!-- navbar content here  -->
        <a href="#" class="brand-logo"></a>
        <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
    </nav>

    <ul id="slide-out" class="sidenav">
        <li>
            <div class="user-view">
                <div class="background">
                </div>
            </div>
        </li>
        <li><a href="../"><i class="material-icons">home</i>Home</a></li>
        <li><a href="../cart/"><i class="material-icons">shopping_cart</i>Cart</a></li>
        <!-- <li><a href="#!"><i class="material-icons">style</i>Orders</a></li> -->

        <li><a href="#!"></a></li>

        <li><a class="subheader">Details</a></li>
        <li><a class="waves-effect" href="#!">Profile</a></li>
        <li><a class="waves-effect" href="../signup/">Sign Up</a></li>
        <li><a class="waves-effect" href="/login/">Log In</a></li>
    </ul>


    <div class="container">
        <div class="row">
            <div class="card-panel center red-text" style="padding: 10px;">
                <span class="large">Login</span>
                <div class="error red-text small"><?php if(isset($_SESSION['message']))echo $_SESSION['message'];unset($_SESSION['message']); ?></div>
            </div>
            <form class="col s12" method="POST" action="login.php">
                <div class="row">
                    <div class="input-field col s12">
                        <input name="phno" id="number" type="number" class="validate">
                        <label for="number">Mobile Number</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input name="pass" id="password" type="password" class="validate">
                        <label for="password">Password</label>
                    </div>
                </div>
                <button class="btn waves-effect waves-light right">Login
                    <i class="material-icons right">send</i>
                </button>
            </form>
        </div>

        <div class="divider"></div>

        <br/>

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
            var num_packs = document.getElementById('num_packs');
            var total = document.getElementById('total');
            num_packs.addEventListener("click", function () {
                document.getElementById('packs').innerHTML = " X " + num_packs.value;
                total.innerHTML = (num_packs.value * 15);
            });

        });


    </script>

</body>

</html>