<div id="login">
    <form action="" method="post" onsubmit="return validateLogin();">
        <h4 class="text-center my-2">ĐĂNG NHẬP</h4>
        <div class="form-group">
            <label for="">Email</label> <span style="color : red;" id="email_login_err"></span>
            <span style="color : red;">
                <?php
                    if(isset($error['login']['email'])) {
                        echo $error['login']['email'] ;
                    }
                ?>
            </span>
            <input type="text" id="email_login" name="email" class="form-control my-2" value="<?php echo isset($_POST['email']) ? $_POST['email'] : "" ?>">
        </div>
        <div class="form-group">
            <label for="">Mật khẩu</label> <span style="color:red;" id="password_login_err"></span>
            <span style="color : red;">
                <?php
                    if(isset($error['login']['password'])) {
                        echo $error['login']['password'] ;
                    }
                ?>
            </span>
            <input type="password" name="password" id="password_login" class="form-control my-2" value="<?php echo isset($_POST['password']) ? $_POST['password'] : "" ?>">
        </div>
        <div class="form-group">
            <input type="submit" value="Đăng nhập" name="btn-login" class="form-control btn btn-primary my-2">
        </div>
        <div class="form-group">
            <a href="?action=signup">Đăng ký</a>
            <a href="?action=forgot">Quên mật khẩu</a>
        </div>
    </form>
</div>