
<div class="box">
    <?php
        require './views/admin/navAdmin.php' ;
    ?>
    <div class="" style="padding : 0 10px;">
        <h6 class="text-center">CHỈNH SỬA PHÒNG</h6>
        <form action="" method="post" enctype="multipart/form-data" onsubmit="return validateFormUpdateRoom();">
            <input type="hidden" name="RoomID" value="<?php echo $RoomID -> RoomID ?>" class="form-control my-1">
            <div class="form-group">
            <label for="" style="font-weight:500;">Tên khách sạn</label> <span id="RoomInHotel_err" style="color:red;font-size:14px;"></span>
            <select name="HotelID" id="RoomInHotel" class="form-control my-2">
                <option value="">Chọn khách sạn</option>
                <?php foreach($listHotels as $Hotels => $Hotel) : ?>
                    <option <?php echo $Hotel -> HotelID == $RoomID -> HotelID ? "selected" : "" ; ?> value="<?php echo $Hotel -> HotelID ?>"><?php echo $Hotel -> NameHotel ?></option>
                <?php endforeach ; ?>
            </select>
          </div>
          <div class="form-group">
            <label for="" style="font-weight:500;">Tên loại phòng</label> <span id="RoomInRoomType_err" style="color:red;font-size:14px;"></span>
            <select name="RoomTypeID" id="RoomInRoomType" class="form-control my-2">
                <option value="">Chọn loại phòng</option>
                <?php foreach($listRoomType as $RoomTypes => $RoomType) : ?>
                    <option <?php echo $RoomType -> RoomTypeID == $RoomID -> RoomTypeID ? "selected" : "" ; ?> value="<?php echo $RoomType -> RoomTypeID ?>"><?php echo $RoomType -> RoomTypeName ?></option>
                <?php endforeach ; ?>
            </select>
          </div>
          <div class="form-group">
            <label for="" style="font-weight:500;">Tên phòng</label> <span id="RoomName_err" style="color:red;font-size:14px;"></span>
            <input type="text" value="<?php echo $RoomID -> RoomName ?>" class="form-control my-2" id="RoomName" name="RoomName">
          </div>
          <div class="form-group">
            <label for="" style="font-weight:500;">Số lượng người tối đa</label> <span id="MaximumNumber_err" style="color:red;font-size:14px;"></span>
            <input type="number" class="form-control my-2" value="<?php echo $RoomID -> MaximumNumber ?>" id="MaximumNumber" name="MaximumNumber">
          </div>
          <div class="form-group">
            <label for="" style="font-weight:500;">Mô tả</label> <span id="DescriptionRoom_err" style="color:red;font-size:14px;"></span>
            <textarea class="form-control my-2" id="DescriptionRoom" name="Description"><?php echo $RoomID -> Description ?></textarea>
          </div>
          <div class="form-group">
                <label class="my-1" for="" style="font-weight:500;">Ảnh phòng</label>
                <div class="d-flex my-1">
                    <?php $listImage = explode(',' , $RoomID -> Image) ; ?>
                    <?php foreach($listImage as $images) : ?>
                        <img class="mx-2" src="<?php echo $images ?>" width="40px" height="auto" alt="">
                    <?php endforeach ; ?>
                </div>
            </div>
          <div class="form-group">
            <label for="" style="font-weight:500;">Ảnh phòng</label> <span id="ImageInRoom_err" style="color:red;font-size:14px;"></span>
            <input type="file" class="form-control my-2" id="ImageInRoom" name="image[]" accept="image/*" multiple>
          </div>
          <div class="form-group">
            <label for="" style="font-weight:500;">Giá phòng</label> <span id="Price_err" style="color:red;font-size:14px;"></span>
            <input type="number" class="form-control my-2" value="<?php echo $RoomID -> Price ?>" id="Price" name="Price">
          </div>
          <div class="form-group">
                <label for="">Trạng thái</label>
                <select name="status" class="form-control my-2">
                    <?php for($i = 1 ; $i <= 2 ; $i ++) {
                    ?>
                        <option <?php echo $RoomID -> DisplayRoomID == $i ? "selected" : "" ; ?> value="<?php echo $i ?>"><?php echo $i == 1 ? "Hiển thị" : "Tạm ẩn" ; ?></option>
                    <?php
                    } ?>
                </select>
            </div>
          <div style="margin-top:15px;">
            <input class="btn button-admin" type="submit" name="btn-update-room" value="Cập nhật">
            <a href="?action=managerRoom" class="btn mx-2 button-admin" >Danh sách</a>
          </div>
        </form>
    </div>

</div>

<script>
  
// Validate form sửa thêm phòng ;


function validateFormUpdateRoom() {
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
    const ImageInRoom = document.getElementById('ImageInRoom') ;
    const ImageInRoom_err = document.getElementById('ImageInRoom_err') ;
    const Price = document.getElementById('Price') ;
    const Price_err = document.getElementById('Price_err') ;
    let checkRoom = true ;
    if(RoomInHotel.value.trim() == "") {
        RoomInHotel_err.innerText = "Vui lòng chọn khách sạn" ;
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

    if(DescriptionRoom.value.trim() == "") {
        DescriptionRoom_err.innerText = "Vui lòng nhập mô tả" ;
        checkRoom = false ;
    }else {
        DescriptionRoom_err.innerText = "" ;
    }

    if(MaximumNumber.value.trim() == "") {
        MaximumNumber_err.innerText = "Vui lòng nhập SL người tối đa" ;
        checkRoom = false ;
    }else {
        MaximumNumber_err.innerText = "" ;
    }


    if(Price.value.trim() == "") {
        Price_err.innerText = "Vui lòng nhập giá phòng" ;
        checkRoom = false ;
    }else {
        Price_err.innerText = "" ;
    }

    return checkRoom ;
}
</script>
