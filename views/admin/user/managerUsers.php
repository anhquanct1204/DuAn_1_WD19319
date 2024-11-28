
    <div class="box">
    <?php
        require './views/admin/navAdmin.php' ;
    ?>
    <div>
        <table class="table">
            <thead class="table-success">
                <tr>
                    <th>Quản lí người dùng</th>
                </tr>
            </thead>
        </table>
        <form action="" method="post">
            <table class="table table-hover">
                <thead class="table-success">
                    <tr>
                        <th>Chọn</th>
                        <th>Mã người dùng</th>
                        <th>Họ & tên</th>
                        <th>Email</th>
                        <th>Số điện thoại</th>
                        <th>Quyền</th>
                        <th>Trạng thái</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>

                <tbody> 
                    <?php foreach($listUsers as $Users => $User) : ?>
                        <tr>
                            <td><input type="checkbox" value="<?php echo $User -> UserID ?>" name="check[]" id="checkList"></td>
                            <td><?php echo $User -> UserID ?></td>
                            <td><?php echo $User -> FullName ?></td>
                            <td><?php echo $User -> Email ?></td>
                            <td><?php echo $User -> Phone ?></td>
                            <td><?php echo $User -> Role ?></td>
                            <td><?php echo $User -> DisplayStatusID == 1 ? "Đang sử dụng" : "Bị khóa" ; ?></td>
                            <td>
                                <?php
                                    if($_SESSION['userID'] != $User -> UserID) {
                                ?>
                                    <a href="?action=managerUsers&&DeleteUserID=<?php echo $User -> UserID ?>" onclick="return confirm('Bạn chắc chắn xóa chứ ?');" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></a>
                                <?php
                                    }
                                ?>
                                <a href="?action=updateUser&&UpdateUserID=<?php echo $User -> UserID ?>" class="btn btn-primary my-1"><i class="fa-solid fa-pen-to-square"></i></a>
                            </td>
                        </tr>
                    <?php endforeach ; ?>
                </tbody>
                
            </table>
            <tr>
                <a class="btn open_checked button-admin">Chọn tất cả</a>
                <a class="btn close_checked mx-2 button-admin">Bỏ chọn tất cả</a>
                <button type="submit" class="btn delete_checked button-admin" onclick="return confirm('Bạn chắc chắn xóa chứ ?');" name="delete_checked">Xóa mục đã chọn</button>
                <a class="btn mx-2 button-admin" data-bs-toggle="modal" data-bs-target="#exampleModal">Thêm mới</a>
            </tr>
        </form>
        <nav aria-label="..." class="mt-4">
            <ul class="pagination">
                <?php for($i = 1 ; $i <= ceil($count/10) ; $i ++) {
                ?>
                <li class="page-item"><a class="page-link" href="?action=managerUsers&&pages=<?php echo $i ?>"><?php echo $i ?></a></li>
                <?php
                } ?>
            </ul>
        </nav>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Thêm người dùng</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="signupForm" action="" method="post" enctype="multipart/form-data" onsubmit="return validateSignupAdmin();">
        <div class="modal-body">
            <div class="form-group">
                <label for="">Email</label> <span id="email_signup_admin_err" style="color:red;font-size:14px;"></span>
                <span id="signup_error" style="color:red;font-size:14px;">
                    <?php
                        if(isset($error['admin_add_user']['email'])) {
                            echo $error['admin_add_user']['email'] ;
                        }
                    ?>
                </span>
                <input type="text" value="<?php echo isset($_POST['email']) ? $_POST['email'] : "" ?>" id="email_signup_admin" name="email" class="form-control my-2">
            </div>
            <div class="form-group">
                <label for="">Mật khẩu</label> <span id="password_signup_admin_err" style="color:red;font-size:14px;"></span>
                <input type="password" value="<?php echo isset($_POST['password']) ? $_POST['password'] : "" ?>" id="password_signup_admin" name="password" class="form-control my-2">
            </div>
            <div class="form-group">
                <label for="">Kiểu người dùng</label> <span id="role_signup_admin_err" style="color:red;font-size:14px;"></span>
                <select name="role" id="role_signup_admin" class="form-control my-2">
                    <?php foreach($listRoles as $Roles => $Role) : ?>
                        <option value="<?php echo $Role -> RoleID ?>"><?php echo $Role -> Role ?></option>
                    <?php endforeach ; ?>
                </select>
            </div>
        </div>
          
        <div class="modal-footer">
          <input type="reset" class="btn btn-secondary" value="Nhập lại">
          <button type="submit" class="btn" name="btn-add-user" style="background-color:#86B817;color:white;">Thêm mới</button>
        </div>
      </form>
    </div>
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
        password_signup_admin_err.innerText = "Mật khẩu phải trên 6 kí tự" ;
        check = false ;
    }
    else {
        password_signup_admin_err.innerText = "" ;
    }
    return check ;
}
</script>

