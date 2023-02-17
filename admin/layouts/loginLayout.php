<main class="main-site main-childs">
            <div class="user-wrapper">
                <div class="user-nav">
                    <a href="../authentice/login.php" class="active">Sign In</a>
                    <a href="../authentice/register.php">Sign Up</a>
                </div>
                <form accept-charset="UTF-8" id="formAcount" method="POST">
                    <!-- Message thông báo lỗi -->
                <?php
                    if($msg != ''):
                        echo '<div class="alert alert-danger" role="alert">'.$msg.'</div>';
                    endif;
                ?>
                    <div class="form-group">
                        <input type="text" required="true" placeholder="What's your email?" name="email">
                    </div>
                    <div class="form-group">
                        <input type="password" required="true" id="pwd" placeholder="Password" name="password"
                            minlength="6">
                        <span><i class="fas fa-eye icon" onclick="showPassword()"></i></span>
                    </div>
                    <button class="btn">Sign In</button>
                </form>
                <div class="user-foot text-center">
                    <a href="../forgot-password/index.html" class="clearfix">Forgot password?</a>
                    <p class="clearfix">Or login with</p>
                    <li class="loginFb">
                        <span>
                            <i class="fab fa-facebook-f"></i>
                        </span>
                        <a href="#">Login Facebook</a>
                    </li>
                    <li class="loginGg">
                        <span>
                            <i class="fab fa-google"></i>
                        </span>
                        <a href="#">Login Google</a>
                    </li>
                </div>
            </div>
        </main>
        <!-- end body -->