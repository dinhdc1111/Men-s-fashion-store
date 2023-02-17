<?php 
    $title = 'User Management';
    $baseUrl = '../';
    require_once('../layouts/headerAdmin.php'); 
    require_once('../layouts/navbarAdmin.php');
    //Lấy thông tin dữ liệu người dùng từ 2 table Role & user
    $sql = "select user.*, role.name as role_name from user left join role on user.role_id = role.id where user.deleted = 0";
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
<div class="col-md-12 ">
            <a href="editor.php"><button class="btn btn-dark">More account</button></a>
            <table class="table table-bordered table-hover " style="margin-top: 20px;">
            <thead  class="thead-dark ">
                <tr>
                    <th>ID</th>
                    <th>Fullname</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Address</th>
                    <th>Role</th>
                    <th style="width: 170px">Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $index = 0;
                foreach($data as $item){
                    echo '<tr>
                    <th>'.(++$index).'</th>
                    <td>'.$item['fullname'].'</td>
                    <td>'.$item['email'].'</td>
                    <td>'.$item['phone_number'].'</td>
                    <td>'.$item['address'].'</td>
                    <td>'.$item['role_name'].'</td>
                    <td style="width: 50px">
                        <a href="editor.php?id='.$item['id'].'">
                            <button style="margin: 8px;" class="btn btn-dark"><i class="material-icons">border_color</i></button></a>';
                        if($user['id'] != $item['id'] && $item['role_id'] != 1){
                            echo '<button onclick="deleteUser('.$item['id'].')"class="btn btn-dark"><i class="material-icons">delete_forever</i></button>';
                        }else{
                            echo '<button class="btn btn-dark"><i class="material-icons">admin_panel_settings</i></button>';
                        }
                        echo '
                    </td>
                    </tr>';
                }
                ?>
            </tbody>
            </table>
        </div>
    </div>
    <!-- Alert thông báo cofirm pass -->
    <script type="text/javascript">
        function deleteUser(id){
            option = confirm('Are you sure you want to delete this account?')
            if(!option) return;
            $.post('form_api.php',{
                'id' : id,
                'action' : 'delete'
            },function(data){
                location.reload()
            })
        }
    </script>
</div>
