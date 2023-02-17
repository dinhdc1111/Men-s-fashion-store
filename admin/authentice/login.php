<?php 
    session_start();
    require_once('../../utils/utility.php');
    require_once('../../config/lib_helper.php');
    require_once('../../admin/authentice/process_form_login.php');
    
    $user = getUserToken();
    if($user != null){
        header('Location: ../');
        die();
    }
    require_once('../../admin/layouts/headerUser.php');
    require_once('../../admin/layouts/loginLayout.php');
    require_once('../../admin/layouts/footerUser.php');
?>