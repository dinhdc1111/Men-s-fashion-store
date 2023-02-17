<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CiDii Fashion - Young & Dynamic Men's Fashion</title>
    <!-- CSS -->
    <link rel="stylesheet" href="../../assets/css/index.css">
    <link rel="stylesheet" href="../../assets/css/login.css">
    <link rel="stylesheet" href="../../assets/css/register.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;500&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/e4b3e97b60.js" crossorigin="anonymous"></script>
    <link rel="icon" href="../../assets/image/site_cidii_shop_dark_2.png" type="image/x-icon" />
    <!-- Jquery CDN -->
    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v13.0"
        nonce="OpO7vmPD"></script>
    <!-- Lib WOW js animation  -->
    <link rel="stylesheet" href="https://cdn.rawgit.com/daneden/animate.css/v3.1.0/animate.min.css">
    <script src="https://cdn.rawgit.com/matthieua/WOW/1.0.1/dist/wow.min.js"></script>
    <script>
        new WOW().init();
    </script>
</head>

<body>
    <div class="main">
        <!-- Begin: Header -->
        <header class="header">
            <!-- Begin : top-bar -->
            <div class="top-bar">
                <div class="top-bar__left">
                    <ul>
                        <li><a href="tel:0982022969">
                                <span><i class="fa fa-phone"></i></span>
                                <span><b>0982.022.969</b></span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="top-bar__right">
                    <ul>
                        <li><a href="../Signin/index.html">
                                <span><i class="fas fa-user"></i></span>
                                <span>Account</span>
                            </a></li>
                        <li><a href="../cart/index.html">
                                <span><i class="fas fa-shopping-bag"></i></span>
                                <span>Cart</span>
                            </a></li>
                    </ul>
                </div>
            </div>
            <!-- End : top-bar -->
            <div class="site-header" id="main-header">
                <div class="logo wow fadeInDown " data-wow-delay "0.5s">
                    <a href="../../index.php"><img class="logo-4men" src="../../assets/image/logo_shop_cidii.png"
                            alt="Logo" height="64px"></a>
                </div>
                <nav class="nav">
                    <ul class="menu" id="menu">
                        <li>
                            <a href="../../index.php" class="hover">HOME PAGE</a>
                        </li>
                        <li>
                            <a href="#" class="hover">MENS SHIRT</a>
                            <ul class="sub_menu">
                                <li><a href="#">Shirt</a></li>
                                <li><a href="#">Polo Shirt</a></li>
                                <li><a href="#">Sweater</a></li>
                                <li><a href="#">Coat</a></li>
                                <li><a href="#">Sweatshirts</a></li>
                                <li><a href="#">Hoodie</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#" class="hover">MALE PANTS</a>
                            <ul class="sub_menu">
                                <li><a href="#">Jeans</a></li>
                                <li><a href="#">Short</a></li>
                                <li><a href="#">Trousers</a></li>
                                <li><a href="#">Jogger Pants</a></li>
                                <li><a href="#">Kaki Pant</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#" class="hover">ACCESSORY</a>
                            <ul class="sub_menu">
                                <li><a href="#">Balo</a></li>
                                <li><a href="#">Footwear</a></li>
                                <li><a href="#">Men's hats</a></li>
                            </ul>
                        </li>
                        <li><a href="#" class="hover">CONTACT US</a></li>
                    </ul>
                </nav>
                <div class="form-inline search">
                    <input type="text" id="inputForm" class="form-control" placeholder="Search..">
                    <input type="submit" class="btnSearch">
                </div>
            </div>
        </header>
        <!-- Scroll Menu - W3S -->
        <script>
            window.onscroll = function () { myFunction() };
            var header = document.getElementById("main-header");
            var sticky = header.offsetTop;
            function myFunction() {
                if (window.pageYOffset > sticky) {
                    header.classList.add("sticky");
                } else {
                    header.classList.remove("sticky");
                }
            }</script>