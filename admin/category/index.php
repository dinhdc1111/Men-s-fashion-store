<?php
    $title = 'Categories';
    $baseUrl = '../';
    require_once('../layouts/headerAdmin.php');
    require_once('../layouts/navbarAdmin.php');
    require_once('./form_save.php');
    $id = $name = '';
    if(isset($_GET['id'])){
        $id = getGet('id');
        $sql = "select * from category where id =$id";
        $data = executeResult($sql,true);
        if($data != null){
            $name = $data['name'];
        }
    }

    $sql = "select * from category";
    $data = executeResult($sql);
?>
<div class="main-content">
<div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="card card-stats">
                            <div class="card-header">
                                <div class="icon icon-warning">
                                    <span class="material-icons">equalizer</span>
                                </div>
                            </div>
                            <div class="card-content">
                                <p class="category"><strong>Visits</strong></p>
                                <h3 class="card-title">9,340</h3>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <i class="material-icons text-info">info</i>
                                    <a href="#pablo">See detailed report</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="card card-stats">
                            <div class="card-header">
                                <div class="icon icon-rose">
                                    <span class="material-icons">shopping_cart</span>

                                </div>
                            </div>
                            <div class="card-content">
                                <p class="category"><strong>Orders</strong></p>
                                <h3 class="card-title">102</h3>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <i class="material-icons">local_offer</i> Product-wise sales
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="card card-stats">
                            <div class="card-header">
                                <div class="icon icon-success">
                                    <span class="material-icons">
                                        attach_money
                                    </span>

                                </div>
                            </div>
                            <div class="card-content">
                                <p class="category"><strong>Revenue</strong></p>
                                <h3 class="card-title">$23,100</h3>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <i class="material-icons">date_range</i> Weekly sales
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="card card-stats">
                            <div class="card-header">
                                <div class="icon icon-info">

                                    <span class="material-icons">
                                        follow_the_signs
                                    </span>
                                </div>
                            </div>
                            <div class="card-content">
                                <p class="category"><strong>Followers</strong></p>
                                <h3 class="card-title">+245</h3>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <i class="material-icons">update</i> Just Updated
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
<div class="col-md-12">
    <form id="formAcount" action="index.php" method="POST" onsubmit="return validateForm();">
        <div class="form-outline mb-4">
            <label>Category name</label>
            <input type="text" required="true" id="name" placeholder="Category name?" name="name"
                class="form-control form-control-lg" value="<?=$name?>">
            <input type="text" name="id" value="<?=$id?>" hidden="true"></input>
        </div>
        <button class="btn btn-primary btn-lg">SAVE</button>
    </form>
</div>
<div class="col-md-12">
    <table class="table table-bordered table-hover " style="margin-top: 20px;">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Category name</th>
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
                    <td>'.$item['name'].'</td>
                    <td style="width: 50px">
                    <a href="?id='.$item['id'].'">
                    <button class="btn btn-warning">Edit</button></a>
                    </td>
                    <td style="width: 50px">
                    <button onclick="deleteCategory('.$item['id'].')" 
                        class="btn btn-danger">Delete</button>
                    </td>
                    </tr>';
                }
                ?>
        </tbody>
    </table>
</div>
</div>
<script type="text/javascript">
    function deleteCategory(id) {
        option = confirm('Are you sure you want to delete this category?')
        if (!option) return;
        $.post('form_api.php', {
            'id': id,
            'action': 'delete'
        }, function (data) {
            if(data != null && data != ''){
            alert(data);
            return;
            }
            location.reload();
        })
    }
</script>
