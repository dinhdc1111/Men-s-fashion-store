<?php 
    require_once('./layouts/headerUser.php');
    require_once('./layouts/slideShow.php');
    require_once('./layouts/viewMore3Banner.php');
?>
<main class="content">
    <div class="total-products">
        <!-- Lấy ra sản phẩm mới nhất -->
        <h2 class="title-products">
            NEW PRODUCTS
        </h2>
        <div class="products">
            <?php
                foreach($lastestItems as $item){
                    echo'<div class="item-product" style="margin-bottom: 20px;">
                    <a href="detail.php?id='.$item['id'].'">
                        <img src="./'.$item['thumbnail'].'" alt="#" style="width: 280px">
                    </a>
                    <h3 class="name-product" style="font-weight: lighter;">
                        <a href="detail.php?id='.$item['id'].'">'.$item['title'].'</a>
                    </h3>
                    <span class="price">'.number_format($item['discount']).' VND</span>
                    <div class="btn__item-product">
                        <a href="#" style="padding: 5px;"><i class="fas fa-cart-shopping"></i> Quick purchase</a>
                        <a href="detail.php?id='.$item['id'].'" style="border-left: 1px #fff solid;"><i class="fas fa-eye icon"></i> See
                            details</a>
                        </div>
                </div>';
                    }
            ?>
    </div>
    <!-- Danh mục sản phẩm -->
    <?php
        foreach($menuItems as $item){
            $sql = "select product.*, category.name as category_name from product left join category on product.category_id = category.id where product.category_id = ".$item['id']." order by product.updated_at desc limit 0,4";
            $items = executeResult($sql); 
    ?>
    <div class="total-products">
                <h2 class="title-products">
                    <?=$item['name']?>
                </h2>
                <div class="products">
                    <?php
                        foreach($items as $pItem){
                            echo'<div class="item-product" style="margin-bottom: 20px;">
                            <a href="detail.php?id='.$item['id'].'">
                                <img src="./'.$pItem['thumbnail'].'" alt="#" style="width: 280px">
                            </a>
                            <h3 class="name-product">
                                <a href="detail.php?id='.$item['id'].'">'.$pItem['title'].'</a>
                            </h3>
                            <span class="price">'.number_format($pItem['discount']).' VND</span>
                            <div class="btn__item-product">
                                <a href="#" style="padding: 5px;"><i class="fas fa-cart-shopping"></i> Quick purchase</a>
                                <a href="detail.php?id='.$item['id'].'" style="border-left: 1px #fff solid;"><i class="fas fa-eye icon"></i> See details</a>
                        </div>
                        </div>';
                        }
                    ?>
                </div>
            </div>
            <?php
}
?>
    </div>
</main>
<?php require_once('./layouts/footerUser.php') ?>