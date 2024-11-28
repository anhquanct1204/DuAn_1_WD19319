<?php
    // Thêm thanh toán vào bảng thanh toán ;
    function createPay($ReservationID , $PayInfo) {
        $conn = connectDB() ;
        $sql = "INSERT INTO `pay` (`ReservationID` , `PayInfo`) VALUES('$ReservationID' , '$PayInfo')" ;
        $result = $conn -> query($sql) ;
        echo "<script>window.location.href = '?action=historyBookingRoom'</script>" ;
    }

    // Lấy danh sách thanh toán ;
    function getPays() {
        if(isset($_GET['pages'])) {
            $pages = $_GET['pages'] ;
        }else {
            $pages = 1 ;
        }
        $location = ($pages - 1) * 10 ;
        $conn = connectDB() ;
        $sql = "SELECT r.`TotalAmount` , u.`Email` , p.* FROM `pay` p
        JOIN `reservation` r ON r.`ReservationID` = p.`ReservationID`
        JOIN `user` u ON u.`UserID` = `r`.`UserID`
        LIMIT $location,10" ;
        $result = $conn -> query($sql) -> fetchAll() ;
        return $result ;
    }

    // Đếm số lượng thanh toán ;
    function CountPay() {
        $conn = connectDB() ;
        $sql = "SELECT COUNT(*) AS `CountPay` FROM `pay`";
        $result = $conn -> query($sql) -> fetch() ;
        return $result ;
    }
?>