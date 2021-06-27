<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>FoodDude | Admin</title>
    <meta name="Keywords"
        content="Order Food, Paari, Kaari, Sannasi, Manoranjitham, PF, Hostel Food, Snacks, SRM Institute of Science and Technology, Chennai, Kaacheepuram, India">
    <meta name="Description" content="Get snacks">
    <meta name="theme-color" content="#64ffda" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <link rel="stylesheet" type="text/css" media="screen" href="main.css">
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
</head>

<body>

    <?php
        include "../includes/config.php";
         
        //Updates the inputed status of site
        if(isset($_GET['onoff']))
        {
            $sql = "UPDATE site_status SET site_status='".$_GET['onoff']."' WHERE id='1'";
            mysqli_query($conn, $sql);
        }

        //Fetches the current status of site and then displays
        $sql = "SELECT * FROM site_status WHERE id='1'";
        $res = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($res);
        $site_status = $row['site_status'];
        
        ?>

    <nav class="white accent-3">
        <!-- navbar content here  -->
        <a href="#" class="brand-logo grey" style="padding: 0 10px 0 10px">FoodDude [Admin]</a>
        <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
    </nav>

    <div class="row">
        <div class="col s12 m5">
            <div class="card-panel white">
                <span class="white-text">
                    <div class="card-panel blue">
                        <h2 class="black-text center">Status</h2>
                    </div>
                    <div class="container">
                        <h5 class="red-text">Turn OFF or ON</h5>
                        <div class="black-text">Status: <?php echo $site_status;?></div>
                        <!-- Switch -->
                        <div class="switch">
                            <label>
                                Off
                                <input id="onoff" name="onoff" type="checkbox" value="off" onclick="this.value = (this.value == 'off')?'on':'off';"><!--Toggle between on and off on click-->
                                <span class="lever"></span>
                                On
                            </label>
                            
                        </div>

                        <button class="btn waves-effect waves-light right" type="submit" onclick="window.location.href='index.php?onoff='+_('#onoff').value">Submit
                            <i class="material-icons right">send</i>
                        </button>
                        <br />
                    </div>
                </span>
            </div>
        </div>

        <div class="col s12 m5">
            <div class="card-panel white">
                <span class="white-text">
                    <div class="card-panel blue">
                        <h2 class="black-text center">Stocks</h2>
                    </div>
                    <div class="container">
                        <div class="input-field inline">
                            <input id="prod_inline" type="text" value="<?php echo $row['maggi_stock']; ?>" data-change="maggi_stock" onkeypress="insert(event, this)">
                            <label class="active" for="prod_inline">Maggi</label>
                        </div>
                        <div class="input-field inline">
                            <input id="prod_inline" type="text" value="<?php echo $row['oreo_stock']; ?>" data-change="oreo_stock" onkeypress="insert(event, this)">
                            <label class="active" for="prod_inline">Oreo</label>
                        </div>
                        <div class="input-field inline">
                            <input id="prod_inline" type="text" value="<?php echo $row['kurkure_stock']; ?>" data-change="kurkure_stock" onkeypress="insert(event, this)">
                            <label class="active" for="prod_inline">Kurkure</label>
                        </div>
                        <div class="input-field inline">
                            <input id="prod_inline" type="text" value="<?php echo $row['lays_stock']; ?>" data-change="lays_stock" onkeypress="insert(event, this)">
                            <label class="active" for="prod_inline">lays</label>
                        </div>
                        <br/>
                    </div>
                </span>
            </div>
        </div>
    </div>


    <script>

        document.addEventListener('DOMContentLoaded',function() {
            
        })

        function insert(e, tagchange) {

        if(e.keyCode == '13')
        {
            id = tagchange.getAttribute('data-id');
            name = tagchange.getAttribute('data-change');
            
            window.location.href = 'admin_update.php?name='+name+'&change='+tagchange.value;
        }
        }

        function cn(ele, index) {
            return document.getElementsByClassName(ele)[index];
        }

        function ga(ele, attr) {
            return ele.getAttribute(attr);
        }

        function _(ele) {
            return document.querySelector(ele);
        }

    </script>

</body>

</html>
