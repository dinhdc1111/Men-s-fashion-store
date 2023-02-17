<?php 
    $title = 'Products';
    $baseUrl = '../';
    require_once('../layouts/headerAdmin.php'); 
    require_once('../layouts/navbarAdmin.php');

    $sql = "select product.*, category.name as category_name from product left join category on product.category_id = category.id where product.deleted = 0";
    $data = executeResult($sql);
?>
<div class="main-content">
        <div class="col-md-12 ">
            <a href="./editor.php"><button class="btn btn-success">Add Product</button></a>
            <table class="table table-bordered table-hover " style="margin-top: 20px;">
            <thead>
                <tr>
                <th>ID</th>
                <th>Thumbnail</th>
                <th>Name Product</th>
                <th>Price</th>
                <th>Category</th>
                <th style="width: 50px"></th>
                <th style="width: 50px"></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $index = 0;
                foreach($data as $item){
                    echo '<tr>
                    <th>'.(++$index).'</th>
                    <td><img src="'.fixUrl($item['thumbnail']).'" style ="width: 100px" ></td>
                    <td>'.$item['title'].'</td>
                    <td>'.number_format($item['discount']).' VND</td>
                    <td>'.$item['category_name'].'</td>
                    <td style="width: 50px">
                    <a href="editor.php?id='.$item['id'].'"><button class="btn btn-warning">Edit</button></a>
                    </td>
                    <td style="width: 50px">
                        <button onclick="deleteProduct('.$item['id'].')"class="btn btn-danger">Delete</button>
                    </td>
                    </tr>';
                }
                ?>
            </tbody>
            </table>
        </div>
</div>
<script type="text/javascript">
        function deleteProduct(id){
            option = confirm('Are you sure you want to delete this product?')
            if(!option) return;
            $.post('form_api.php',{
                'id' : id,
                'action' : 'delete'
            },function(data){
                location.reload()
            })
        }
</script>