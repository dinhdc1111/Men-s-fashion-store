<?php
    session_start();
    require_once('./utils/utility.php');
    require_once('./config/lib_helper.php');

    $sql = "select * from category";
    $menuItems = executeResult($sql);
    // Truy vấn lấy sp mới nhất
    $sql = "select product.*, category.name as category_name from product left join category on product.category_id = category.id order by product.updated_at desc limit 0,8";
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
    <script type="text/javascript">
        function addCart(productId, num){
            $.post('api/ajax_request.php',{
                'action': 'cart',
                'id': productId,
                'num': num
            },function(data){
                location.reload()
            })
        }
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
                            </a></li>';}
                            
                        ?>
                        <li><a href="cart.php">
                                <span><i class="fas fa-shopping-bag"></i></span>
                                <span>Cart<span style="color: red;">(<?=$count?>)</span></span>
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
            }</script>