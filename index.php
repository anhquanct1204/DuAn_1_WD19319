<?php
    session_start() ;
    require './model/connect.php' ;
    require './model/checkBooking.php' ;
    require './model/role.php' ;
    require './model/user.php' ;
    require './model/hotel.php' ;
    require './model/roomType.php' ;
    require './model/room.php' ;
    require './model/reservation.php' ;
    require './model/statistical.php' ;
    require './model/pay.php' ;
    require './views/header.php' ;

    // Kiểm tra trạng thái đặt phòng đã quá hạn thanh toán hay chưa ;
    updateReservation() ;
    // Kiểm tra thời gian nghỉ dưỡng tại khách sạn đã hết hay chưa ;
    updateReservationStatus() ;
    if(isset($_GET['action'])) {
        $action = $_GET['action'] ;
        switch($action) {
            // Đăng nhập ;
            case 'login' : {
                if(isset($_POST['btn-login'])) {
                    $user = login($_POST['email']) ;
                    $error = [] ;
                    if(!empty($user)) {
                        if($user -> Password == $_POST['password']) {
                            if($user -> DisplayStatusID == 1) {
                                $_SESSION['login'] = true ;
                                $_SESSION['userID'] = $user -> UserID ;
                                $_SESSION['email'] = $_POST['email'] ;
                                $_SESSION['role'] = $user -> RoleID ;
                            echo '<script type="text/javascript">window.location.href = "?action=home";</script>';
                            }else {
                                echo "<script>alert('Tài khoản của bạn đã bị khóa')</script>" ;
                            }
                        }else {
                            $error['login']['password'] = "Mật khẩu không đúng" ;
                        }
                    }else {
                        $error['login']['email'] = "Email không tồn tại" ;
                    }
                }
                require './views/login/login.php' ;
                break ;
            }

            //Đăng xuất ;
            case 'logout': {
                logout();
            }
            //Đăng kí
            case 'signup' : {
                if(isset($_POST['btn-signup'])) {
                    $error = [] ;
                    $checkEmail = login($_POST['email']) ;
                    if(!empty($checkEmail)) {
                        $error['signup']['email'] = "Email đã tồn tại" ;
                    }else {
                        signup($_POST['password'] , $_POST['email'] , 2) ;
                    }
                }
                require './views/login/signup.php' ;
                break ;
            }

            // Trang chủ ;
            case 'home' : {
                $topReservationHotel = topReservationHotel() ;
                $topViews = topViewsHotel() ;
                require './views/home.php' ;
                break ;
            }

            // Trang tìm phòng ;
            case 'searchHotel' : {
                // Danh sách top khách sạn có lượt xem cao nhất ;
                $topViewsHotel = topViewsHotel() ;
                // Danh sách top 10 khách sạn có lượt đặt phòng cao nhất ;
                $topReservationHotel = topReservationHotel() ;
                if(isset($_POST['btn-search-room'])) {
                    $listHotelSearch = searchHotel($_POST['nameHotel'] , $_POST['checkIn'] , $_POST['checkOut'] , $_POST['quantity']) ;
                    require './views/searchHotel.php' ;
                }
                
                break ;
            }
           

            // Trang khách sạn ;
            case 'hotel' : {
                $listHotel = getHotels() ;
                $topReservationHotel = topReservationHotel() ;
                $topViews = topViewsHotel() ;
                require './views/hotel.php' ;
                break ;
            }

            // Trang chi tiết khách sạn ;
            case 'hotelDetails' : {
                // Lấy thông tin khách sạn theo ID ;
                if(isset($_GET['HotelID'])) {
                    $Hotel = getHotelsID($_GET['HotelID']) ;
                    // Lấy thông tin tất cả các phòng của khách sạn ;
                    $listRoomHotelID = getRoomHotelID($_GET['HotelID']) ;

                    // Danh sách top khách sạn có lượt xem cao nhất ;
                    $topViewsHotel = topViewsHotel() ;
                    // Danh sách top 10 khách sạn có lượt đặt phòng cao nhất ;
                    $topReservationHotel = topReservationHotel() ;
                    
                    // Lấy số lượt xem khách sạn hiện tại cộng với 1 lượt xem ;
                    $views = $Hotel -> Views + 1 ;
                    updateViews($_GET['HotelID'] , $views) ;

                    // Kiểm tra xem người dùng đã từng đặt phòng ở khách sạn này chưa để hiển thị ra nút đánh giá ;
                    if(isset($_SESSION['login'])) {
                        $checkBooking = checkBooking($_SESSION['userID'] , $_GET['HotelID']) ;
                    }
                    require './views/hotelDetails.php' ;
                }
                
                break ;
            }

            // Trang chi tiết phòng
            case 'roomDetails' : {
                if(isset($_GET['RoomID'])) {
                    $RoomID = getRoomID($_GET['RoomID']) ;
                    $listImageRoom = explode(',' , $RoomID -> Image) ;
                    // Lấy danh sách phòng cùng khách sạn ;
                    $listRooms = getRooms($RoomID -> HotelID , $RoomID -> RoomID) ;
                    // Kiểm tra xem phòng khách hàng đã chọn có còn trống không theo luồng người dùng chọn phòng ngẫu nhiên ;
                    if(isset($_POST['check-room'])) {
                        $check_in_date = new DateTime($_POST['check-in-date']) ;
                        $check_out_date = new DateTime($_POST['check-out-date']) ;
                        // Lấy số đêm khách đặt ;
                        $numberOfNights = $check_in_date->diff($check_out_date) -> format('%a') ;
                        $result = checkRoom($_GET['RoomID'] , $_POST['check-in-date'] , $_POST['check-out-date']) ;
                        if(empty($result)) {
                            echo "<script>alert('Không còn phòng trong thời gian bạn mong muốn')</script>" ;
                        }
                    }

                    // Kiểm tra xem phòng khách hàng đã chọn có còn trống không theo luồng người dùng chọn tìm kiếm khách sạn ;
                    if(isset($_GET['checkRoom'])) {
                        $check_in_date = new DateTime($_GET['checkIn']) ;
                        $check_out_date = new DateTime($_GET['checkOut']) ;
                        // Lấy số đêm khách đặt ;
                        $numberOfNights = $check_in_date->diff($check_out_date) -> format('%a') ;
                        $result = checkRoom($_GET['RoomID'] , $_GET['checkIn'] , $_GET['checkOut']) ;
                        if(empty($result)) {
                            echo "<script>alert('Không còn phòng trong thời gian bạn mong muốn')</script>" ;
                        }
                    }
                    

                    // Đặt phòng ;
                    if(isset($_POST['book-room'])) {
                        // Lấy múi giờ của Việt Nam ;
                        date_default_timezone_set('Asia/Ho_Chi_Minh') ;
                        // Lấy thời gian hiện tại ;
                        $ReservationDate = date('Y-m-d H:i:s') ;
                        // Cập nhật phòng ;
                        bookingRoom($_SESSION['userID'] , $_GET['RoomID'] , $ReservationDate , $_POST['check-in-date-booking'] , 
                        $_POST['check-out-date-booking'] , $_POST['price-room-booking'] , $_POST['amount-booking'] , 1) ;

                    }



                    require './views/roomDetails.php' ;
                }

                
                break ;
            }

            // Phần thanh toán online bằng Momo QR ;
            case 'payMomoQR' : {
                if(isset($_GET['ReservationID'])) {
                    $ReservationID = ReservationID($_GET['ReservationID']) ;
                    require './views/payMomoQR.php' ;
                }
                break ;
            }

            // Phần thanh toán online bằng Momo ATM ;
            case 'payMomoATM' : {
                if(isset($_GET['ReservationID'])) {
                    // Lấy thông tin đơn đặt phòng theo ReservationID ;
                    $ReservationID = ReservationID($_GET['ReservationID']) ;
                    require './views/payMomoATM.php' ;
                }
                break ;
            }

            // Phần thông tin cá nhân và cập nhật thông tin cá nhân ;
            case 'profile' : {
                if(isset($_SESSION['login'])) {
                    // Đổi mật khẩu trong trang thông tin tài khoản ;
                    if(isset($_POST['btn_change_password'])) {
                        $error = [] ;
                        // Lấy mật khẩu theo email ;
                        $old_password = login($_SESSION['email']) -> Password ;
                        // So sánh mật khẩu cũ trong database với mật khẩu cũ người dùng nhập ở form ;
                        if($old_password != $_POST['old_password']) {
                            $error['old_password'] = "Mật khẩu cũ không đúng" ;
                        }else {
                            changePassword($_POST['new_password'] , $_SESSION['userID']) ;
                        }
                    }


                    // Cập nhật thêm thông tin tài khoản trong trang thông tin tài khoản ;
                    if(isset($_POST['btn_add_profile'])) {
                        changeProfile($_POST['fullname'] , $_POST['phone'] , $_SESSION['userID']) ;
                    }



                    require './views/profile.php' ;
                }
                break; 
            }

            // Lịch sử đặt phòng ;
            case 'historyBookingRoom' : {
                if(isset($_SESSION['login'])) {
                    // Lấy danh sách sách các phòng đã từng đặt theo người dùng ;
                    $historyBookingRoom = reservationUserID($_SESSION['userID']) ;
                    // Hủy đặt phòng ;
                    if(isset($_GET['cancelBookingRoomID'])) {
                        cancelBookingRoom($_GET['cancelBookingRoomID']) ;
                    }

                    // Cập nhật lại thông tin sau khi thanh toán thành công ;
                    if(isset($_GET['partnerCode']) && $_GET['message'] == 'Successful.') {
                        // Cập nhật lại trạng thái đơn đặt hàng (Trong trường hợp này thì biến $extraData sẽ thay thế cho ReservationID)
                        updateStatusReservation($_GET['extraData']) ;
                        // Thêm thông tin thanh toán vào bảng thanh toán ;
                        createPay($_GET['extraData'] , $_GET['orderInfo']) ;
                    }


                    require './views/historyBookingRoom.php' ;
                }
                break ;
            }


            // <-------Phần quản trị----->

            // Quản lý khách sạn ;
            case 'managerHotels' : {
                // Kiểm tra xem tài khoản có đúng là admin không ;
                if(isset($_SESSION['login']) && isset($_SESSION['role']) && $_SESSION['role'] == 1) {
                    // Lấy danh sách khách sạn ;
                    $listHotels = getHotelsAdmin() ;
                    // Lấy số lượng bản ghi ;
                    $count = getCountHotels() -> QuantityHotel ;
                
                // Thêm khách sạn ;
                    if(isset($_POST['btn-add-hotel'])) {
                        foreach($_FILES['image']['tmp_name'] as $key => $value) {
                            $image = './image_hotel/' .basename($_FILES['image']['name'][$key]) ;
                            $file = $_FILES['image']['tmp_name'][$key] ;
                            $err = $_FILES['image']['error'][$key] ;
                            if(empty($err) && move_uploaded_file($file , $image)) {
                                $imageUpload[] = $image ;
                            }
                        }
                        if(!empty($imageUpload)) {
                            $imagePaths = implode(',' , $imageUpload) ;
                            $address = $_POST['apartmentNumber'] .',' .$_POST['ward'] .',' .$_POST['district'] .',' .$_POST['province'] ;
                            createHotel($_POST['name'] , $imagePaths , $address , $_POST['phone'] , $_POST['email']) ;
                            
                        }
                    }

                    // Xóa từng khách sạn ;
                    if(isset($_GET['DeleteHotelID'])) {
                        $stringImage = getHotelsID($_GET['DeleteHotelID']) ;
                        // $imagePaths = explode(',' , $stringImage -> Image) ;
                        // foreach($imagePaths as $images => $image) {
                        //     if(file_exists($image)) {
                        //         unlink($image) ;
                        //     }
                        // }
                        deleteHotel($_GET['DeleteHotelID']) ;
                    }

                    // Xóa nhiều khách sạn ;
                    if(isset($_POST['delete_checked'])) {
                        $listIDHotel = $_POST['check'] ;
                        foreach($listIDHotel as $HotelIDs => $HotelID) {
                            deleteHotel($HotelID) ;
                        }
                        
                    }
                    require './views/admin/hotel/managerHotels.php' ;
                }

                break ;
            }

            // Cập nhật khách sạn ;
            case 'updateHotel' : {
                if(isset($_SESSION['login']) && isset($_SESSION['role']) && $_SESSION['role'] == 1) {
                    $hotel = getHotelsID($_GET['updateHotelID']) ;
                    if(isset($_POST['btn-update-hotel'])) {
                        if($_FILES['image']['size'] >= 0) {
                            foreach($_FILES['image']['tmp_name'] as $key => $value) {
                                $image = './image_hotel/' .basename($_FILES['image']['name'][$key]) ;
                                $file = $_FILES['image']['tmp_name'][$key] ;
                                $err = $_FILES['image']['error'][$key] ;
                                if(empty($err) && move_uploaded_file($file , $image)) {
                                    $imageUpload[] = $image ;
                                }
                            }
                            if(!empty($imageUpload)) {
                                $imagePaths = implode(',' , $imageUpload) ;
                                $address = empty($_POST['province']) ? $hotel -> Address : $_POST['apartmentNumber'] .',' .$_POST['ward'] .',' .$_POST['district'] .',' .$_POST['province'] ;
                                updateHotel($_POST['name'] , $imagePaths , $address , $_POST['phone'] , $_POST['email'] , $_POST['status'] , $_POST['HotelID']) ;
                                foreach(explode(',' , $hotel -> Image) as $oldImage) {
                                    $isUsed = false;
                                    foreach($imageUpload as $image) {
                                        if($oldImage === $image) {
                                            $isUsed = true ;
                                            break ;
                                        }
                                    }
                                    if(!$isUsed && isset($oldImage)) {
                                        unlink($oldImage) ;
                                    }
                                }
                                
                            }else {
                                $address = empty($_POST['province']) ? $hotel -> Address : $_POST['apartmentNumber'] .',' .$_POST['ward'] .',' .$_POST['district'] .',' .$_POST['province'] ;
                                updateHotelNoImage($_POST['name'] , $address , $_POST['phone'] , $_POST['email'] , $_POST['status'] , $_POST['HotelID']) ;
                            }
                        }
                    }
                    require './views/admin/hotel/updateHotel.php' ;
                }
                break ;
            }

            // Quản lý loại phòng ;
            case 'managerTypeRoom' : {
                if(isset($_SESSION['login']) && isset($_SESSION['role']) && $_SESSION['role'] == 1) {
                    // Lấy danh sách loại phòng ;
                    $listRoomType = getRoomType() ;
                    // Thêm loại phòng ;
                    if(isset($_POST['btn-add-roomType'])) {
                        createRoomType($_POST['RoomTypeName'] , $_POST['Description']) ;
                    }
                    // Xóa từng loại phòng ;
                    if(isset($_GET['DeleteTypeRoomID'])) {
                        deleteRoomType($_GET['DeleteTypeRoomID']) ;
                    }
                    // Xóa nhiều loại phòng cùng lúc ;
                    if(isset($_POST['delete_checked'])) {
                        $listRoomTypeDelete = $_POST['check'];
                        foreach($listRoomTypeDelete as $lists => $list) {
                            deleteRoomType($list) ;
                        }
                    }
                    require './views/admin/roomtype/roomTypes.php' ;
                }
                break ;
            }

            // Cập nhật loại phòng ;
            case 'updateRoomType' : {
                if(isset($_SESSION['login']) && isset($_SESSION['role']) && $_SESSION['role'] == 1) {
                    $RoomTypeID = getRoomTypeID($_GET['UpdateRoomTypeID']) ;
                    if(isset($_POST['btn-update-roomType'])) {
                        updateRoomType($_POST['RoomTypeName'] , $_POST['Description'] , $_POST['status'] , $_POST['RoomTypeID']) ;
                    }
                    require './views/admin/roomtype/updateRoomType.php' ;
                }
                break ;
            }

            // Quản lý phòng ;
            case 'managerRoom' : {
                if(isset($_SESSION['login']) && isset($_SESSION['role']) && $_SESSION['role'] == 1) {
                    // Lấy danh sách phòng ;
                    $listRooms = getRoomAdmin() ;
                    // Lấy số lượng phòng ;
                    $count = getCountRoom() -> CountRoom ;
                    // Lấy danh sách loại phòng đưa vào select box ;
                    $listRoomType = getRoomTypeDisplay() ;
                    // Thêm phòng ;
                    if(isset($_POST['btn-add-room'])) {
                        foreach($_FILES['image']['tmp_name'] as $key => $value) {
                            $image = './image_room/' .basename($_FILES['image']['name'][$key]) ;
                            $file = $_FILES['image']['tmp_name'][$key] ;
                            $err = $_FILES['image']['error'][$key] ;
                            if(empty($err) && move_uploaded_file($file , $image)) {
                                $imageUpload[] = $image ;
                            }
                        }
                        if(!empty($imageUpload)) {
                            $imagePaths = implode(',' , $imageUpload) ;
                            createRoom($_POST['HotelID'] , $_POST['RoomTypeID'] , $_POST['RoomName'] , $_POST['MaximumNumber'] , $_POST['Description'] , $imagePaths , $_POST['Price']) ;
                            
                        }
                    }

                    // Xóa từng phòng phòng ;
                    if(isset($_GET['DeleteRoomID'])) {
                        // $stringImage = getRoomID($_GET['DeleteRoomID']) ;
                        // $imagePaths = explode(',' , $stringImage -> Image) ;
                        // foreach($imagePaths as $images => $image) {
                        //     if(file_exists($image)) {
                        //         unlink($image) ;
                        //     }
                        // }
                        deleteRoom($_GET['DeleteRoomID']) ;
                    }

                    // Xóa đồng thời nhiều phòng ;
                    if(isset($_POST['delete_checked'])) {
                        $listIDRoom = $_POST['RoomID'] ;
                        foreach($listIDRoom as $RoomIDs => $RoomID) {
                            // $stringImage = getRoomID($RoomID) ;
                            // $imagePaths = explode(',' , $stringImage -> Image) ;
                            // foreach($imagePaths as $images => $image) {
                            //     if(file_exists($image)) {
                            //         unlink($image) ;
                            //     }
                            // }
                            deleteRoom($RoomID) ;
                        }
                        
                    }

                    require './views/admin/room/rooms.php' ;
                    
                }
                break ;
            }

            case 'updateRoom' : {
                if(isset($_SESSION['login']) && isset($_SESSION['role']) && $_SESSION['role'] == 1) {
                    // Lấy thông tin phòng theo ID ;
                    $RoomID = getRoomID($_GET['UpdateRoomID']) ;
                    // Lấy danh sách loại phòng ;
                    $listRoomType = getRoomTypeDisplay() ;
                    if(isset($_POST['btn-update-room'])) {
                        foreach($_FILES['image']['tmp_name'] as $key => $value) {
                            $image = './image_room/' .basename($_FILES['image']['name'][$key]) ;
                            $file = $_FILES['image']['tmp_name'][$key] ;
                            $err = $_FILES['image']['error'][$key] ;
                            if(empty($err) && move_uploaded_file($file , $image)) {
                                $imageUpload[] = $image ;
                            }
                        }
                        if(!empty($imageUpload)) {
                            $imagePaths = implode(',' , $imageUpload) ;
                            updateRoom($_POST['RoomID'] , $_POST['HotelID'] , $_POST['RoomTypeID'] , $_POST['RoomName'] , $_POST['MaximumNumber'] , $_POST['Description'] , $imagePaths , $_POST['Price'] , $_POST['status']) ;
                            foreach(explode(',' , $RoomID -> Image) as $oldImage) {
                                $isUsed = false ;
                                foreach($imageUpload as $newImage) {
                                    if($oldImage === $newImage) {
                                        $isUsed = true ;
                                        break ;
                                    }
                                } 
                                if(!$isUsed && isset($oldImage)) {
                                    unlink($oldImage) ;
                                }
                            }
                        }else {
                            updateRoomNoImage($_POST['RoomID'] , $_POST['HotelID'] , $_POST['RoomTypeID'] , $_POST['RoomName'] , $_POST['MaximumNumber'] , $_POST['Description'] , $_POST['Price'] , $_POST['status']) ;
                        }
                    }
                    require './views/admin/room/updateRoom.php' ;
                }
                break ;
            }

            // Quản lí người dùng ;
            case 'managerUsers' : {
                if(isset($_SESSION['login']) && isset($_SESSION['role']) && $_SESSION['role'] == 1) {
                    // Lấy danh sách kiểu người dùng ;
                    $listRoles = getRole() ;
                    // Lấy tất cả user ;
                    $listUsers = getUsersAdmin() ;
                    // Đếm số lượng user ;
                    $count = getCountUsers() -> CountUser ;
                    // Thêm mới user ;
                    if(isset($_POST['btn-add-user'])) {
                        // Kiểm tra xem email người dùng nhập đã tồn tại trong hệ thống hay chưa ;
                        $error = [] ;
                        if(!empty(login($_POST['email']))) {
                            $error['admin_add_user']['email'] = "Email đã tồn tại" ;
                        }else {
                            createUser($_POST['password'] , $_POST['email'] , $_POST['role']) ;
                        }

                    }
                    // Xóa từng user ;
                    if(isset($_GET['DeleteUserID'])) {
                        deleteUser($_GET['DeleteUserID']) ;
                    }
                    // Xóa nhiều người dùng ;
                    if(isset($_POST['delete_checked'])) {
                        $listUsersDelete = $_POST['check'] ;
                        foreach($listUsersDelete as $UserDelete => $UserID) {
                            deleteUser($UserID) ;
                        }
                    }
                    require './views/admin/user/managerUsers.php' ;
                }
                break ;
            }

            // Update người dùng trong trang admin ;
            case 'updateUser' : {
                if(isset($_SESSION['login']) && isset($_SESSION['role']) && $_SESSION['role'] == 1) {
                    // Lấy tất cả các kiểu người dùng trong bảng Role ;
                    $listRoles = getRole() ;
                    // Lấy thông tin người dùng theo ID ;
                    $UserID = getUsersID($_GET['UpdateUserID']) ;
                    if(isset($_POST['btn-update-user'])) {
                        // Kiểm tra email xem nó đã tồn tại hay chưa;
                        $error = [] ;
                        $checkEmail = login($_POST['email']) ;
                        if(!empty($checkEmail) && $_POST['email'] != $UserID -> Email) {
                            $error['edit_user']['email'] = "Email đã tồn tại , hãy nhập email khác" ;
                        }else {
                            updateUser($_POST['email'] , $_POST['password'] , $_POST['UserID'] , $_POST['status'] , $_POST['role']) ;
                        }
                    }
                    require './views/admin/user/updateUser.php' ;
                }
                break ;
            }

            // Quản lí danh sách đặt phòng ;
            case 'listReservation' : {
                if(isset($_SESSION['login']) && isset($_SESSION['role']) && $_SESSION['role'] == 1) {
                    // Lấy danh sách đặt phòng ;
                    $listReservation = reservation() ;
                    // Lấy số lượng đặt phòng ;
                    $count = CountReservation() -> QuantityReservation ;
                    require './views/admin/listbooking/managerBooking.php' ;
                }
                break ;
            }
            // Quản lý thanh toán ;
            case 'managerPay' : {
                if(isset($_SESSION['login']) && isset($_SESSION['role']) && $_SESSION['role'] == 1) {
                    // Lấy danh sách thanh toán ;
                    $listPays = getPays() ;
                    // Đếm số lượng thanh toán ;
                    $count = CountPay() -> CountPay ;
                    require './views/admin/pay/managerPay.php' ;
                }
                break ;
            }
            
            default : {
                $topReservationHotel = topReservationHotel() ;
                $topViews = topViewsHotel() ;
                require './views/home.php' ;
                break ;
            }
        }
    }else {
        $topReservationHotel = topReservationHotel() ;
        $topViews = topViewsHotel() ;
        require './views/home.php' ;
    }
    require './views/footer.php' ;

?>