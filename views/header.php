<?php $listHotels = getHotels() ; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <title>Du lịch muôn nơi</title> -->
    <title><?php echo isset($_GET['action']) ? $_GET['action'] : "" ?></title>
    <link rel="shortcut icon" href="./image/gogo11.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.3.0/raphael.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
</head>

<body>
    <div class="container">
        <header class="header">
            <nav class="navbar navbar-expand-lg bg-success">
                <div class="container-fluid">
                    <a class="navbar-brand" href="?action=home"><img class="logo" src="./image/gogo11.png" alt="Lỗi tải ảnh" width="80"></a>
                    <button class="navbar-toggler text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon text-white"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link text-white" aria-current="page" href="?action=home">Trang chủ</a>
                            </li>
                            
                            <li class="nav-item dropdown">
                                <a style="cursor:pointer;" class="nav-link dropdown-toggle text-white" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Khách sạn
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <a style="font-size:15px;" class="dropdown-item" href="?action=hotel&&listHotel">Tất cả khách sạn</a>
                                    <a style="font-size:15px;" class="dropdown-item" href="?action=hotel&&topHotel">Top đặt phòng</a>
                                    <a style="font-size:15px;" class="dropdown-item" href="?action=hotel&&topViews">Top lượt xem</a>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white btn-contact" aria-current="page" data-bs-toggle="modal" data-bs-target="#modalContact">Liên hệ</a>
                            </li>
                            <li class="nav-item dropdown search-room">
                                <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Tìm phòng
                                </a>
                                <div class="dropdown-menu px-3" aria-labelledby="navbarDropdown">
                                    <form action="?action=searchHotel" method="post" onsubmit="return validatesSearch();">
                                        <div class="form-group">
                                            <label for="">KHÁCH SẠN</label>
                                            <input style="height:30px;" type="text" name="nameHotel" id="nameHotel" placeholder="Tên khách sạn..." class="form-control my-2">
                                        </div>
                                        <div class="form-group">
                                            <label for="">NGÀY NHẬN PHÒNG</label>
                                            <input style="height:30px;" name="checkIn" id="checkIn" type="date" class="form-control my-2">
                                        </div>
                                        <div class="form-group">
                                            <label for="">NGÀY TRẢ PHÒNG</label>
                                            <input style="height:30px;" name="checkOut" id="checkOut" type="date" class="form-control my-2">
                                        </div>
                                        <div class="form-group">
                                            <label for="">SỐ NGƯỜI</label>
                                            <input style="height:30px;" name="quantity" id="quantity" type="number" min="0" step="1" class="form-control my-2">
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" value="TÌM PHÒNG" name="btn-search-room" class="form-control my-3" style="background-color:#86B817;color:white;">
                                        </div>
                                    </form>
                                </div>
                            </li>
                        </ul>
                        <?php
                            if(isset($_SESSION['login'])) {
                        ?>
                        <div class="nav-item dropdown profile">
                            <a class="nav-link dropdown-toggle text-white" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?php echo "Xin chào " .$_SESSION['email'] ; ?>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="?action=profile">Thông tin tài khoản</a>
                                <a class="dropdown-item" href="?action=historyBookingRoom">Lịch sử đặt phòng</a>
                                <?php
                                    if($_SESSION['role'] == 1) {
                                ?>
                                    <a class="dropdown-item" href="?action=managerHotels">Quản lí</a>
                                <?php
                                    }
                                ?>
                                <a class="dropdown-item" href="?action=logout">Đăng xuất</a>
                            </div>
                        </div>
                        <?php
                            }else {
                        ?>
                        <div class="nav-item dropdown profile">
                            <a class="nav-link text-white" href="?action=login">Đăng nhập</a>
                        </div>
                        <?php
                            }
                        ?>
                    </div>
                </div>
            </nav>
            
            <div class="modal fade" id="modalContact" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Thông tin liên hệ</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h5>GỌI CHO CHÚNG TÔI</h5>
                        <p><span>Tổng đài : </span><span><strong>028 73030 588 - 028 3925 1055</strong></span></p>
                        <p><span>Cá nhân : </span><span><strong>0902 606 953 - 0902 329 215</strong></span></p>
                        <h5>ĐỊA CHỈ VĂN PHÒNG</h5>
                        <p>Tòa nhà FPT Polytechnic., Cổng số 2, 13 P. Trịnh Văn Bô, Xuân Phương, Nam Từ Liêm, Hà Nội</p> 
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">OK</button>
                    </div>
                    </div>
                </div>
            </div>
        </header>

        <script>
            const nameHotel = document.getElementById('nameHotel') ;
            const checkIn = document.getElementById('checkIn') ;
            const checkOut = document.getElementById('checkOut') ;
            const quantity = document.getElementById('quantity') ;

            function validatesSearch() {
                let check = true ;
                if(nameHotel.value.trim() == "" || checkIn.value.trim() == "" || checkOut.value.trim() == "" || quantity.value.trim() == "") {
                    alert("Vui lòng nhập đầy đủ thông tin !") ;
                    check = false ;
                }
                return check ;
            }
        </script>
        