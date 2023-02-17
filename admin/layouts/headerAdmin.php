<?php
    session_start();
    require_once($baseUrl.'../utils/utility.php');
    require_once($baseUrl.'../config/lib_helper.php');
    
    $user = getUserToken();
if($user == null){
    header('Location:'.$baseUrl.'authentice/login.php');
    die();
}else if($user['role_id'] != 1){
    header('Location:../'.$baseUrl.'index.php');
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <title><?=$title?></title>
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?=$baseUrl?>../assets/css/bootstrap.min.css">
    <!----css3---->
    <link rel="stylesheet" href="<?=$baseUrl?>../assets/css/custom.css">
    <link rel="icon" href="<?=$baseUrl?>../assets/image/site_cidii_shop_dark_2.png" type="image/x-icon" />
    <!-- SLIDER REVOLUTION 4.x CSS SETTINGS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <!--google material icon-->
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
</head>

<body>
    <div class="wrapper">
        <div class="body-overlay"></div>
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3 style="text-align :center ;"><span>Hello ADMIN </span><span style="color: red ;"><?=$user['fullname']?></span></h3>
            </div>
            <ul class="list-unstyled components">
                <li class="active">
                    <a href="<?=$baseUrl?>" class="dashboard"><i class="material-icons">dashboard</i><span>Dashboard</span></a>
                </li>
                <li class="dropdown">
                    <a href="<?=$baseUrl?>category" data-toggle="collapse" aria-expanded="false">
                        <i class="material-icons">category</i><span>Categories</span></a>
                </li>
                <li class="dropdown">
                    <a href="<?=$baseUrl?>product" data-toggle="collapse" aria-expanded="false">
                        <i class="material-icons">production_quantity_limits</i><span>Products</span></a>
                </li>
                <li class="dropdown">
                    <a href="<?=$baseUrl?>order" data-toggle="collapse" aria-expanded="false">
                        <i class="material-icons">shopping_basket</i><span>Orders</span></a>
                </li>
                <li class="dropdown">
                    <a href="<?=$baseUrl?>feedback" data-toggle="collapse" aria-expanded="false">
                        <i class="material-icons">feedback</i><span>Feedbacks</span></a>
                </li>
                <li class="dropdown">
                    <a href="<?=$baseUrl?>user">
                        <i class="material-icons">group</i><span>Users</span></a>
                </li>

                <li class="">
                    <a href="<?=$baseUrl?>authentice/logout.php"><i class="material-icons">logout</i><span>Log Out</span></a>
                </li>
            </ul>
        </nav>