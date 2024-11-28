<?php
    // Lấy ra tất cả các phòng ;
    function getRoom() {
        $conn = connectDB() ;
        $sql = "SELECT `hotel`.`NameHotel` , `roomtype`.`RoomTypeName` , `room`.* FROM `room` 
        JOIN `hotel` ON `hotel`.`HotelID` = `room`.`HotelID`
        JOIN `roomtype` ON `roomtype`.`RoomTypeID` = `room`.`RoomTypeID`" ;
        $result = $conn -> query($sql) -> fetchAll() ;
        return $result ;
    }

    // Lấy số lượng phòng  ;
    function getCountRoom() {
        $conn = connectDB() ;
        $sql = "SELECT COUNT(*) AS `CountRoom` FROM `room`" ; 
        $result = $conn -> query($sql) -> fetch() ;
        return $result ;
    }

    // Lấy ra tất cả các phòng trong trang admin ;
    function getRoomAdmin() {
        if(isset($_GET['pages'])) {
            $pages = $_GET['pages'] ;
        }else {
            $pages = 1 ;
        }
        $location = ($pages - 1) * 10 ;
        $conn = connectDB() ;
        $sql = "SELECT `hotel`.`NameHotel` , `roomtype`.`RoomTypeName` , `room`.* FROM `room` 
        JOIN `hotel` ON `hotel`.`HotelID` = `room`.`HotelID`
        JOIN `roomtype` ON `roomtype`.`RoomTypeID` = `room`.`RoomTypeID` LIMIT $location,10" ;
        $result = $conn -> query($sql) -> fetchAll() ;
        return $result ;
    }

    // Lấy danh sách phòng theo ID khách sạn ;
    function getRoomHotelID($HotelID) {
        $conn = connectDB() ;
        $sql = "SELECT `roomtype`.`RoomTypeName` , `roomtype`.`DisplayRoomTypeID` , `room`.* FROM `room`
        JOIN `roomtype` ON `roomtype`.`RoomTypeID` = `room`.`RoomTypeID`
        WHERE `HotelID` = '$HotelID' AND `room`.`DisplayRoomID` = 1 AND `roomtype`.`DisplayRoomTypeID` = 1" ;
        $result = $conn -> query($sql) -> fetchAll() ;
        return $result ;
    }
    
    // Lấy thông tin phòng theo ID của phòng ;
    function getRoomID($RoomID) {
        $conn = connectDB() ;
        $sql = "SELECT `hotel`.`NameHotel` , `roomtype`.`RoomTypeName` , `room`.* FROM `room` 
        JOIN `hotel` ON `hotel`.`HotelID` = `room`.`HotelID`
        JOIN `roomtype` ON `roomtype`.`RoomTypeID` = `room`.`RoomTypeID` WHERE `RoomID` = '$RoomID'" ;
        $result = $conn -> query($sql) -> fetch() ;
        return $result ;
    }

    // Thêm mới phòng ;
    function createRoom($HotelID , $RoomTypeID , $RoomName , $Max , $Des , $Image , $Price) {
        $conn = connectDB() ;
        $sql = "INSERT INTO `room` (`HotelID` , `RoomTypeID` , `RoomName` , `MaximumNumber` , `Description` , `Image` , `Price` , `DisplayRoomID`) VALUES('$HotelID' , '$RoomTypeID' , '$RoomName' , '$Max' , '$Des' , '$Image' , '$Price' , 1)" ;
        $result = $conn -> query($sql) ;
        echo '<script type="text/javascript">window.location.href = "?action=managerRoom";</script>';
    }

    // Xóa phòng; 
    function deleteRoom($RoomID) {
        $conn = connectDB() ;
        $sql = "DELETE FROM `room` WHERE `RoomID` IN ('$RoomID')" ;
        $result = $conn -> query($sql) ;
        echo '<script type="text/javascript">window.location.href = "?action=managerRoom";</script>';
    }
    
    // Cập nhật phòng có chỉnh sửa ảnh của phòng ;
    function updateRoom($RoomID , $HotelID , $RoomTypeID , $RoomName , $Max , $Des , $Image , $Price , $status) {
        $conn = connectDB() ;
        $sql = "UPDATE `room` SET `HotelID` = '$HotelID' , `RoomTypeID` = '$RoomTypeID' , `RoomName` = '$RoomName' , `MaximumNumber` = '$Max' , `Description` = '$Des' , `Image` = '$Image' , `Price` = '$Price' , `DisplayRoomID` = '$status' WHERE `RoomID` = '$RoomID'" ;
        $result = $conn -> query($sql) ;
        echo '<script type="text/javascript">window.location.href = "?action=managerRoom";</script>';
    }

    // Cập nhật ảnh phòng không chỉnh sửa ảnh của phòng ;
    function updateRoomNoImage($RoomID , $HotelID , $RoomTypeID , $RoomName , $Max , $Des , $Price , $status) {
        $conn = connectDB() ;
        $sql = "UPDATE `room` SET `HotelID` = '$HotelID' , `RoomTypeID` = '$RoomTypeID' , `RoomName` = '$RoomName' , `MaximumNumber` = '$Max' , `Description` = '$Des' , `Price` = '$Price' , `DisplayRoomID` = '$status'  WHERE `RoomID` = '$RoomID'" ;
        $result = $conn -> query($sql) ;
        echo '<script type="text/javascript">window.location.href = "?action=managerRoom";</script>';
    }

    // Lấy danh sách phòng cùng khách sạn ;
    function getRooms($HotelID , $RoomID) {
        $conn = connectDB() ;
        $sql = "SELECT `roomtype`.`RoomTypeName` , `roomtype`.`DisplayRoomTypeID` , `room`.* FROM `room`
        JOIN `roomtype` ON `roomtype`.`RoomTypeID` = `room`.`RoomTypeID`
        WHERE `HotelID` = '$HotelID' AND `room`.`RoomID` <> '$RoomID' AND `room`.`DisplayRoomID` = 1 AND `roomtype`.`DisplayRoomTypeID` = 1" ;
        $result = $conn -> query($sql) -> fetchAll() ;
        return $result ;
    }
?>