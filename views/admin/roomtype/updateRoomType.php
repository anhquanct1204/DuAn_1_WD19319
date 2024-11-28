<div class="box">
        <?php
            require './views/admin/navAdmin.php' ;
        ?>
        <div class="" style="padding : 0 10px;">
            <h6 class="text-center">CHỈNH SỬA LOẠI PHÒNG</h6>
            <form action="" method="post" enctype="multipart/form-data" onsubmit="return validateRoomType();">
                <input type="hidden" name="RoomTypeID" value="<?php echo $RoomTypeID -> RoomTypeID ?>" class="form-control my-1">
                <div class="form-group">
                    <label for="" style="font-weight:500;">Tên loại phòng</label> <span id="RoomTypeName_err" style="color:red;font-size:14px;"></span>
                    <input type="text" value="<?php echo $RoomTypeID -> RoomTypeName ?>"  class="form-control my-2" id="RoomTypeName" name="RoomTypeName">
                </div>
                <div class="form-group">
                    <label for="" style="font-weight:500;">Mô tả</label> <span id="Description_err" style="color:red;font-size:14px;"></span>
                    <textarea class="form-control my-2" id="Description" name="Description"><?php echo $RoomTypeID -> Description ?></textarea>
                </div>
                <div class="form-group">
                    <label for="">Trạng thái</label>
                    <select name="status" class="form-control my-2">
                        <?php for($i = 1 ; $i <= 2 ; $i ++) {
                        ?>
                            <option <?php echo $RoomTypeID -> DisplayRoomTypeID == $i ? "selected" : "" ; ?> value="<?php echo $i ?>"><?php echo $i == 1 ? "Hiển thị" : "Tạm ẩn" ; ?></option>
                        <?php
                        } ?>
                    </select>
                </div>
                <div style="margin-top:15px;">
                    <input class="btn button-admin" type="submit" name="btn-update-roomType" value="Cập nhật">
                    <a href="?action=managerTypeRoom" class="btn mx-2 button-admin" >Danh sách</a>
                </div>
            </form>
        </div>
    </div>

    <script>
        function validateRoomType() {
            const RoomTypeName = document.getElementById('RoomTypeName') ,
                RoomTypeName_err = document.getElementById('RoomTypeName_err') ,
                Description = document.getElementById('Description') ,
                Description_err = document.getElementById('Description_err') ;
                let check = true ;
                if(RoomTypeName.value.trim() == "") {
                    RoomTypeName_err.innerText = "Hãy nhập loại phòng " ;
                    check = false ;
                }else {
                    RoomTypeName_err.innerText = "" ;
                }

                if(Description.value.trim() == "") {
                    Description_err.innerText = "Hãy nhập mô tả " ;
                    check = false ;
                }else {
                    Description_err.innerText = "" ;
                }

                return check ;
            }
    </script>
