<div id="signup">
    <form action="" method="post" onsubmit="return validateSignup();">
        <h4 class="text-center my-2">ĐĂNG KÝ</h4>
        <div class="form-group">
            <label for="">Email</label> <span style="color:red;" id="email_signup_err"></span>
            <span style="color : red;">
                <?php
                    if(isset($error['signup']['email'])) {
                        echo $error['signup']['email'] ;
                    }
                ?>
            </span>
            <input type="text" id="email_signup" name="email" class="form-control my-2" value="<?php echo isset($_POST['email']) ? $_POST['email'] : "" ; ?>">
        </div>
        <div class="form-group">
            <label for="">Mật khẩu</label> <span style="color:red;" id="password_signup_err"></span>
            <input type="password" id="password_signup" name="password" class="form-control my-2" value="<?php echo isset($_POST['password']) ? $_POST['password'] : "" ; ?>">
        </div>
        <div class="form-group">
            <label for="">Nhập lại mật khẩu</label> <span style="color:red;" id="confirm_password_signup_err"></span>
            <input type="password" id="confirm_password_signup" name="confirm_password" class="form-control my-2" value="<?php echo isset($_POST['confirm_password']) ? $_POST['confirm_password'] : "" ; ?>">
        </div>
        <div class="form-group">
            <input type="submit" value="Đăng ký" name="btn-signup" class="form-control btn btn-primary my-2">
        </div>
        <div class="form-group">
            <a href="?action=login">Đăng nhập</a>
            <a href="?action=forgot">Quên mật khẩu</a>
        </div>
    </form>
</div>

<script>
    
function validateSignup() {
    const email_signup = document.getElementById('email_signup') ;
    const email_signup_err = document.getElementById('email_signup_err') ;
    const password_signup = document.getElementById('password_signup') ;
    const password_signup_err = document.getElementById('password_signup_err') ;
    const confirm_password_signup = document.getElementById('confirm_password_signup') ;
    const confirm_password_signup_err = document.getElementById('confirm_password_signup_err') ;
    let check = true ;
    let regexEmail = /^\w([_\.]?\w+)*@\w{2,}(\.\w{2,30})+$/;
    if(email_signup.value.trim() == "") {
        email_signup_err.innerText = "Vui lòng nhập email" ;
        check = false ;
    }
    else if(regexEmail.test(email_signup.value) == false) {
        email_signup_err.innerText = "Email không đúng định dạng" ;
        check = false ;
    }
    else {
        email_signup_err.innerText = "" ;
    }

    let regaxPass = /^\w{6,}$/ ;
    if(password_signup.value.trim() == "") {
        password_signup_err.innerText = "Vui lòng nhập mật khẩu" ;
        check = false ;
    }
    else if(regaxPass.test(password_signup.value) == false) {
        password_signup_err.innerText = "Mật khẩu phải trên 6 kí tự" ;
        check = false ;
    }
    else {
        password_signup_err.innerText = "" ;
    }

    if(confirm_password_signup.value != password_signup.value) {
        confirm_password_signup_err.innerText = "Mật khẩu không khớp" ;
        check = false ;
    }else {
        confirm_password_signup_err.innerText = "" ;
    }
    return check ;
}
</script>