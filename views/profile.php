<!-- Trang thông tin cá nhân -->
<style>
    .box-profile {
        margin-top : 10px ;
        display: grid ;
        grid-template-columns: 1fr 2.5fr;
        gap : 20px ;
    }
    @media (width < 575px) {
        .box-profile {
            display: grid ;
            grid-template-columns: 1fr;
            gap : 20px ;
        }
    }
    .nav-profile {
        padding: 0 ;
        list-style : none;
        margin-top : 2px ;
    }
    .nav-profile li {
        padding: 5px 5px ;
    }
    .nav-profile li a {
        text-decoration: none;
        color : black ;
        
    }
    .nav-profile li:hover {
        background-color : #4790cd ;
    }
    .nav-profile li:hover a {
        color : white ;
    }
    .profile-user {
        border : 1px solid #5fcb6e ;
        padding-bottom : 10px ;
    }
    .profile-user div {
        width : 80% ;
        margin-left : 50% ;
        transform : translateX(-50%) ;
    }
    .profile-user label{
        font-weight : 500 ;
    }
    .profile-user a {
        text-decoration: none;
        cursor: pointer;
    }
    .card-title {
        
        padding: 5px 10px;
    }
    .card-title-1 {
        background-color : #4790cd;
        color : white ;
    }
    .fa-id-card  , .fa-user {
        padding-right : 10px ;
    }
    .card-title-2 {
        color : #5fcb6e ;
    }
    .validate_err {
        color :red ;
        margin-left : 4px ;
    }
    #btn-add-profile {
        background-color : #5fcb6e ;
        color : white ;
    }
</style>

<div class="box-profile px-1">
    <div class="card-1">
        <h5 class="card-title card-title-1">Thông tin thành viên</h5>
        <ul class="nav-profile">
            <li><a href="?action=profile">Thông tin cá nhân</a></li>
            <li><a href="?action=historyBookingRoom">Lịch sử đặt phòng</a></li>
            <li><a href="?action=logout">Đăng xuất</a></li>
        </ul>
    </div>
    <div class="">
        <div class="profile-user">
            <h5 class="card-title card-title-2"><i class="fa-solid fa-id-card"></i>Thông tin tài khoản</h5>
            <hr>
            <div class="form-group">
                <label for="">Email</label>
                <input type="text" value="<?php echo $_SESSION['email'] ?>" class="form-control my-2" readonly>
            </div>
            <div class="form-group">
                <label for="">Mật khẩu</label>
                <input type="password" value="<?php echo login($_SESSION['email']) -> Password?>" class="form-control my-2" readonly>
                <a data-bs-toggle="modal" data-bs-target="#staticBackdrop">Đổi mật khẩu</a>
            </div>
        </div>

        <!-- Modal đổi mật khẩu -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="" method="post" onsubmit="return validateChangePassword();">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Đổi mật khẩu</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="">Mật khẩu cũ</label> <span class="validate_err" id="old_password_err"></span>
                                <span class="validate_err">
                                    <?php
                                        if(isset($error['old_password'])) {
                                            echo $error['old_password'] ;
                                        }
                                    ?>
                                </span>
                                <input type="password" value="<?php echo isset($_POST['old_password']) ? $_POST['old_password'] : "" ?>" id="old_password" name="old_password" class="form-control my-2">
                            </div>
                            <div class="form-group">
                                <label for="">Mật khẩu mới</label> <span class="validate_err" id="new_password_err"></span>
                                <input type="password" value="<?php echo isset($_POST['new_password']) ? $_POST['new_password'] : "" ?>" id="new_password" name="new_password" class="form-control my-2">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                            <button type="submit" name="btn_change_password" class="btn btn-primary">Lưu thay đổi</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <div class="profile-user my-3">
            <h5 class="card-title card-title-2"><i class="fa-solid fa-user"></i></i>Thông tin thành viên</h5>
            <hr>
            <form action="" method="post" onsubmit="return validateProfile();">
                <div class="form-group">
                    <label for="">Email liên lạc</label>
                    <input type="text" value="<?php echo $_SESSION['email'] ?>" class="form-control my-2" readonly>
                </div>
                <div class="form-group">
                    <label for="">Số điện thoại</label> <span class="validate_err" id="profile_phone_err"></span>
                    <input type="text" value="<?php echo isset(login($_SESSION['email']) -> Phone) ? login($_SESSION['email']) -> Phone : "" ?>"  class="form-control my-2" name="phone" id="profile_phone">
                </div>
                <div class="form-group">
                    <label for="">Họ và tên</label> <span class="validate_err" id="profile_fullname_err"></span>
                    <input type="text"  value="<?php echo isset(login($_SESSION['email']) -> FullName) ? login($_SESSION['email']) -> FullName : "" ?>" name="fullname" class="form-control my-2" id="profile_fullname">
                </div>
                <div class="form-group">
                    <input type="submit" value="Lưu thông tin" id="btn-add-profile" name="btn_add_profile" class="btn  my-2">
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    // Validate form thay đổi mật khẩu ;
    const old_password = document.getElementById('old_password') ;
    const old_password_err = document.getElementById('old_password_err') ;
    const new_password = document.getElementById('new_password') ;
    const new_password_err = document.getElementById('new_password_err') ;
    function validateChangePassword() {
        let checkPass = true ;
        reGaxPass = /^\w{6,}$/ ;
        if(old_password.value.trim() == "") {
            old_password_err.innerText = "Hãy nhập mật khẩu cũ" ;
            checkPass = false ;
        }
        else if(reGaxPass.test(old_password.value) == false) {
            old_password_err.innerText = "Mật khẩu không đúng định dạng" ;
            checkPass = false ;
        }else {
            old_password_err.innerText = "" ;
        }

        if(new_password.value.trim() == "") {
            new_password_err.innerText = "Hãy nhập mật khẩu mới" ;
            checkPass = false ;
        }
        else if(reGaxPass.test(new_password.value) == false) {
            new_password_err.innerText = "Mật khẩu ít nhất 6 kí tự" ;
            checkPass = false ;
        }else {
            new_password_err.innerText = "" ;
        }
        return checkPass ;
    }


    // Validate form thay đổi thông tin cá nhân ;
    const profile_phone = document.getElementById('profile_phone') ;
    const profile_phone_err = document.getElementById('profile_phone_err') ;
    const profile_fullname = document.getElementById('profile_fullname') ;
    const profile_fullname_err = document.getElementById('profile_fullname_err') ;
    function validateProfile() {
        let checkProfile = true ;
        if(profile_phone.value.trim() == "") {
            profile_phone_err.innerText = "Hãy nhập số điện thoại" ;
            checkProfile = false ;
        }else {
            profile_phone_err.innerText = "" ;
        }

        if(profile_fullname.value.trim() == "") {
            profile_fullname_err.innerText = "Hãy nhập họ và tên" ;
            checkProfile = false ;
        }else {
            profile_fullname_err.innerText = "" ;
        }

        return checkProfile ;
    }
</script>