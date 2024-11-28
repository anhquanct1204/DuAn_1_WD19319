<div id="carouselExampleRide" class="carousel slide" data-bs-ride="true">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="./image/banner 5.jpg" class="d-block w-100" alt="..." >
        </div>
        <div class="carousel-item">
            <img src="./image/banner 6.jpg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
            <img src="./image/banner 7.jpg" class="d-block w-100" alt="...">
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleRide" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleRide" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
    
    <form action="?action=searchHotel" method="post" onsubmit="return validateSearchHome();">
        <div class="row row-responsive">
            <div class="col-lg-3 col-md-3 col-md-4 col-sm-6 col-12 my-2">
                <div class="card">
                    <label for="" class="search-label h2">ĐIỂM ĐẾN</label>
                    <input type="text" id="nameHotelSearch" name="nameHotel" placeholder="Tên khách sạn" class="form-control my-1">
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-md-4 col-sm-6 col-12 my-2">
                <div class="card">
                    <label for="" class="search-label h2">NGÀY NHẬN PHÒNG</label>
                    <input id="myID" name="checkIn" placeholder="Ngày đến..." class="form-control my-1 checkInSearch">
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-md-4 col-sm-6 col-12 my-2">
                <div class="card">
                    <label for="" class="search-label h2">NGÀY TRẢ PHÒNG</label>
                    <input name="checkOut" placeholder="Ngày đi..." id="myID" class="form-control my-1 checkOutSearch">
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-md-4 col-sm-6 col-12 my-2">
                <div class="card">
                    <label for="" class="search-label h2">SỐ NGƯỜI</label>
                    <input type="number" name="quantity" id="quantitySearch" min="0" step="1" placeholder="Số người" class="form-control my-1">
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-md-4 col-sm-6 col-12 my-2">
                <div class="card">
                    <label for="" class="search-label transparent">Tìm</label>
                    <input type="submit" name="btn-search-room" value="Tìm phòng" class="form-control my-1 btn btn-success">
                </div>
            </div>
        </div>
    </form>
</div>



<div class="row" style="padding: 10px;margin-top: 20px;">
    <div class="col-md-4 col-sm-6 col-12 my-2" style="padding: 20px;background-color: #ffffff;">
        <div class="card">
            <img src="./image/anh6.jpg" class="card-img-top" alt="Lỗi tải ảnh">
            <div class="card-name">
                <h6 class="card-title my-2">ĐIỂM ĐẾN HẤP DẪN</h6>
            </div>
        </div>
    </div>
    <div class="col-md-4 col-sm-6 col-12 my-2" style="padding: 20px;background-color: #ffffff;">
        <div class="card">
            <img src="./image/anh7.jpg" class="card-img-top" alt="Lỗi tải ảnh">
            <div class="card-name">
                <h6 class="card-title my-2">DỊCH VỤ CAO CẤP</h6>
            </div>
        </div>
    </div>
    <div class="col-md-4 col-sm-6 col-12 my-2" style="padding: 20px;background-color: #ffffff;">
        <div class="card">
            <img src="./image/Anh3.jpg" class="card-img-top" alt="Lỗi tải ảnh">
            <div class="card-name">
                <h6 class="card-title my-2">KHU NGHỈ DƯỠNG SIÊU SANG</h6>
            </div>
        </div>
    </div>
</div>



<div class="row" style="padding: 10px;margin-top: 20px;">
    <h5>TOP ĐIỂM ĐẾN</h5>
    <?php foreach($topReservationHotel as $Hotels => $Hotel) : ?>
        <div class="col-lg-3 col-md-3 col-md-4 col-sm-6 col-12 my-2" style="padding: 20px;background-color: #ffffff;">
            <div class="card">
                <img src="<?php echo explode(',' , $Hotel -> Image)[1] ; ?>" class="card-img-top" alt="Lỗi tải ảnh">
                <div class="card-name">
                    <h6 class="card-title my-2"><a style="color:black;text-decoration:none;" href="?action=hotelDetails&&HotelID=<?php echo $Hotel -> HotelID ?>"><?php echo $Hotel -> NameHotel ?></a></h6>
                </div>
            </div>
        </div>
    <?php endforeach ; ?>
</div>

<div class="row" style="padding: 10px;margin-top: 20px;">
    <h5>TOP LƯỢT XEM</h5>
    <?php $listHotels = getHotels() ; ?>
    <?php foreach($topViews as $Views => $View) : ?>
        <div class="col-lg-3 col-md-3 col-md-4 col-sm-6 col-12 my-2" style="padding: 20px;background-color: #ffffff;">
            <div class="card">
                <img src="<?php echo explode(',' , $View -> Image)[0] ?>" class="card-img-top" alt="Lỗi tải ảnh">
                <div class="card-name">
                    <a href="?action=hotelDetails&&HotelID=<?php echo $View -> HotelID ?>" style="text-decoration: none;color:black;"><h6 class="card-title my-2"><?php echo $View -> NameHotel ?></h6></a>
                    <!-- <span style="font-size: 13px;">Có công viên nước, từ 1.980k/đêm</span> -->
                </div>
            </div>
        </div>
    <?php endforeach ; ?>
</div>

<script>
    

    function validateSearchHome() {
        const nameHotelSearch = document.getElementById('nameHotelSearch') ;
        const checkInSearch = document.querySelector('.checkInSearch') ;
        const checkOutSearch = document.querySelector('.checkOutSearch') ;
        const quantitySearch = document.getElementById('quantitySearch') ;
        let check = true ;
        if(nameHotelSearch.value.trim() == "" || checkInSearch.value.trim() == "" || checkOutSearch.value.trim() == "" || quantitySearch.value.trim() == "") {
            alert("Vui lòng nhập đầy đủ thông tin !") ;
            check = false ;
        }
        return check ;
    }
</script>

