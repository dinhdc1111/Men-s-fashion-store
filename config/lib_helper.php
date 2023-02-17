<?php 
require_once('define.php');
//Hàm mở đóng kết nối sql
// Run SQL : Insert, Update, Delete
function execute($sql){
    //Open connection
    $connect = new mysqli(HOST , USERNAME, PASSWORD, DATABASE);
    // Chuyển đổi về lấy giá trị tiếng việt
    mysqli_set_charset($connect,'utf8');
    // Connection
    mysqli_query($connect,$sql);
    //Close connection
    mysqli_close($connect);
}

// Run SQL : Select -> Hàm trả về 1 mảng
function executeResult($sql, $isSingle = false){
    $data = null;
    $connect = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
    mysqli_set_charset($connect,'UTF8');
    $resultset = mysqli_query($connect, $sql);
    if($isSingle){
        $data = mysqli_fetch_array($resultset,1);
    }else{
        $data = [];
        while(($row = mysqli_fetch_array($resultset,1)) != null){
            $data[] = $row;
        }
    }
    mysqli_close($connect);
    return $data;
}