<section class="signup">
    <div class="container">
        <div class="signup-content">
            <div class="signup-form">
                <h2 class="form-title">Sign up</h2>
                <form method="POST" class="register-form" id="register-form" action="/Project_web_admin/SignUp/processSignUp">
                    <div class="form-group">
                        <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                        <input type="text" name="username" id="name" placeholder="Username" 
                                value="<?php
                                        if(!empty($data['username'])){
                                            echo $data['username'];
                                        } 
                                    ?>" />
                    </div>
                    <div style="color: red;">
                        <?php  
                            if(!empty($data['usernameError'])){
                                echo $data['usernameError'];
                            }
                        ?>
                    </div>
                    <div class="form-group">
                        <label for="full-name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                        <input type="text" name="fullname" id="re_pass" placeholder="Full name" 
                                value="<?php
                                        if(!empty($data['fullname'])){
                                            echo $data['fullname'];
                                        } 
                                    ?>" />
                    </div>

                    <div class="form-group">
                        <label for="email"><i class="zmdi zmdi-email"></i></label>
                        <input type="email" name="email" id="email" placeholder="Your Email" 
                                value="<?php
                                        if(!empty($data['email'])){
                                            echo $data['email'];
                                        } 
                                    ?>" />
                    </div>
                    <div style="color: red;">
                        <?php  
                            if(!empty($data['emailError'])){
                                echo $data['emailError'];
                            }
                        ?>
                    </div>
                    <div class="form-group">
                        <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                        <input type="password" name="password" id="pass" placeholder="Password"/>
                    </div>
                    <div style="color: red;">
                        <?php  
                            if(!empty($data['passwordError'])){
                                echo $data['passwordError'];
                            }
                        ?>
                    </div>
                    <!-- <div class="form-group">
                        <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                        <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                    </div> -->
                    <div class="form-group form-button">
                        <input type="submit" name="signup" id="signup" class="form-submit" value="Register"/>
                    </div>
                </form>
            </div>
            <div class="signup-image">
                <figure><img src="../../Project_web_admin/Public/images/signup-image.jpg" alt="sing up image"></figure>
                <a href="/Project_web_admin/SignIn" class="signup-image-link">I am already member</a>
            </div>
        </div>
    </div>
</section>