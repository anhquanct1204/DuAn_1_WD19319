
    <div class="box">
    <?php
        require './views/admin/navAdmin.php' ;
    ?>
    <div>
        <table class="table">
            <thead class="table-success">
                <tr>
                    <th>Quản lí phòng</th>
                </tr>
            </thead>
        </table>
        <form action="" method="post">
            <table class="table table-hover">
                <thead class="table-success">
                    <tr>
                        <th>Chọn</th>
                        <th>Mã phòng</th>
                        <th>Tên KS</th>
                        <th>Loại phòng</th>
                        <th>Tên phòng</th>
                        <th>SL người tối đa</th>
                        <th>Mô tả</th>
                        <th>Giá</th>
                        <th>Trạng thái</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>

                <tbody> 
                    <?php foreach($listRooms as $Rooms => $Room) : ?>
                        <tr>
                            <td><input type="checkbox" name="RoomID[]" id="checkList" value="<?php echo $Room -> RoomID ?>"></td>
                            <td><?php echo $Room -> RoomID ?></td>
                            <td><?php echo $Room -> NameHotel ?></td>
                            <td><?php echo $Room -> RoomTypeName ?></td>
                            <td><?php echo $Room -> RoomName ?></td>
                            <td><?php echo $Room -> MaximumNumber ?></td>
                            <td><?php echo substr($Room -> Description , 0 , 55) .'...' ?></td>
                            <td><?php echo number_format($Room -> Price) .'đ' ?></td>
                            <td><?php echo $Room -> DisplayRoomID == 1 ? "Đang hiển thị" : "Tạm ẩn" ; ?></td>
                            <td>
                                <a href="?action=managerRoom&&DeleteRoomID=<?php echo $Room -> RoomID ?>" onclick="return confirm('Bạn chắc chắn xóa chứ ?');" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></a>
                                <a href="?action=updateRoom&&UpdateRoomID=<?php echo $Room -> RoomID ?>" class="btn btn-primary my-1"><i class="fa-solid fa-pen-to-square"></i></a>
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
                <li class="page-item"><a class="page-link" href="?action=managerRoom&&pages=<?php echo $i ?>"><?php echo $i ?></a></li>
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
        <h1 class="modal-title fs-5" id="exampleModalLabel">Thêm phòng</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="" method="post" enctype="multipart/form-data" onsubmit="return validateFormRoom();">
        <div class="modal-body">
          <div class="form-group">
            <label for="" style="font-weight:500;">Tên khách sạn</label> <span id="RoomInHotel_err" style="color:red;font-size:14px;"></span>
            <select name="HotelID" id="RoomInHotel" class="form-control my-2">
                <option value="">Chọn khách sạn</option>
                <?php foreach($listHotels as $Hotels => $Hotel) : ?>
                    <option value="<?php echo $Hotel -> HotelID ?>"><?php echo $Hotel -> NameHotel ?></option>
                <?php endforeach ; ?>
            </select>
          </div>
          <div class="form-group">
            <label for="" style="font-weight:500;">Tên loại phòng</label> <span id="RoomInRoomType_err" style="color:red;font-size:14px;"></span>
            <select name="RoomTypeID" id="RoomInRoomType" class="form-control my-2">
                <option value="">Chọn loại phòng</option>
                <?php foreach($listRoomType as $RoomTypes => $RoomType) : ?>
                    <option value="<?php echo $RoomType -> RoomTypeID ?>"><?php echo $RoomType -> RoomTypeName ?></option>
                <?php endforeach ; ?>
            </select>
          </div>
          <div class="form-group">
            <label for="" style="font-weight:500;">Tên phòng</label> <span id="RoomName_err" style="color:red;font-size:14px;"></span>
            <input type="text" class="form-control my-2" id="RoomName" name="RoomName">
          </div>
          <div class="form-group">
            <label for="" style="font-weight:500;">Số lượng người tối đa</label> <span id="MaximumNumber_err" style="color:red;font-size:14px;"></span>
            <input type="number" class="form-control my-2" min="1"  step="1" id="MaximumNumber" name="MaximumNumber">
          </div>
          <div class="form-group">
            <label for="" style="font-weight:500;">Mô tả</label> <span id="DescriptionRoom_err" style="color:red;font-size:14px;"></span>
            <textarea class="form-control my-2" id="DescriptionRoom" name="Description"></textarea>
          </div>
          <div class="form-group">
            <label for="" style="font-weight:500;">Ảnh phòng</label> <span id="ImageInRoom_err" style="color:red;font-size:14px;"></span>
            <input type="file" class="form-control my-2" id="ImageInRoom" name="image[]" accept="image/*" multiple>
          </div>
          <div class="form-group">
            <label for="" style="font-weight:500;">Giá phòng</label> <span id="Price_err" style="color:red;font-size:14px;"></span>
            <input type="number" class="form-control my-2"  min="1" step="1" id="Price" name="Price">
          </div>
        </div>
          
        <div class="modal-footer">
          <input type="reset" class="btn btn-secondary" value="Nhập lại">
          <button type="submit" class="btn" name="btn-add-room" style="background-color:#86B817;color:white;">Thêm mới</button>
        </div>
      </form>
    </div>
  </div>
</div>


<script>
  


function validateFormRoom() {
    // Validate form thêm phòng ;

    const RoomInHotel = document.getElementById('RoomInHotel') ;
    const RoomInHotel_err = document.getElementById('RoomInHotel_err') ;
    const RoomInRoomType = document.getElementById('RoomInRoomType') ;
    const RoomInRoomType_err = document.getElementById('RoomInRoomType_err') ;
    const RoomName = document.getElementById('RoomName') ;
    const RoomName_err = document.getElementById('RoomName_err') ;
    const DescriptionRoom = document.getElementById('DescriptionRoom') ;
    const DescriptionRoom_err = document.getElementById('DescriptionRoom_err') ;
    const MaximumNumber = document.getElementById('MaximumNumber') ;
    const MaximumNumber_err = document.getElementById('MaximumNumber_err') ;
    const Price = document.getElementById('Price') ;
    const Price_err = document.getElementById('Price_err') ;
    let checkRoom = true ;
    if(RoomInHotel.value.trim() == "") {
        RoomInHotel_err.innerText = "Vui chọn khách sạn" ;
        checkRoom = false ;
    }else {
        RoomInHotel_err.innerText = "" ;
    }

    if(RoomInRoomType.value.trim() == "") {
        RoomInRoomType_err.innerText = "Vui chọn loại phòng" ;
        checkRoom = false ;
    }else {
        RoomInRoomType_err.innerText = "" ;
    }

    if(RoomName.value.trim() == "") {
        RoomName_err.innerText = "Vui lòng nhập tên phòng" ;
        checkRoom = false ;
    }else {
        RoomName_err.innerText = "" ;
    }

    if(MaximumNumber.value.trim() == "") {
        MaximumNumber_err.innerText = "Vui lòng nhập SL người tối đa" ;
        checkRoom = false ;
    }else {
        MaximumNumber_err.innerText = "" ;
    }

    if(DescriptionRoom.value.trim() == "") {
        DescriptionRoom_err.innerText = "Vui lòng nhập mô tả" ;
        checkRoom = false ;
    }else {
        DescriptionRoom_err.innerText = "" ;
    }

    if(Price.value.trim() == "") {
        Price_err.innerText = "Vui lòng nhập giá phòng" ;
        checkRoom = false ;
    }else {
        Price_err.innerText = "" ;
    }

    if(ImageInRoom.value.trim() == "") {
        ImageInRoom_err.innerText = "Vui lòng thêm ảnh" ;
        checkRoom = false ;
    }else {
        ImageInRoom_err.innerText = "" ;
    }

    return checkRoom ;
}
</script>
