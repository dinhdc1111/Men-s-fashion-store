<?php
    session_start();
    require_once('./utils/utility.php');
    require_once('./config/lib_helper.php');
    $sql = "select * from category";
    $menuItems = executeResult($sql);
    $sql = "select product.*, category.name as category_name from product left join category on product.category_id = category.id order by product.updated_at desc limit 0,4";
    $lastestItems = executeResult($sql);
?>
<?php
    if(!isset($_SESSION['cart'])){
        $_SESSION['cart'] = [];
    }
    $count = 0;
    foreach($_SESSION['cart'] as $item){
        $count += $item['num'];
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CiDii Fashion - Young & Dynamic Men's Fashion</title>
    <link rel="stylesheet" href="./assets/css/index.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;500&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/e4b3e97b60.js" crossorigin="anonymous"></script>
    <link rel="icon" href="./assets/image/site_cidii_shop_dark_2.png" type="image/x-icon" />
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="./assets/css/detail.css">
</head>

<body>
    <div class="main">
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
                        <?php
                            $user = getUserToken();
                            if($user == null){
                                echo'
                                <li>
                                <a href="./admin/authentice/login.php">
                                <span><i class="fas fa-user"></i></span>
                                <span>Account</span>
                                </a></li>
                                ';
                            }else if($user['role_id'] != 1){
                                echo'
                                <li>
                                <span><i class="fas fa-user"></i></span>
                                <a href="#"><span>'.$user['fullname'].'</span></a>
                                </li>
                                <li>
                                <a href="./admin/authentice/logout.php" style="text-decoration: none;color: #000;margin-right: 22px;">
                                <span><i class="fas fa-sign-out-alt"></i></span>
                                <span>Logout</span>
                            </a></li>';
                        }
                            
                        ?>
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
                    <a href="../../Assignment-PHP/index.php"><img class="logo-4men" src="./assets/image/logo_shop_cidii.png"
                            alt="Logo" height="64px"></a>
                </div>
                <nav class="nav">
                    <ul class="menu" id="menu">
                        <li>
                            <a href="../../Assignment-PHP/index.php" class="hover">HOME PAGE</a>
                        </li>
                        <!-- Đổ menu item ra index -->
                        <?php
                            foreach($menuItems as $item){
                                echo '<li>
                                    <a href="./category.php?id='.$item['id'].'" class="hover">'.$item['name'].'</a>
                            </li>';
                            }
                        ?>
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
        }
    </script>
        <main class="content" style="text-align: center;">
        <div class="row">
            <div class="col-md-12">
                <h1 style="text-align: center;"><i class="fas fa-check-circle"></i> YOU SUCCESSFULLY ORDERED</h1>
                <h3 style="margin: 50px 0px;">Thank you for using our store's service!<br> <br>Your order will be checked by our staff and delivered to you as soon as possible.</h3>
            </div>
        </div>
        <a href="../Assignment-PHP//index.php"><button class="btn btn-dark" style="border-radius:0px;width: 200px;">CONTINUE SHOPING</button></a>
        </main>
        <!-- end content -->
<?php
    require_once('./layouts/footerUser.php');
?>