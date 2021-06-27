<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>FoodDude | Home</title>
    <meta name="Keywords"
        content="Order Food, Paari, Kaari, Sannasi, Manoranjitham, PF, Hostel Food, Snacks, SRM Institute of Science and Technology, Chennai, Kaacheepuram, India">
    <meta name="Description" content="Get snacks">
    <meta name="theme-color" content="#4fc3f7" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <link rel="stylesheet" type="text/css" media="screen" href="main.css">
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="manifest" href="manifest.json" >
</head>

<body>
    <?php
        include "includes/config.php";
        //Fetches the status of site on/off
        $sql = "SELECT * FROM site_status WHERE id='1'";
        $res = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($res);
        $site_status = $row['site_status'];

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
            <a href="#" class="brand-logo" style="padding-left: 10px;">FoodDude</a>
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
        <li><a href="index.php"><i class="material-icons">home</i>Home</a></li>
        <li><a href="cart/"><i class="material-icons">shopping_cart</i>Cart</a></li>
         <li><a class="" href="orders/"><i class="material-icons">style</i>Orders</a></li> 
        <li><a href="#!"></a></li>
        <li><a class="subheader">Details</a></li>
        <li><a class="" href="profile/">Profile</a></li>
        <li><a class="" href="signup/">Sign Up</a></li>
        <li><a class="" href="login/">Log In</a></li>

    </ul>
    <h4 class="center notice" ></h4>
    <div class="row">
        <div class="container">
            <!-- Displaying Notice when site is off -->
            <h4 class="teal-text notice center" >We're off today !!!</h4>
            <div class="status">
                <div id="items">

                </div>
            </div>
        </div>
    </div>

    <div class="checkout">
        <a href="cart/" class="checkout waves-effect waves-light btn black right">Checkout</a>
    </div>


    <footer class="page-footer light-blue lighten-2">
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

    <div class="container"><br/><br/></div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    
    
    <?php
    
     echo "
    <script>

        var products = [];
        var orders = [];

        $(document).ready(function () {
        
            if ('serviceWorker' in navigator) {
            try {
                navigator.serviceWorker.register('sw.js');
                console.log('sw reg');
            }
            catch (error) {
                console.log('sw not reg');
            }
        }

            if (typeof (EventSource) !== 'undefined') {
                var source = new EventSource('stock_updates.php');
                source.onmessage = function (event) {
                    //Shuts sites on or off
                    site_status = JSON.parse(event.data.split('>>')[4]).sitestatus;
                    if(site_status == 'on')
                    {
                        cn('status', '0').classList.remove('hide');
                        // cn('notice', '0').classList.add('hide');
                    }
                    else
                    {
                        cn('status', '0').classList.add('hide');
                        // cn('notice', '0').classList.remove('hide');
                    }
                };
                } else {
                document.getElementById('result').innerHTML = 'Sorry, your browser does not support server-sent events...';
                }

            $('.sidenav').sidenav();
            // Items Objects
            maggi = {name:'Maggi', price:'15', weight:'60'};
            oreo = { name: 'Oreo', price: '12', weight:'50'};
            kurkure = { name: 'Kurkure', price: '12', weight:'40'};
            lays = {name: 'Lays', price: '12', weight: '40'};

            // Pushing items in Product array
            products.push(maggi, oreo, kurkure, lays);

            for (x = 0; x < products.length; x++) {
                document.cookie = 'prod_' + (x + 1) + '=';
            }

            document.getElementsByTagName('INPUT').value = 0;

            
            // Rendering out items from products
            for(i = 0; i<products.length; i++)
            renderer(products[i]);

            //SSe keeps updating the current stock of each item on the page
            // setInterval(function() {
                if (typeof (EventSource) !== 'undefined') {
                var source = new EventSource('stock_updates.php');
                source.onmessage = function (event) {
                    for(i = 0; i < products.length; i++)
                    {
                        obj = JSON.parse(event.data.split('>>')[i]);
                        cn(obj.name+'-stk','0').innerHTML = '('+obj.instock+')';
                        if(obj.instock == 0) //if stock of an item is 0 it hides it
                        cn(obj.name+'-display', '0').classList.add('hide');
                        else
                        cn(obj.name+'-display', '0').classList.remove('hide');
                    }
                    //Shuts sites on or off
                    site_status = JSON.parse(event.data.split('>>')[4]).sitestatus;
                    if(site_status == 'off')
                    cn('status', '0').classList.add('hide');
                    else
                    cn('status', '0').classList.remove('hide');
                };
                } else {
                document.getElementById('result').innerHTML = 'Sorry, your browser does not support server-sent events...';
                }
            

            var checkout = document.getElementsByClassName('checkout')[0];
            // Creates cookies of items bought
            checkout.addEventListener('click', function () {
                // alert(JSON.stringify(orders[0]));
                for (x = 0; x < orders.length; x++) {
                    document.cookie = 'prod_'+(x+1)+'='+JSON.stringify(orders[x]);
                }
            });

        });

        // Renders out items to DOM
        function renderer(obj) {
            name = obj.name;
            price = obj.price;
            weight = obj.weight;
            render =  _('items');
            render.innerHTML += \"<div class='col s12 m6 l12'><div class='card-panel light-blue darken-2'><span class='white-text'><div class='row'><div class='col s2 m6'><img class='scale-down circle' src='\"+name+\".jpg'/></div><div class='col s10 m6'><div class='head'>\"+name+\"<span class='orange-text \"+name+\"-stk'><span class='loader'></span></span></div></div></div></div><div class='divider'></div><div class='card-panel white \"+name+\"-display'><span class='black-text'>MRP: <span class='right'>\"+price+\" X <span id='\"+name+\"-nos'>0</span>/-</span><div class='divider'></div>Weight: <span class='right'>\"+weight+\" Grams</span><div class='divider'></div><div class='seperator'></div><div class='divider'></div>Total: <span class='right'><span id='\"+name+\"-tot'>0</span>/-</span><form><div class='input-field inline'><input id='\"+name+\"-nos-inp' type='number' value='0'><label for='items'></label><div class='btn waves-effect waves-light blue' onclick='selectnos(this)' data-nos='+1'data-item-name='\"+name+\"' data-price='\"+price+\"'>+</div><div class='btn waves-effect waves-light blue' onclick='selectnos(this)' data-nos='-1' data-item-name='\"+name+\"' data-price='\"+price+\"'>-</div></div></form></div></span></div>\";
        }

        // Updates the item cards values on change of item-nos
        function selectnos(dis) {
            //Extracting obj attributes
            val = ga(dis, 'data-nos');
            item_name = ga(dis, 'data-item-name');
            price = ga(dis, 'data-price');

            // String to int
            item_nos =  _(item_name+'-nos-inp').value;
            item_nos = parseInt(item_nos);

            // On + / - btn click
            if(val == '+1')
            _(item_name + '-nos-inp').value = ++item_nos;
            else
            _(item_name+'-nos-inp').value = --item_nos;
            //Exit
            if(item_nos < 0) return;
            //Outputs
            _(item_name+'-nos').innerHTML = item_nos;
            _(item_name + '-tot').innerHTML = item_nos * price;

            nos = _(item_name+'-nos-inp').value;
            orderList(item_name, nos, price);
        }

        //Creates an order list
        function orderList(item_name, val, price) {
            var obj = {name:item_name, nos:val, price:price};
            // Splices off the product which is already present in products array by comparing name
            for (j = 0; j < orders.length; j++) {
                        if (orders[j].name == obj.name) {
                            orders.splice(j, j + 1);
                        }
            }
            orders.push(obj);
        }

        // Slider
        var slider = document.getElementById('test-slider');
        noUiSlider.create(slider, {
            start: [20, 80],
            connect: true,
            step: 1,
            orientation: 'vertical', // 'horizontal' or 'vertical'
            range: {
                'min': 0,
                'max': 10
            },
            format: wNumb({
                decimals: 0
            })
        });

        // Custom function
        function cn(ele, index) {
            return document.getElementsByClassName(ele)[index];
        }

        function ga(ele, attr) {
            return ele.getAttribute(attr);
        }
        
        function _(ele) {
                return document.getElementById(ele);
        }
    </script>
    ";        
    ?>

</body>

</html>