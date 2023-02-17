<?php
    $title = 'Order details';
    $baseUrl = '../';
    require_once('../layouts/headerAdmin.php'); 
    require_once('../layouts/navbarAdmin.php');
    $orderId = getGet('id');

    $sql = "select order_details.*,product.title, product.thumbnail from order_details left join product on product.id = order_details.product_id where order_details.order_id = $orderId";

    $data = executeResult($sql);

    $sql = "select * from orders where id = $orderId";
    $orderItem = executeResult($sql,true);
?>
    <div class="col-md-12 table-responsive ">
        <h1>Order details</h1>
    </div>
    <div class="row">
        <div class="col-md-7 table-responsive ">
            <table class="table table-bordered table-hover " style="margin-top: 20px;">
                <thead>
                    <tr>
                    <th>ID</th>
                    <th>Thumbnail</th>
                    <th>Product's name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total Money</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $index = 0;
                    foreach($data as $item){
                        echo '<tr>
                        <th>'.(++$index).'</th>
                        <td><img src="'.fixUrl($item['thumbnail']).'" style="height:100px"/></td>
                        <td>'.$item['title'].'</td>
                        <td>'.$item['price'].'</td>
                        <td>'.$item['num'].'</td>
                        <td>'.$item['total_money'].'</td>
                        </tr>';
                    }
                    ?>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <th>Total Money</th>
                        <th><?=$orderItem['total_money']?></th>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-md-3">
            <table class="table table-bordered table-hover">
                    <thead>Ordering information</thead>
                </tr>
                    <th>Fullname</th>
                    <td><?=$orderItem['fullname']?></td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td><?=$orderItem['email']?></td>
                </tr>
                <tr>
                    <th>Phone Number</th>
                    <td><?=$orderItem['phone_number']?></td>
                </tr>
                <tr>
                    <th>Address</th>
                    <td><?=$orderItem['address']?></td>
                </tr>
            </table>
        </div>
    </div>
