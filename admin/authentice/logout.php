<?php
    session_start();
    require_once('../../utils/utility.php');
    require_once('../../config/lib_helper.php');
    $token = getCookie('token');
    setcookie('token', '',time()-1,'/');
    session_destroy();
    header('Location: login.php');
    die();
?>