<?php
    // Thêm loại phòng
    function createRoomType($RoomTypeName , $Description) {
        $conn = connectDB() ;
        $sql = "INSERT INTO `roomtype` (`RoomTypeName` , `Description` , `DisplayRoomTypeID`) VALUES('$RoomTypeName' , '$Description' , 1)" ;
        $result = $conn -> query($sql) ;
        echo '<script type="text/javascript">window.location.href = "?action=managerTypeRoom";</script>';
    }

    // Lấy ra tất cả loại phòng trong trang admin ;
    function getRoomType() {
        $conn = connectDB() ;
        $sql = "SELECT * FROM `roomtype`" ;
        $result = $conn -> query($sql) -> fetchAll() ;
        return $result ;
    }

    // Lấy ra tất cả loại phòng có trường DisplayRoomTypeID = 1 (Đang hiển thị) đổ ra select box trong phần thêm phòng ;
    function getRoomTypeDisplay() {
        $conn = connectDB() ;
        $sql = "SELECT * FROM `roomtype` WHERE `DisplayRoomTypeID` = 1" ;
        $result = $conn -> query($sql) -> fetchAll() ;
        return $result ;
    }

    // Lấy loại phòng theo ID
    function getRoomTypeID($RoomTypeID) {
        $conn = connectDB() ;
        $sql = "SELECT * FROM `roomtype` WHERE `RoomTypeID` = '$RoomTypeID'" ;
        $result = $conn -> query($sql) -> fetch() ;
        return $result ;
    }

    // Xóa loại phòng
    function deleteRoomType($RoomTypeID) {
        $conn = connectDB() ;
        $sql = "DELETE FROM `roomtype` WHERE `RoomTypeID` IN ('$RoomTypeID')" ;
        $result = $conn -> query($sql) ;
        echo '<script type="text/javascript">window.location.href = "?action=managerTypeRoom";</script>';
    }

    // Update loại phòng
    function updateRoomType($name , $description , $status , $RoomTypeID) {
        $conn = connectDB() ;
        $sql = "UPDATE `roomtype` SET `RoomTypeName` = '$name' , `Description` = '$description' , `DisplayRoomTypeID` = '$status' WHERE `RoomTypeID` = '$RoomTypeID'" ;
        $result = $conn -> query($sql)  ;
        echo '<script type="text/javascript">window.location.href = "?action=managerTypeRoom";</script>';
    }
?>