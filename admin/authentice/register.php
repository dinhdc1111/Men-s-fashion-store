<?php 
    session_start();
    require_once('../../utils/utility.php');
    require_once('../../config/lib_helper.php');
    require_once('../../admin/authentice/process_form_register.php');
    $user = getUserToken();
    if($user != null){
        header('Location: ../');
        die();
    }
    require_once('../../admin/layouts/headerUser.php');
    require_once('../../admin/layouts/registerLayout.php');
    require_once('../../admin/layouts/footerUser.php');
?>