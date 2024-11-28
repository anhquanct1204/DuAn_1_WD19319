
    <div class="box">
        <?php
            require './views/admin/navAdmin.php' ;
        ?>
        <div class="" style="padding : 0 10px;">
            <h6 class="text-center">CHỈNH SỬA TÀI KHOẢN</h6>
            <form action="" method="post" enctype="multipart/form-data" onsubmit="return validateSignupAdmin();">
                <input type="hidden" name="UserID" value="<?php echo $UserID -> UserID ?>" class="form-control my-1">
                <div class="form-group">
                    <label for="">Email</label> <span id="email_signup_admin_err" style="color:red;font-size:14px;"></span>
                    <span style="color : red ;">
                        <?php
                            if(isset($error['edit_user']['email'])) {
                                echo $error['edit_user']['email'] ;
                            }
                        ?>
                    </span>
                    <input type="text" value="<?php echo $UserID -> Email ?>" id="email_signup_admin" name="email" class="form-control my-2">
                </div>
                <div class="form-group">
                    <label for="">Mật khẩu</label> <span id="password_signup_admin_err" style="color:red;font-size:14px;"></span>
                    <input type="password" value="<?php echo $UserID -> Password ?>" id="password_signup_admin" name="password" class="form-control my-2">
                </div>
                <div class="form-group">
                    <label for="">Trạng thái</label>
                    <select name="status" id="" class="form-control my-2">
                        <?php for($i = 1 ; $i <= 2 ; $i ++) {
                        ?>
                            <option <?php echo $UserID -> DisplayStatusID == $i ? "selected" : "" ?> value="<?php echo $i ?>"><?php echo $i == 1 ? "Đang sử dụng" : "Tạm khóa" ?></option>
                        <?php
                        } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Kiểu người dùng</label>
                    <select name="role" id="role_signup_admin" class="form-control my-2">
                        <?php foreach($listRoles as $Roles => $Role) : ?>
                            <option <?php echo $Role -> RoleID == $UserID -> RoleID ? "selected" : "" ; ?> value="<?php echo $Role -> RoleID ?>"><?php echo $Role -> Role ?></option>
                        <?php endforeach ; ?>
                    </select>
                </div>
                
                <div style="margin-top:15px;">
                    <input class="btn button-admin" type="submit" name="btn-update-user" value="Cập nhật">
                    <a href="?action=managerUsers" class="btn mx-2 button-admin" >Danh sách</a>
                </div>
            </form>
        </div>
    </div>

<script>
    
const email_signup_admin = document.getElementById('email_signup_admin') ;
const email_signup_admin_err = document.getElementById('email_signup_admin_err') ;
const password_signup_admin = document.getElementById('password_signup_admin') ;
const password_signup_admin_err = document.getElementById('password_signup_admin_err') ;
function validateSignupAdmin() {
    let check = true ;
    let regexEmail = /^\w([_\.]?\w+)*@\w{2,}(\.\w{2,30})+$/;
    if(email_signup_admin.value.trim() == "") {
        email_signup_admin_err.innerText = "Vui lòng nhập email" ;
        check = false ;
    }
    else if(regexEmail.test(email_signup_admin.value) == false) {
        email_signup_admin_err.innerText = "Email không đúng định dạng" ;
        check = false ;
    }
    else {
        email_signup_admin_err.innerText = "" ;
    }

    let regaxPass = /^\w{6,}$/ ;
    if(password_signup_admin.value.trim() == "") {
        password_signup_admin_err.innerText = "Vui lòng nhập mật khẩu" ;
        check = false ;
    }
    else if(regaxPass.test(password_signup_admin.value) == false) {
        password_signup_admin_err.innerText = "Mật khẩu ít nhất 6 kí tự" ;
        check = false ;
    }
    else {
        password_signup_admin_err.innerText = "" ;
    }
    return check ;
}
</script>
