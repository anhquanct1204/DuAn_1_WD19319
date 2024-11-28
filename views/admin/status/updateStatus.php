<div class="box">
        <?php
            require './views/admin/navAdmin.php' ;
        ?>
        <div class="" style="padding : 0 10px;">
            <h6 class="text-center">CHỈNH SỬA TRẠNG THÁI</h6>
            <form action="" method="post" enctype="multipart/form-data" onsubmit="return validateRoomType();">
                <input type="hidden" name="statusID" value="<?php echo $StatusID -> StatusID ?>" class="form-control my-1">
                <div class="form-group">
                    <label for="" style="font-weight:500;">Tên trạng thái</label> <span id="name-status-err" style="color:red;font-size:14px;"></span>
                    <input type="text" value="<?php echo $StatusID -> NameStatus ?>"  class="form-control my-2" id="name-status" name="name-status">
                </div>
                
                <div style="margin-top:15px;">
                    <input class="btn button-admin" type="submit" name="btn-update-status" value="Cập nhật">
                    <a href="?action=managerStatus" class="btn mx-2 button-admin" >Danh sách</a>
                </div>
            </form>
        </div>
    </div>