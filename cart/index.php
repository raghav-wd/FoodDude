<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Cart | </title>
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

    <?php
        include "../includes/config.php";
        // //Fetches the status of site on/off
        // $sql = "SELECT * FROM site_status WHERE id='1'";
        // $res = mysqli_query($conn, $sql);
        // $row = mysqli_fetch_assoc($res);
        // $site_status = $row['site_status'];

        // //Redirects to main page when site is off
        // if($site_status == 'off')
        // header("Location: http://fooddude.xyz");

        //Cookies extraction of reg. users
        if(isset($_COOKIE['fooddude']))
        {
            $sql = "SELECT * FROM users WHERE phno='".$_COOKIE['fooddude']."'";
            $res = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($res);
            $name = $row['name'];
            $phno = $row['phno'];
            $room_no = $row['room_no'];
        }
    ?>
    
    <nav class="light-blue lighten-1">
        <!-- navbar content here  -->
        <a href="#" class="brand-logo">Cart</a>
        <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
    </nav>

    <ul id="slide-out" class="sidenav">
        <li>
            <div class="user-view">
                <div class="background">
                </div>
                <div class="name"><i class="material-icons" style="padding: 0 14px 0 4px">person_pin</i><span class="black-text"><?php if(isset($name))echo $name; ?></span></div>
            </div>
        </li>
        <li><a href="../"><i class="material-icons">home</i>Home</a></li>
        <li><a href=""><i class="material-icons">shopping_cart</i>Cart</a></li>
        <li><a class="subheader" href="#!"><i class="material-icons">style</i>Orders</a></li>
        <li>
            <div class="divider"></div>
        </li>
        <li><a class="subheader">Details</a></li>
        <li><a href="../profile/">Profile</a></li>
        <li><a href="../signup/">Sign Up</a></li>
        <li><a href="../login/">Log In</a></li>

        <div class="divider"></div>

        <li><a class="red-text" href="../includes/logout.php">Logout</a></li>

    </ul>

    <div class="row cart">
        <div class="container">
            <div class="col s12 m10 l12">
                <ul class="collapsible hide">
                    <li>
                        <div class="collapsible-header"><i class="material-icons"></i>Order Summary</div>
                        <div class="collapsible-body"><span class="colap-summary"></span></div>
                    </li>
                </ul>
            
                <div class="card-panel white summary">
                    <span class="black-text">
                        <div class="center bill grey-text large">Summary</div>
                        <div class="divider"></div>
            
                        <div class="row">
                            <div class="col s8 m8">
                                <div id="item-details-1"></div>
            
                                <div class="divider"></div>
                                <div class="seperator"></div>
                                <div class="divider"></div>
            
                                <div class="large">Total</div>
                            </div>
                            <div class="col s4 m4">
                                <div id="item-details-2"></div>
            
                                <div class="divider"></div>
                                <div class="seperator"></div>
                                <div class="divider"></div>
            
                                <div id="c-total">___</div>
                            </div>
                        </div>            
                    </span>
                </div>
            
            </div>

            <div class="row">
                <div class="col s12 m10">
                    <div id='p-meth' class="card-panel grey lighten-4 hide">
                        <div id="p-meth-name" class="center grey-text"></div>
            
                        <div class="divider"></div>
                        <div class="seperator"></div>
                        <div class="divider"></div>
            
                        <a href="" class="qrcode" download></a>
            
                        <div class="small red-text">*Payment will be verified when you reach the pickup room.</div>
            
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col s12 m12">
                    <div id='choose' class="card-panel light-blue darken-2">
                        <span class="white-text">
                            Choose a Payment Method
                            <div class="divider"></div>
                            <form action="#">
                                <p>
                                    <label>
                                        <input id="paytm" type="checkbox" />
                                        <span class="white-text">Paytm</span>
                                    </label>
                                </p>
                                <p>
                                    <label>
                                        <input id="googlepay" type="checkbox" />
                                        <span class="white-text">Google Pay</span>
                                    </label>
                                </p>
                                <p>
                                    <label>
                                        <input id="cash" type="checkbox" />
                                        <span class="white-text">Cash</span>
                                    </label>
                                </p>
            
                                Details
                                <div class="divider"></div>
                                <div class="input-field">
                                    <!--If cookies are set site autofills -->
                                    <input id="room_no" type="number" value="<?php if(isset($room_no))echo $room_no; ?>" class="validate">
                                    <label for="room_no">Paari Room No</label>
                                </div>
            
                                <div class="input-field">
                                    <input id="phno" type="number" value="<?php if(isset($phno))echo $phno; ?>" class="validate">
                                    <label for="phno">Payment Mobile No.</label>
                                </div>
            
                            </form>
                        </span>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="proceed">
        <a id='checkout' class="checkout waves-effect waves-light btn blue right">Proceed</a>
    </div>

    <footer class="page-footer light-blue lighten-1">
        <div class="container">
            <div class="row">
                <div class="col l6 s12">
                    <h5 class="white-text">FoodDude</h5>
                    <p class="grey-text text-lighten-4">
                        We provide night snacks
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

            function _(ele) {
                return document.querySelector(ele);
            }

            var grand_tot = 0;
            var p_meth_name;
            $(document).ready(function () {
                $('.sidenav').sidenav();
                $('.collapsible').collapsible();

                // Generates the bill from cookies
                for(i=1; i<10; i++)//APPROX 10
                {
                    if(getCookie('prod_'+i) != '')
                    printItemDetails('prod_'+i);
                }
                
                // Displaying the Grand Total
                _('#c-total').innerHTML = "<div class='large'>"+grand_tot+"/-</div>";

                // Checks if atleast one payment method is selected
                _('#checkout').addEventListener("click", function() {
                    c = 0;
                    if(_("#paytm").checked == true){c++; p_meth_name = "Paytm";} if(_("#googlepay").checked == true) { c++; p_meth_name = "Google Pay"; }; if(_("#cash").checked == true) { c++; p_meth_name = "Cash"; };
                    _('#p-meth-name').innerHTML = p_meth_name;
                    _('.qrcode').innerHTML = "<img style='width: 100%;' src='"+p_meth_name+".jpg'/>";
                    _('.qrcode').setAttribute("href", p_meth_name+".jpg");
                    if (c == 0)
                        M.toast({ html: '<span class="red-text">Select one payment method!</span>' });
                        else if(c > 1)
                        M.toast({ html: '<span class="red-text">Select only one payment method!</span>' });
                        else if(_('#room_no').value == 0 ||  _('#phno').value == 0)
                        M.toast({ html: '<span class="red-text">Fill up the details!</span>' });
                        else
                        {
                            // Leaves the page to cart_prc.php
                            _('#choose').style.display = "none";
                            _('#p-meth').classList.remove('hide');
                            var summary =  document.getElementsByClassName('summary')[0];
                            summary.style.display = "none";
                            document.getElementsByClassName('collapsible')[0].classList.remove('hide');
                            document.getElementsByClassName('colap-summary')[0].innerHTML = summary.innerHTML;

                            var prods = "";
                             _('#checkout').addEventListener("click", function () {
                                 for(i = 1; i<5; i++)
                                 {
                                    if(getCookie('prod_' + i) != '')
                                    {
                                        prods += 'prod_'+i + '=' + getCookie('prod_' + i)+'&';
                                    }
                                 }
                            window.location.href = "cart_prc.php?"+ prods +"p_meth=" + p_meth_name + "&room_no=" + _('#room_no').value + "&phno=" + _('#phno').value+"&grand_tot="+grand_tot;
                        });
                        }
                });
            });

            //Prints the product obj
            function printItemDetails(p_json) {
                var txt = getCookie(p_json);
                var obj = JSON.parse(txt);
                if(obj.nos != 0)
                {
                    _('#item-details-1').innerHTML += "<div><b>"+obj.name+"</b></div><br/>Number of packs<br/>Price per pack<br/>Total";
                    _('#item-details-2').innerHTML += "<div>---</div><br/>"+obj.nos+" nos<br/>"+obj.price+"/-<br/>>"+obj.price*obj.nos;
                }
                grand_tot += obj.price * obj.nos;
            }

            // Gets the value of cookie named cname
            function getCookie(cname) {
                    var name = cname + "=";
                    var decodedCookie = decodeURIComponent(document.cookie);
                    var ca = decodedCookie.split(';');
                    for (var i = 0; i < ca.length; i++) {
                        var c = ca[i];
                        while (c.charAt(0) == ' ') {
                            c = c.substring(1);
                        }
                        if (c.indexOf(name) == 0) {
                            return c.substring(name.length, c.length);
                        }
                    }
                    return "";
                }

        </script>
        

</body>

</html>