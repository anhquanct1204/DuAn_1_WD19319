<?php
    // Thêm khách sạn ;
    function createHotel($name , $image , $address , $phone , $email) {
        $conn = connectDB() ;
        $sql = "INSERT INTO `hotel` (`NameHotel` , `Image` , `Address` , `Phone` , `Email` , `DisplayHotelID`) VALUES('$name' , '$image' , '$address' , '$phone' , '$email' , 1)" ;
        $result = $conn -> query($sql)  ;
        echo '<script type="text/javascript">window.location.href = "?action=managerHotels";</script>';
    }

    // Lấy ra dữ liệu khách sạn ;
    function getHotels() {
        $conn = connectDB() ;
        $sql = "SELECT * FROM `hotel` WHERE `DisplayHotelID` = '1'" ;
        $result = $conn -> query($sql) -> fetchAll() ;
        return $result ;
    }

    // Lấy ra số lượng bản ghi ;
    function getCountHotels() {
        $conn = connectDB() ;
        $sql = "SELECT COUNT(*) AS `QuantityHotel` FROM `hotel`" ;
        $result = $conn -> query($sql) -> fetch() ;
        return $result ;
    }
    
    // Lấy ra dữ liệu khách sạn đổ ra trang admin ;
    function getHotelsAdmin() {
        if(isset($_GET['pages'])) {
            $pages = $_GET['pages'] ;
        }else {
            $pages = 1 ;
        }
        $location = ($pages - 1) * 10 ;
        $conn = connectDB() ;
        $sql = "SELECT * FROM `hotel` ORDER BY `Views` DESC LIMIT $location,10" ;
        $result = $conn -> query($sql) -> fetchAll() ;
        return $result ;
    }

    // Lấy dữ liệu khách sạn theo id ;
    function getHotelsID($hotelID) {
        $conn = connectDB() ;
        $sql = "SELECT * FROM `hotel` WHERE `HotelID` = '$hotelID'" ;
        $result = $conn -> query($sql) -> fetch() ;
        return $result ;
    }

    // Xóa khách sạn ;
    function deleteHotel($idHotel) {
        $conn = connectDB() ;
        $sql = "DELETE  FROM `hotel` WHERE `HotelID` IN ('$idHotel')" ;
        $result = $conn -> query($sql) ;
        echo '<script type="text/javascript">window.location.href = "?action=managerHotels";</script>';
    }

    // Cập nhật khách sạn kèm ảnh ;
    function updateHotel($name , $image , $address , $phone , $email , $status , $hotelID) {
        $conn = connectDB() ;
        $sql = "UPDATE `hotel` SET `NameHotel` = '$name' , `Image` = '$image' , `Address` = '$address' , `Phone` = '$phone' , `Email` = '$email' , `DisplayHotelID` = '$status' WHERE `HotelID` = '$hotelID'" ;
        $result = $conn -> query($sql) ;
        echo '<script type="text/javascript">window.location.href = "?action=managerHotels";</script>';
    }

    // Cập nhật khách sạn không kèm ảnh ;
    function updateHotelNoImage($name , $address , $phone , $email , $status , $hotelID) {
        $conn = connectDB() ;
        $sql = "UPDATE `hotel` SET `NameHotel` = '$name' , `Address` = '$address' , `Phone` = '$phone' , `Email` = '$email' , `DisplayHotelID` = '$status' WHERE `HotelID` = '$hotelID'" ;
        $result = $conn -> query($sql) ;
        echo '<script type="text/javascript">window.location.href = "?action=managerHotels";</script>';
    }

    // Cập nhật số lượt xem của khách sạn ;
    function updateViews($hotelID , $views) {
        $conn = connectDB() ;
        $sql = "UPDATE `hotel` SET `Views` = '$views' WHERE `HotelID` = '$hotelID'" ;
        $result = $conn -> query($sql) ;
    }

    // Lấy top 8 khách sạn có lượt views cao nhất ;
    function topViewsHotel() {
        $conn = connectDB() ;
        $sql = "SELECT `HotelID` , `Image` , `NameHotel` , `DisplayHotelID` FROM `hotel` WHERE `DisplayHotelID` = 1 ORDER BY `Views` DESC LIMIT 8" ;
        $result = $conn -> query($sql) -> fetchAll() ;
        return $result ;
    }

    // Tìm khách sạn ;
    function searchHotel($nameHotel , $checkIn , $checkOut , $quantity) {
        $conn = connectDB() ;
        $sql = "SELECT
            h.HotelID,
            h.NameHotel,
            h.Address ,
            h.DisplayHotelID,
            rm.RoomID,
            rm.RoomName,
            rm.Price,
            rm.Image ,
            rm.DisplayRoomID ,
            rt.RoomTypeName ,
            rt.DisplayRoomTypeID
        FROM
            hotel h
            JOIN room rm ON h.HotelID = rm.HotelID
            JOIN roomtype rt ON rt.RoomTypeID = rm.RoomTypeID
        WHERE
            rm.MaximumNumber >= $quantity
            AND '$checkIn' >= CURDATE() AND '$checkOut' >= '$checkIn'
            AND h.NameHotel LIKE '%$nameHotel%' 
            AND h.`DisplayHotelID` = 1
            AND rt.DisplayRoomTypeID = 1
            AND rm.DisplayRoomID = 1
            AND NOT EXISTS (
                SELECT 1
                FROM reservation res
                WHERE res.RoomID = rm.RoomID
                    AND (
                        '$checkIn' BETWEEN res.Check_In_Date AND res.Check_Out_Date
                        OR '$checkOut' BETWEEN res.Check_In_Date AND res.Check_Out_Date
                        OR res.Check_In_Date BETWEEN '$checkIn' AND '$checkOut'
                        OR res.Check_Out_Date BETWEEN '$checkIn' AND '$checkOut'
                    )
                    AND res.StatusID <> '3'
            )" ;
        $result = $conn -> query($sql) -> fetchAll() ;
        return $result ;
    }
?>