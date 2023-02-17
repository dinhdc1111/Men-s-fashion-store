<?php
    $title = 'Add/Edit Product';
    $baseUrl = '../';
    require_once('../layouts/headerAdmin.php');
    require_once('../layouts/navbarAdmin.php');
    $id = $thumbnail = $title = $price = $discount = $category_id = $description = '';
    require_once('form_save.php');
    
    $id = getGet('id');
    if($id != '' && $id > 0){
        $sql = "select * from product where id = '$id' and deleted = 0";
        $userItem = executeResult($sql,true);
        if($userItem != null){
            $thumbnail = $userItem['thumbnail'];
            $title = $userItem['title'];
            $price = $userItem['price'];
            $discount = $userItem['discount'];
            $category_id = $userItem['category_id'];
            $description = $userItem['description'];
        }else{
            $id = 0;
        }
    }else{
        $id = 0;
    }
    $sql = "select * from category";
    $categoryItems = executeResult($sql);
?>
    <!-- include summernote css/js -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <!-- include lib (jquery, bt)  for summernote css/js-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
<div class="col-md-12 ">
    <!-- <h1>Add/Edit User Accounts</h1> -->
    <section>
        <div class="mask d-flex align-items-center h-100 gradient-custom-3">
            <div class="container h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-9 col-lg-7 col-xl-6" style="margin-top: 80px;margin-right: 32rem;">
                        <div class="card" style="border-radius: 15px;width: 71rem;">
                            <div class="card-body p-5">
                                <h2 class="text-uppercase text-center mb-5">Edit/Add Products</h2>
                                <form accept-charset="UTF-8"method="POST" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-9 col-12">
                                            <div class="form-outline mb-4">
                                                <input type="text" required="true" id="title" placeholder="Product's name?" name="title" class="form-control form-control-lg" value="<?=$title?>">
                                                <input type="text" name="id" value="<?=$id?>" hidden="true"></input>
                                            </div>
                                            <div class="form-outline mb-4">
                                                <label for="description">Description:</label>
                                                <textarea class="form-control" rows="5" name="description" id="description"><?=$description?></textarea>
                                            </div>
                                            <button class="btn btn-primary btn-lg">Save Product</button>
                                        </div>
                                        <div class="col-md-3 col-12" style="border: solid grey 1px; border-radius: 5px; padding: 10px;">
                                            <div class="form-outline mb-4">
                                                    <label for="thumbnail">Thumbnail:</label>
                                                    <input type="file" required="true" id="thumbnail" name="thumbnail"class="form-control form-control-lg" accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*">
                                                    <img id="thumbnail_img" src="<?=fixUrl($thumbnail)?>" style="max-height: 160px;margin: 10px 47px 0px 47px;">
                                                </div>
                                            <div class="form-outline mb-4">
                                                <label for="usr">Product portfolio:</label>
                                                <select class="form-control form-control-lg" name="category_id" id="category_id" required="true">
                                                    <option value=""><--Category--></option>
                                                    <?php
                                                        foreach($categoryItems as $item){
                                                            if($item['id']== $category_id ){
                                                                echo '<option selected value="'.$item['id'].'">'.$item['name'].'</option>';
                                                            }else{
                                                                echo '<option value="'.$item['id'].'">'.$item['name'].'</option>';
                                                            }
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="form-outline mb-4">
                                                <label for="price">Price:</label>
                                                <input type="number" required="true" id="price"name="price"class="form-control form-control-lg" value="<?=$price?>">
                                            </div>
                                            <div class="form-outline mb-4">
                                                <label for="discount">Discount:</label>
                                                <input type="text" required="true" id="discount" name="discount"class="form-control form-control-lg" value="<?=$discount?>">
                                            </div>
                                        </div>
                                    </div>
                                    
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- <script type="text/javascript">
    function updateThumbnail(){
        $('#thumbnail_img').attr('src',$('#thumbnail').val())
    }
</script> -->
<script>

    $('#description').summernote({
        placeholder: 'Enter product description!',
        tabsize: 2,
        height: 240,
        toolbar: [
        ['style', ['style']],
        ['font', ['bold', 'underline', 'clear']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['table', ['table']],
        ['insert', ['link', 'picture', 'video']],
        ['view', ['fullscreen', 'codeview', 'help']]
        ]
    });
    </script>
<?php
    require_once('../layouts/footerAdmin.php');
?>