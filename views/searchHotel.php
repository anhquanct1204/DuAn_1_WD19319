<style>
    .stars {
        color:gold ;
        font-size: 24px;
        cursor: pointer;
      }


    .btn-rating {
        background-color : #86B817 ;
        color : white ;
    }
    .modal-body div{
        margin-top : -20px ;
    }
   
    .text-center span {
        font-size : 35px ;
    }
    
    .title-h6 {
        margin-top : 0 ;    
    }
    .top-views {
        padding : 0 ;
    }
    .top-views li {
        border-bottom : 1px dotted gray ;
        padding: 5px 0 ;
    }
    .top-views li a {
        text-decoration : none ;
        color : black ;
    }
    .top-views li h6 {
        font-size : 13px ;
        margin-left : 5px ;
    }
    .details {
        display : grid ;
        margin-left:15px;
        grid-template-columns: 1.5fr 1fr;
    }
    .details div h5 a {
        color : black ;
        text-decoration : none ;
    }

    .details div h6 a {
        color : black ;
        text-decoration : none ;
        font-size : 14px;
    }

    .main {
        display: grid ;
        grid-template-columns: 1fr 2fr;
        border : 1px dotted gray ;
        margin-top : 20px ;
    }
    .main:nth-child(1) {
        margin-top : 0 ;
    }
    .price {
        text-align : right ;
        font-size : 23px ;
        margin-right : 10px ;
    }
    .fa-location-dot {
        margin-right : 5px ;
    }
    .fa-thumbs-up {
        margin-right : 5px ;
        color : #4790cd ;
    }
    .count-rating {
        font-size : 15px ;
    }
    @media (width < 691px) {
        .main {
            display: grid ;
            grid-template-columns: 1fr;
        }
        .main div {
            margin-top : 10px ;
        }
        .details {
            display: grid ;
            grid-template-columns: 1fr;
        }
        .details div {
            margin-top : 10px ;
        }
        .price {
            text-align : left ;
        }

    }
    .room-type {
        margin-top : 10px ;
    }
    .box-booking {
        position : relative ;
    }
    .btn-booking-room {
        position : absolute;
        bottom : 10px ;
        right : 15px ;
        text-decoration : none ;
        color : white ;
        padding: 3px  5px ;
        background-color : #86B817 ;
    }
    .btn-booking-room:hover {
        color : white ;
    }

</style>
<div class="box-details">
    <?php
        require './views/aside.php' ;
    ?>
    <div style="margin-left:10px;margin-top:5px;">
        <?php foreach($listHotelSearch as $HotelsSearch => $Hotel) : ?>
            <div class="main px-2 py-2">
                <div>
                    <img src="<?php echo explode(',' , $Hotel -> Image)[1] ?>" alt="Lỗi tải ảnh" width="100%" height="auto">
                </div>
                <div class="details">
                    <div class="">
                        <h5><a href="?action=hotelDetails&&HotelID=<?php echo $Hotel -> HotelID ?>"><?php echo $Hotel -> NameHotel ?></a></h5>
                        <p style="margin-top:10px;font-size:13px;color:#4790cd;"><i class="fa-solid fa-location-dot"></i><?php echo $Hotel -> Address ?></p>
                        <h6><a href="?action=roomDetails&&RoomID=<?php echo $Hotel -> RoomID ?>"><?php echo $Hotel -> RoomName?></a></h6>
                        <p class="room-type"><span>Loại phòng : </span><span><?php echo $Hotel -> RoomTypeName ?></span></p>
                    </div>
                    <div class="box-booking">
                        <p class="price"><span style="font-weight:500;color:#86B817;"><?php echo number_format($Hotel -> Price) ?></span><span style="font-size:15px;margin-left:3px;">VND/đêm</span></p> <br>
                        <a href="?action=roomDetails&&RoomID=<?php echo $Hotel -> RoomID ?>&&checkRoom&&checkIn=<?php echo $_POST['checkIn'] ?>&&checkOut=<?php echo $_POST['checkOut'] ?>" class="btn-booking-room">Đặt phòng</a>
                    </div>
                </div>
            </div>
        <?php endforeach ; ?>
        <?php
            if(empty($listHotelSearch)) {
        ?>
            <h4>Không tìm thấy kết quả nào !</h4>
        <?php
            }
        ?>
    </div>
</div>