<?php
    // Quản lý trạng thái ;
    function getStatus() {
        $conn = connectDB() ;
        $sql = "SELECT * FROM `status`" ;
        $result = $conn -> query($sql) -> fetchAll() ;
        return $result ;
    }

    // Lấy thông tin trạng thái theo ID ;
    function getStatusID($statusID) {
        $conn = connectDB() ;
        $sql = "SELECT * FROM `status` WHERE `StatusID` = '$statusID'" ;
        $result = $conn -> query($sql) -> fetch() ;
        return $result ;
    }

    // Thêm trạng thái ;
    function createStatus($status) {
        $conn = connectDB() ;
        $sql = "INSERT INTO `status` (`NameStatus`) VALUES('$status')" ;
        $result = $conn -> query($sql) ;
        echo '<script type="text/javascript">window.location.href = "?action=managerStatus";</script>';
    }

    // Xóa trạng thái ;
    function deleteStatus($statusID) {
        $conn = connectDB() ;
        $sql = "DELETE FROM `status` WHERE `StatusID` IN ($statusID)" ;
        $result = $conn -> query($sql) ;
        echo '<script type="text/javascript">window.location.href = "?action=managerStatus";</script>';
    }

    // Cập nhật trạng thái ;
    function updateStatus($statusID , $nameStatus) {
        $conn = connectDB() ;
        $sql = "UPDATE `status` SET `NameStatus` = '$nameStatus' WHERE `StatusID` = '$statusID'" ;
        $result = $conn -> query($sql) ;
        echo '<script type="text/javascript">window.location.href = "?action=managerStatus";</script>';
    }
?>