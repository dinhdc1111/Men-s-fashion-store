<?php
$fullname = $email = $msg = '';

if(!empty($_POST)){
    $fullname = getPost('fullname');
    $email = getPost('email');
    $pwd = getPost('password');
    //Validate server
    if(empty($fullname) || empty($email) || empty($pwd) || strlen($pwd) <6 ){
    }else{
        // Validate successfully
        $userExist = executeResult("select * from user where email = '$email'",true);
        if($userExist != null){
            $msg = 'Email already exists on the system';
        }else{
            $created_at = $updated_at = date('Y-m-d H:i:s');
            // Use 1-way encryption -> MD5
            $pwd = getSecurityMD5($pwd);
            $sql = "insert into user (fullname, email, password, role_id, created_at, updated_at, deleted) values ('$fullname', '$email', '$pwd', 2, '$created_at', '$updated_at', 0)";
            execute($sql);
            header('Location: login.php');
            die();
        }
    }
}
?>