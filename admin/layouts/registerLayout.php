<main class="main-site main-childs">
            <div class="user-wrapper">
                <div class="user-nav">
                    <a href="../authentice/login.php">Sign In</a>
                    <a href="../authentice/register.php" class="active">Sign Up</a>
                </div>
                <form accept-charset="UTF-8" id="formAcount" method="POST" onsubmit="return validateForm();">
                <!-- Message thông báo lỗi -->
                <?php
                    if($msg != ''):
                        echo '<div class="alert alert-danger" role="alert">'.$msg.'</div>';
                    endif;
                ?>
                    <div class="form-group">
                        <input type="text" required="true" placeholder="What's your name?" name="fullname">
                    </div>
                    <div class="form-group">
                        <input type="text" required="true" placeholder="What's your email?" name="email">
                    </div>
                    <div class="form-group">
                        <input type="password" required="true" id="pwd" placeholder="Password" name="password"
                            minlength="6">
                        <span><i class="fas fa-eye icon" onclick="showPassword()"></i></span>
                    </div>
                    <div class="form-group">
                        <input type="password" required="true" id="confirmation_pwd" placeholder="Confirm password"
                            minlength="6">
                        <span><i class="fas fa-eye icon" onclick="showPassword()"></i></span>
                    </div>
                    <button class="btn">Sign Up</button>
                </form>
            </div>
        </main>