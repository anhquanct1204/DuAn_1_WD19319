<!-- Hiển thị danh sách tất cả các khách sạn phụ thuộc vào biến $_GET phía sau biến action trên thanh trình duyệt -->

<div class="row" style="padding: 10px;margin-top: 20px;">
    <?php
        if(isset($_GET['listHotel'])) {
    ?>
        <h5>DANH SÁCH KHÁCH SẠN</h5>
        <?php foreach($listHotel as $Hotels => $Hotel) : ?>
            <div class="col-lg-3 col-md-3 col-md-4 col-sm-6 col-12 my-2" style="padding: 20px;background-color: #ffffff;">
                <div class="card">
                    <img src="<?php echo explode(',' , $Hotel -> Image)[0] ?>" class="card-img-top" alt="Lỗi tải ảnh">
                    <div class="card-name">
                        <h6 class="card-title my-2"><a style="color:black;text-decoration:none;" href="?action=hotelDetails&&HotelID=<?php echo $Hotel -> HotelID ?>"><?php echo $Hotel -> NameHotel ?></a></h6>
                    </div>
                </div>
            </div>
        <?php endforeach ; ?>
    <?php
        }if(isset($_GET['topHotel'])) {
    ?>
        <h5>LỰA CHỌN PHỔ BIẾN</h5>
        <?php foreach($topReservationHotel as $Hotels => $Hotel) : ?>
            <div class="col-lg-3 col-md-3 col-md-4 col-sm-6 col-12 my-2" style="padding: 20px;background-color: #ffffff;">
                <div class="card">
                    <img src="<?php echo explode(',' , $Hotel -> Image)[1] ?>" class="card-img-top" alt="Lỗi tải ảnh">
                    <div class="card-name">
                        <h6 class="card-title my-2"><a style="color:black;text-decoration:none;" href="?action=hotelDetails&&HotelID=<?php echo $Hotel -> HotelID ?>"><?php echo $Hotel -> NameHotel ?></a></h6>
                    </div>
                </div>
            </div>
        <?php endforeach ; ?>
    <?php
        }if(isset($_GET['topViews'])) {
    ?>
        <h5>TOP LƯỢT XEM</h5>
        <?php foreach($topViews as $Views => $View) : ?>
            <div class="col-lg-3 col-md-3 col-md-4 col-sm-6 col-12 my-2" style="padding: 20px;background-color: #ffffff;">
                <div class="card">
                    <img src="<?php echo explode(',' , $View -> Image)[1] ?>" class="card-img-top" alt="Lỗi tải ảnh">
                    <div class="card-name">
                        <h6 class="card-title my-2"><a style="color:black;text-decoration:none;" href="?action=hotelDetails&&HotelID=<?php echo $View -> HotelID ?>"><?php echo $View -> NameHotel ?></a></h6>
                    </div>
                </div>
            </div>
        <?php endforeach ; ?>
    <?php
        }
    ?>
</div>