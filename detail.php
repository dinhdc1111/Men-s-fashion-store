<?php
    session_start();
    require_once('./utils/utility.php');
    require_once('./config/lib_helper.php');

    $sql = "select * from category";
    $menuItems = executeResult($sql);
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
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="./assets/css/detail.css">
    <script type="text/javascript">
        // Xử lý tăng giảm số lượng sp
        function addMoreCart(delta){
            num = parseInt($('[name=num]').val())
            num += delta
            if(num<1) num =1;
            $('[name=num]').val(num)
        }
        // Hàm fix số âm
        function fixCartNum(){
            $('[name=num]').val(Math.abs($('[name=num]').val()))
        }
        // code chung gọi tới ajax
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
                        <li><a href="./cart.php">
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
<?php
    $productId=getGet('id');
    $sql = "select product.*, category.name as category_name from product left join category on product.category_id = category.id where product.id =  $productId";
    $product = executeResult($sql,true);
    $category_id = $product['category_id'];
    $sql = "select product.*, category.name as category_name from product left join category on product.category_id = category.id where product.category_id = $category_id order by product.updated_at desc limit 0,4";
    $lastestItems = executeResult($sql);
?>

        <div class="app">
                    <div class="content">
                        <main>
                            <div class="content__left">
                                <div class="img">
                                    <img src="./<?=$product['thumbnail']?>" alt="#">
                                </div>
                            </div>
                            <div class="content__right">
                                <div class="info">
                                    <h1><b><?=$product['title']?></b></h1>
                                    <ul style="display: flex; list-style-type: none; margin: 0px; padding: 0px;">
                                        <li style="color: orange; font-size: 13pt; padding-top: 2px; margin-right: 5px;">5.0</li>
                                        <li style="color: orange; padding: 2px;">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
                                        </svg>
                                        </li>
                                        <li style="color: orange; padding: 2px;">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
                                        </svg>
                                        </li>
                                        <li style="color: orange; padding: 2px;">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
                                        </svg>
                                        </li>
                                        <li style="color: orange; padding: 2px;">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
                                        </svg>
                                        </li>
                                        <li style="color: orange; padding: 2px;">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
                                        </svg>
                                        </li>
                                        <li style="margin-left: 20px; border-left: solid #dad7d7 1px; font-size: 13pt; padding-top: 3px; padding-left: 20px;">4,742 Quantity Sold</li>
                                    </ul>
                                    <p style="color:red">Stocking</p>
                                </div>
                                <div class="price" style="font-size: 30px;">
                                    <?=number_format($product['discount'])?> VND
                                </div>
                                <p style="font-size: 15px; color:gray; text-decoration: line-through;"><?=number_format($product['price'])?> VND</p>
                                <div class="color">
                                    <p>Color</p>
                                    <button>
                                        <img src="./<?=$product['thumbnail']?>" alt="#">
                                    </button>
                                </div>
                                <div class="size">
                                    <p>Size</p>
                                    <span>M</span>
                                    <span>X</span>
                                    <span>XL</span>
                                </div>
                                <div class="quantity">
                                    <p>Quatity</p>
                                    <div style="display:flex;">
                                        <button class="btn btn-light" style="border-radius: 0px;border: 1px solid #e5e5e5;" onclick="addMoreCart(-1)">-</button>
                                        <input type="number" name="num" step="1" class="form-control" value="1" style="border-radius:0px;width:70px;" onchange="fixCartNum()">
                                        <button class="btn btn-light" style="border-radius: 0px;border: 1px solid #e5e5e5;" onclick="addMoreCart(1)">+</button>
                                    </div>
                                </div>
                                <div class="btn" style="padding: 0;">
                                    <input type="button" value="ADD TO CART" style="border-radius:0px;" onclick="addCart(<?=$product['id']?>, $('[name=num]').val())">
                                </div>
                            </div>
                            <div class="col-md-12" style="margin: 20px 0 30px 0;">
                            <h3>Product details</h3>
                                <?=$product['description']?>
                            </div>
                        </main>
                    </div>
                </div>
                <!-- end app -->

    <div class="content">
            <h2 class="title-products" style="text-align: center;">
                RELATED PRODUCTS
            </h2>
        <div class="total-products">
            <div class="products">
                <?php
                    foreach($lastestItems as $item){
                        echo'<div class="item-product">
                        <a href="detail.php?id='.$item['id'].'">
                            <img src="./'.$item['thumbnail'].'" alt="#" style="width: 280px">
                        </a>
                        <h3 class="name-product">
                            <a href="detail.php?id='.$item['id'].'">'.$item['title'].'</a>
                        </h3>
                        <span class="price">'.number_format($item['discount']).' VND</span>
                    </div>';
                    }
                ?>
            </div>
        </div>
        <!-- New products -->
    </div>
    <!-- end content -->
<?php
    require_once('./layouts/footerUser.php');
?>