<div class="box">
    <?php
        require './views/admin/navAdmin.php' ;
    ?>
    <div>
        <table class="table">
            <thead class="table-success">
                <tr>
                    <th>Quản lí loại phòng</th>
                </tr>
            </thead>
        </table>
        <form action="" method="post">
            <table class="table table-hover">
                <thead class="table-success">
                    <tr>
                        <th>Chọn</th>
                        <th>Mã loại phòng</th>
                        <th>Tên loại phòng</th>
                        <th>Mô tả</th>
                        <th>Trạng thái</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>

                <tbody> 
                    <?php foreach($listRoomType as $roomTypes => $roomType) : ?>
                        <tr>
                            <td><input type="checkbox" name="check[]" value="<?php echo $roomType -> RoomTypeID ?>" id="checkList"></td>
                            <td><?php echo $roomType -> RoomTypeID ?></td>
                            <td><?php echo $roomType -> RoomTypeName ?></td>
                            <td><?php echo substr($roomType -> Description , 0 , 150) .'...' ?></td>
                            <td><?php echo $roomType -> DisplayRoomTypeID == 1 ? "Đang hiển thị" : "Đã ẩn" ; ?></td>
                            <td>
                              <a href="?action=managerTypeRoom&&DeleteTypeRoomID=<?php echo $roomType -> RoomTypeID ?>" onclick="return confirm('Bạn chắc chắn xóa chứ ?');" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></a>
                              <a href="?action=updateRoomType&&UpdateRoomTypeID=<?php echo $roomType -> RoomTypeID ?>" class="btn btn-primary my-1"><i class="fa-solid fa-pen-to-square"></i></a>
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
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Thêm loại phòng</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="" method="post" enctype="multipart/form-data" onsubmit="return validateRoomType();">
        <div class="modal-body">
          <div class="form-group">
          <label for="" style="font-weight:500;">Tên loại phòng</label> <span id="RoomTypeName_err" style="color:red;font-size:14px;"></span>
            <input type="text" class="form-control my-2" id="RoomTypeName" name="RoomTypeName">
          </div>
          <div class="form-group">
            <label for="" style="font-weight:500;">Mô tả</label> <span id="Description_err" style="color:red;font-size:14px;"></span>
            <textarea class="form-control my-2" id="Description" name="Description"></textarea>
          </div>
        </div>
          
        <div class="modal-footer">
          <input type="reset" class="btn btn-secondary" value="Nhập lại">
          <button type="submit" class="btn" name="btn-add-roomType" style="background-color:#86B817;color:white;">Thêm mới</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
  
// validate form thêm loại phòng ;



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