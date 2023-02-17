<?php
    $title = 'Order Management';
    $baseUrl = '../';
    require_once('../layouts/headerAdmin.php'); 
    require_once('../layouts/navbarAdmin.php');

    $sql = "select * from orders order by status asc, order_date desc";
    $data = executeResult($sql);
?>
<div class="main-content">
    <div class="col-md-12 ">
            <table class="table table-bordered table-hover " style="margin-top: 20px;">
            <thead class="thead-dark">
                <tr>
                <th>ID</th>
                <th>Fullname</th>
                <th>Phone Number</th>
                <th>Email</th>
                <th>Address</th>
                <th>Content</th>
                <th>Total Money</th> 
                <th>Date Created</th>
                <th style="width: 50px">Status</th>
                <th style="width: 50px"></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $index = 0;
                foreach($data as $item){
                    echo '<tr>
                    <th>'.(++$index).'</th>
                    <td>'.$item['fullname'].'</td>
                    <td>'.$item['phone_number'].'</td>
                    <td>'.$item['email'].'</td>
                    <td>'.$item['address'].'</td>
                    <td>'.$item['note'].'</td>
                    <td>'.$item['total_money'].'</td>
                    <td>'.$item['order_date'].'</td>
                    <td style="width: 100px">';
                        if($item['status'] == 0){
                            echo '<button onclick="changeStatus('.$item['id'].',1)" class="btn btn-sm btn-success" style="margin-bottom:10px;";>Approve</button>
                        <button onclick="changeStatus('.$item['id'].',2)" class="btn btn-sm btn-danger">Canel</button>';
                        }else if($item['status'] == 1 ){
                            echo '<span class="badge rounded-pill bg-success text-white">Approve</span>';
                        }else{
                            echo '<span class="badge rounded-pill bg-danger text-white">Canel</span>';
                        }
                    echo '</td>
                    <td><a href="detail.php?id='.$item['id'].'"><button class="btn btn-dark" style="color:#fff;border-radius: 0px;">Order Details</button></a></td>
                    </tr>';
                }
                ?>
            </tbody>
            </table>
        </div>
    </div>
    <script type="text/javascript">
        function changeStatus(id,status){
            $.post('form_api.php',{
                'id' : id,
                'status':status,
                'action' : 'update_status'
            },function(data){
                location.reload()
            })
        }
    </script>
