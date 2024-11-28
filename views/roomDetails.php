<style>
    .room-details {
        display: grid ;
        grid-template-columns : 1fr 1fr 1fr ;
        gap : 10px ; 
    }
    @media (max-width : 1000px) {
        .room-details {
            display: grid ;
            grid-template-columns : 1fr 1fr ;
            gap : 10px ; 
        }
    }
    @media (max-width : 685px) {
        .room-details {
            display: grid ;
            grid-template-columns : 1fr ;
            gap : 10px ; 
        }
    }
    .h6 {
        background-color : #5fcb6e;
    }
    .submit {
        background-color : #5fcb6e;
        color : white ;
    }
    .description {
        display: flex ;
        justify-content: space-between;
        margin-top : 10px ;
    }
    .description p {
        font-weight : 500 ;
    }
    .modal-body {
        text-align : justify ;
    }
    .text-primary {
        cursor: pointer;
    }
    .room-details label {
        font-weight : 500 ;
    }
    table {
        width : 100% ;
        margin-top : 15px ;
        border-collapse:collapse ;
        border : 1px dotted gray ;
    }
    table thead {
        height : 45px ;
        background-color : #e4e4e4;
    }
    table thead tr th{
        padding-left : 10px ;
    }
    table tbody tr {
        height : 100px ;
        border : 1px dotted gray ;
    }
    table tbody tr td{
        border : 1px dotted gray ;
        text-align: center ;
    }
</style>


<div class="room-details my-2">
    <div>
        <?php
            if(empty($result)) {
        ?>
            <h6 class="py-2 px-1 text-white h6">Kiểm tra phòng</h6>
            <form action="" method="post" class="px-2" onsubmit="return validateCheckRoom();">
                <div class="form-group">
                    <label for="">Ngày nhận phòng</label> <span id="check-in-date-err" style="color:red;"></span>
                    <input placeholder="Ngày đến..."  name="check-in-date" id="myID" class="form-control my-2 check-in-date">
                </div>
                <div class="form-group">
                    <label for="">Ngày trả phòng</label> <span id="check-out-date-err" style="color:red;"></span>
                    <input placeholder="Ngày đi..." name="check-out-date" id="myID" class="form-control my-2 check-out-date">
                </div>

                <div class="form-group">
                    <input type="submit" name="check-room" value="Kiểm tra" class="form-control my-3 submit">
                </div>
            </form>
        <?php
            }else {
        ?>
            <h6 class="py-2 px-1 text-white h6">Nhập thông tin đặt phòng</h6>
            <form action="" method="post" class="px-2" onsubmit="">
                <div class="form-group">
                    <label for="">Ngày nhận phòng</label> 
                    <input type="date" name="check-in-date-booking" value="<?php echo isset($_POST['check-in-date']) ? $_POST['check-in-date'] : $_GET['checkIn'] ; ?>"  class="form-control my-2" readonly>
                </div>
                <div class="form-group">
                    <label for="">Ngày trả phòng</label> 
                    <input type="date" name="check-out-date-booking"  value="<?php echo isset($_POST['check-out-date']) ? $_POST['check-out-date'] : $_GET['checkOut'] ; ?>"  class="form-control my-2" readonly>
                </div>
                <div class="form-group">
                    <label for="">Giá phòng</label> 
                    <input type="number" name="price-room-booking"  value="<?php echo $RoomID -> Price ?>"  class="form-control my-2" readonly>
                </div>
                <div class="form-group">
                    <label for="">Số ngày ở</label> 
                    <input type="number" name="numberOfNights"  value="<?php echo $numberOfNights ?>"  class="form-control my-2" readonly>
                </div>
                <div class="form-group">
                    <label for="">Tổng tiền</label> 
                    <input type="number" name="amount-booking"  value="<?php echo $RoomID -> Price * $numberOfNights ?>"  class="form-control my-2" readonly>
                </div>
                <?php
                    if(isset($_SESSION['login'])) {
                ?>
                    <div class="form-group">
                        <input type="submit" name="book-room" value="Đặt phòng" class="form-control my-3 submit" onclick="return confirm('Sau khi đặt phòng 30 phút nếu quý khách không thanh toán đơn sẽ tự động hủy!');">
                    </div>
                <?php
                    }else {
                ?>
                    <input type="button" class="form-control my-3 submit" data-bs-toggle="modal" data-bs-target="#exampleModal" value="Đặt phòng">
                <?php
                    }
                ?>
            </form>
        <?php
            }
        ?>
    </div>

    <!-- Modal thông báo đăng nhập khi chưa đăng nhập mà đã bấm nút đặt phòng ; -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Thông báo!</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Vui lòng đăng nhập trước khi đặt phòng
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                    <a href="?action=login" class="btn btn-success">Đăng nhập</a>
                </div>
            </div>
        </div>
    </div>

    <div>
        <h6 class="px-1 py-2 text-white h6">Ảnh phòng</h6>
        <div id="carouselExampleFade" class="carousel slide carousel-fade px-1">
            <div class="carousel-inner">
                <?php foreach($listImageRoom as $Images => $Image) : ?>
                    <div class="carousel-item active">
                        <img src="<?php echo $Image ?>" class="d-block w-100" alt="Lỗi tải ảnh">
                    </div>
                <?php endforeach ; ?>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <div>
        <h6 class="px-1 py-2 text-white h6">Chi tiết phòng</h6>
        <div class="description px-1">
            <p>Tên khách sạn</p>
            <p><?php echo $RoomID -> NameHotel ?></p>
        </div>
        <div class="description px-1">
            <p>Tên loại phòng</p>
            <p><?php echo $RoomID -> RoomTypeName ?></p>
        </div>
        <div class="description px-1">
            <p>Tên phòng</p>
            <p><?php echo $RoomID -> RoomName ?></p>
        </div>
        <div class="description px-1">
            <p>Giá phòng</p>
            <p><?php echo number_format($RoomID -> Price) .'đ/1 đêm' ?></p>
        </div>
        <div class="description px-1">
            <p class="text-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Xem mô tả phòng</p>
        </div>
    </div>
</div>
<div style="margin-top:25px ;">
    <h3>Phòng cùng khách sạn</h3>
    <table class="table-responsive">
            <thead>
                <tr>
                    <th>Tên phòng</th>
                    <th>Ảnh phòng</th>
                    <th>Loại phòng</th>
                    <th>Số người</th>
                    <th>Giá</th>
                    <th>Đặt phòng</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($listRooms as $Rooms => $Room) : ?>
                    <tr>
                        <td><?php echo $Room -> RoomName ?></td>
                        <td><img src="<?php echo explode(',' , $Room -> Image)[1] ; ?>" width="150px" height="auto" alt="Lỗi tải ảnh"></td>
                        <td><?php echo $Room -> RoomTypeName ?></td>
                        <td><?php echo $Room -> MaximumNumber ?></td>
                        <td><?php echo number_format($Room -> Price) ." đ" ?></td>
                        <td>
                            <a href="?action=roomDetails&&RoomID=<?php echo $Room -> RoomID ?>"  style="background-color:#5fcb6e;padding:3px 5px;border-radius:3px;color:white;text-decoration:none;">Xem phòng</a>
                        </td>
                    </tr>
                <?php endforeach ; ?>
            </tbody>
    </table>
</div>


<!-- Modal xem mô tả phòng -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Mô tả phòng</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <?php echo $RoomID -> Description ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">OK</button>
      </div>
    </div>
  </div>
</div>


<script>

    function validateCheckRoom() {
        const check_in_date = document.querySelector('.check-in-date') ;
        const check_in_date_err = document.getElementById('check-in-date-err') ;
        const check_out_date = document.querySelector('.check-out-date')
        const check_out_date_err = document.getElementById('check-out-date-err') ;
        let checkRoom = true ;
        if(check_in_date.value.trim() == "") {
            check_in_date_err.innerText = "Hãy nhập ngày nhận phòng" ;
            checkRoom = false ;
        }else {
            check_in_date_err.innerText = "" ;
        }

        if(check_out_date.value.trim() == "") {
            check_out_date_err.innerText = "Hãy nhập ngày trả phòng" ;
            checkRoom = false ;
        }else {
            check_out_date_err.innerText = "" ;
        }
        return checkRoom ;
    }
</script>