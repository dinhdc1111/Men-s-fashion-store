<?php
    $title = 'Add/Edit User Accounts';
    $baseUrl = '../';
    require_once('../layouts/headerAdmin.php');
    require_once('../layouts/navbarAdmin.php');

    $id = $msg = $fullname = $email = $phone_number = $address = $role_id = '';
    require_once('./form_save.php');

    $id = getGet('id');
    if($id != '' && $id > 0){
        $sql = "select * from user where id = '$id'";
        $userItem = executeResult($sql,true);
        if($userItem != null){
            $fullname = $userItem['fullname'];
            $email = $userItem['email'];
            $phone_number = $userItem['phone_number'];
            $address = $userItem['address'];
            $role_id = $userItem['role_id'];
        }else{
            $id = 0;
        }
    }else{
        $id = 0;
    }

    $sql = "select * from role";
    $roleItems = executeResult($sql);
?>
<div class="col-md-12 ">
    <section class="bg-image"
        style="background-image: url('https://mdbootstrap.com/img/Photos/new-templates/search-box/img4.jpg'); ">
        <div class="mask d-flex align-items-center h-100 gradient-custom-3">
            <div class="container h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                        <div class="card" style="border-radius: 15px;">
                            <div class="card-body p-5">
                                <h2 class="text-uppercase text-center mb-5">Create an account</h2>
                                <form accept-charset="UTF-8" id="formAcount" method="POST" onsubmit="return validateForm();">
                                <h6 style="color: red; text-align: center;"><?=$msg?></h6>
                                        <div class="form-outline mb-4">
                                            <input type="text" required="true" id="fullname" placeholder="What's your name?" name="fullname" class="form-control form-control-lg" value="<?=$fullname?>">
                                            <input type="text" name="id" value="<?=$id?>" hidden="true"></input>
                                        </div>
                                        <div class="form-outline mb-4">
                                            <select class="form-control form-control-lg" name="role_id" id="role_id" required="true">
                                                <option value=""><--Choose a Role--></option>
                                                <?php
                                                    foreach($roleItems as $role){
                                                        if($role['id']== $role_id ){
                                                            echo '<option selected value="'.$role['id'].'">'.$role['name'].'</option>';
                                                        }else{
                                                            echo '<option value="'.$role['id'].'">'.$role['name'].'</option>';
                                                        }
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-outline mb-4">
                                            <input type="email" required="true" id="email" placeholder="What's your email?" name="email"class="form-control form-control-lg" value="<?=$email?>">
                                        </div>
                                        <div class="form-outline mb-4">
                                            <input type="tel" required="true" id="phone_number" placeholder="What's your telephone number?" name="phone_number"class="form-control form-control-lg" value="<?=$phone_number?>">
                                        </div>
                                        <div class="form-outline mb-4">
                                            <input type="text" required="true" id="address" placeholder="What's your address?" name="address"class="form-control form-control-lg" value="<?=$address?>">
                                        </div>
                                        <div class="form-outline mb-4">
                                            <input type="password" <?=($id > 0?'':'required="true"')?> id="pwd" placeholder="Password" name="password" minlength="6"class="form-control form-control-lg">
                                        </div>
                                        <div class="form-outline mb-4">
                                            <input type="password" <?=($id > 0?'':'required="true"')?> id="confirmation_pwd" placeholder="Confirm password" minlength="6"class="form-control form-control-lg">
                                        </div>
                                        <div style="text-align :center;">
                                            <button class="btn btn-dark btn-lg">Register</button>
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

<script type="text/javascript">
        function validateForm(){
            $pwd = $('#pwd').val();
            $confirmPwd = $('#confirmation_pwd').val();
            if($pwd != $confirmPwd){
                alert("Password does not match,Please check again!");
                return false
            }else{
                return true
            }
        }
    </script>
<?php
    require_once('../layouts/footerAdmin.php');
?>