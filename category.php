<?php
    require_once('./layouts/headerUser.php');

    $category_id=getGet('id');
    if($category_id == null || $category_id ==''){
        $sql = "select product.*, category.name as category_name from product left join category on product.category_id = category.id order by product.updated_at desc limit 0,12";
    }else{
        $sql = "select product.*, category.name as category_name from product left join category on product.category_id = category.id where product.category_id = $category_id order by product.updated_at desc limit 0,8";}
        $lastestItems = executeResult($sql);
?>
        <main class="content">
            <div class="total-products">
                <div class="products">
                    <?php
                        foreach($lastestItems as $item){
                            echo'<div class="item-product" style="margin-bottom: 20px;">
                            <a href="detail.php?id='.$item['id'].'">
                                <img src="./'.$item['thumbnail'].'" alt="#" style="width: 280px">
                            </a>
                            <h3 class="name-product">
                                <a href="detail.php?id='.$item['id'].'">'.$item['title'].'</a>
                            </h3>
                            <span class="price">'.number_format($item['discount']).' VND</span>
                            <div class="btn__item-product">
                            <a href="#" style="padding: 5px;"><i class="fas fa-cart-shopping"></i> Quick purchase</a>
                            <a href="detail.php?id='.$item['id'].'" style="border-left: 1px #fff solid;"><i class="fas fa-eye icon"></i> See details</a>
                            </div>
                        </div>';
                        }
                    ?>
                </div>
            </div>
            <!-- New products -->
        </main>
        <!-- end content -->
<?php
    require_once('./layouts/footerUser.php');
?>