<section class="sign-in">
    <div class="container">
        <div class="signin-content">
            <div class="signin-image">
                <figure><img src="../../Project_web_admin/Public/images/signin-image.jpg" alt="sing up image"></figure>
                <a href="/Project_web_admin/SignUp" class="signup-image-link">Create an account</a>
            </div>

            <div class="signin-form">
                <h2 class="form-title">Sign In</h2>
                <form method="POST" class="register-form" id="login-form" action="/Project_web_admin/SignIn/processSignIn">
                    <div class="form-group" >
                        <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                        <input type="text" name="username" id="your_name" placeholder="Username" />
                    </div>
                    <div style="color: red;">
                        <?php  
                            if(!empty($data['usernameError'])){
                                echo $data['usernameError'];
                            }
                        ?>
                    </div>
                    <div class="form-group">
                        <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                        <input type="password" name="password" id="your_pass" placeholder="Password"/>
                    </div>
                    <div style="color: red;">
                        <?php  
                            if(!empty($data['passwordError'])){
                                echo $data['passwordError'];
                            }
                        ?>
                    </div>
                    <!-- <div class="form-group">
                        <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
                        <label for="remember-me" class="label-agree-term"><span><span></span></span>Remember me</label>
                    </div> -->
                    <div class="form-group form-button">
                        <input type="submit" name="signin" id="signin" class="form-submit" value="Log in"/>
                    </div>
                </form>
                <!-- <div class="social-login">
                    <span class="social-label">Or login with</span>
                    <ul class="socials">
                        <li><a href="#"><i class="display-flex-center zmdi zmdi-facebook"></i></a></li>
                        <li><a href="#"><i class="display-flex-center zmdi zmdi-twitter"></i></a></li>
                        <li><a href="#"><i class="display-flex-center zmdi zmdi-google"></i></a></li>
                    </ul>
                </div> -->
            </div>
        </div>
    </div>
</section>