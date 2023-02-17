<?php
session_start();
require_once('../../utils/utility.php');
require_once('../../config/lib_helper.php');

$user = getUserToken();
if($user == null){
    die();
}

if(!empty($_POST)){
    $action = getPost('action');
    switch ($action){
        case 'delete':
            deleteCategory();
            break;
    }
}

function deleteCategory(){
    
    $id = getPost('id');
    $sql = "select count(*) as total from product where category_id = $id and deleted = 0";
    $data = executeResult($sql,true);
    $total = $data['total'];
    if($total > 0){
        echo 'Catalog contains products, cannot be deleted!';
        die();
    }
    $sql = "delete from category where id = $id";
    execute($sql);
}
?>