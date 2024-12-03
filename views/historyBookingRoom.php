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
        background-color : #5fcb6e ;
    }
    .nav-profile li:hover a {
        color : white ;
    }
    
    .card-title {
        
        padding: 5px 10px;
    }
    .card-title-1 {
        background-color : #5fcb6e;
        color : white ;
    }
    
    .btn {
        font-size : 10px ;
    }
    .table-background {
        background-color : #5fcb6e;
    }
    .table-background tr th {
        color : white ;
        font-weight : 400 ;
    }
    .btn-pay {
        background-color : #ea4aaa ;
        color : white ;
    }
</style>

<div class="box-profile px-1">
    <div class="card-1">
        <h5 class="card-title card-title-1">Lịch sử đặt phòng</h5>
        <ul class="nav-profile">
            <li><a href="?action=profile">Thông tin cá nhân</a></li>
            <li><a href="?action=historyBookingRoom">Lịch sử đặt phòng</a></li>
            <li><a href="?action=logout">Đăng xuất</a></li>
        </ul>
    </div>
    <div class="">
            <table class="table table-hover">
                <thead class="table-background">
                    <tr>
                        <th>Tên KS</th>
                        <th>Tên phòng</th>
                        <th>Ngày đặt</th>
                        <th>Ngày vào</th>
                        <th>Ngày ra</th>
                        <th>Giá</th>
                        <th>Tổng tiền</th>
                        <th>Trạng thái</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach($historyBookingRoom as $Bookings => $Booking) : ?>
                        <tr>
                            <td><?php echo $Booking -> NameHotel ?></td>
                            <td><?php echo $Booking -> RoomName ?></td>
                            <td><?php echo $Booking -> ReservationDate ?></td>
                            <td><?php echo $Booking -> Check_In_Date ?></td>
                            <td><?php echo $Booking -> Check_Out_Date ?></td>
                            <td><?php echo number_format($Booking -> Price) ?></td>
                            <td><?php echo number_format($Booking -> TotalAmount) ?></td>
                            <td><?php echo $Booking -> NameStatus ?></td>
                            <td>
                                <?php
                                    if($Booking -> StatusID == 1) {
                                ?>
                                    <a href="?action=historyBookingRoom&&cancelBookingRoomID=<?php echo $Booking -> ReservationID ?>" class="btn btn-danger" onclick="return confirm('Bạn chắc chắn muốn hủy đặt phòng chứ ?');">Hủy</a>
                                    <a href="?action=payMomoQR&&ReservationID=<?php echo $Booking -> ReservationID ?>" class="btn btn-pay my-1">QR Momo</a>
                                    <a href="?action=payMomoATM&&ReservationID=<?php echo $Booking -> ReservationID ?>" class="btn btn-pay my-1">ATM Momo</a>
                                <?php
                                    }if($Booking -> StatusID == 2) {
                                ?>
                                    <a class="btn btn-primary">Đã TT</a>
                                <?php
                                    }if($Booking -> StatusID == 3) {
                                ?>
                                    <a class="btn btn-danger">Đã hủy</a>
                                <?php
                                    }if($Booking -> StatusID == 4) {
                                ?>
                                    <a class="btn btn-primary">Đã hoàn thành</a>
                                <?php
                                    }
                                ?>
                            </td>
                        </tr>
                    <?php endforeach ; ?>
                </tbody>
                
            </table>
    </div>
</div>
