<?php
    // Kiểm tra trạng thái của các phòng thuộc trạng thái chưa thanh toán ;
    // Nếu sau khi đặt phòng 30 phút mà vẫn chưa thanh toán thì sẽ tự động cập nhật trang trạng thái đã hủy ;
    function updateBooking($ReservationID) {
        $conn = connectDB() ;
        $sql = "UPDATE `reservation` SET `StatusID` = '3' WHERE `ReservationID` = '$ReservationID'" ;
        $result = $conn -> query($sql) ;
    }

    function updateReservation() {
        date_default_timezone_set('Asia/Ho_Chi_Minh') ;
        // Lấy thời gian hiện tại
        $currentTime = new DateTime();
        // Danh sách các đơn đặt phòng chưa thanh toán ;
        $listBookings = getReservation() ;
        foreach($listBookings as $Bookings => $Booking) {
            // Lấy thời gian người dùng đặt phòng trong đơn đặt phòng ;
            $pastTime = new DateTime($Booking -> ReservationDate);

            // Tính khoảng thời gian giữa thời điểm hiện tại và thời điểm trong quá khứ
            $timeDifference = $currentTime->diff($pastTime);

            // Lấy tổng số phút chênh lệch (bao gồm cả phút và giờ)
            $totalMinutesDifference = $timeDifference->i + ($timeDifference->h * 60);
            if($totalMinutesDifference >= 30) {
                updateBooking($Booking -> ReservationID) ;
            }
        }
    }


    
    // Kiểm tra nếu đơn đặt phòng đã được thanh toán và thời gian hiện tại đã vượt qua ngày rời đi trong đơn đặt phòng thì cập nhật trạng thái sang đã hoàn thành ;
    
    function updateBookingStatus($ReservationID) {
        $conn = connectDB();
        $sql = "UPDATE `reservation` SET `StatusID` = '4' WHERE `ReservationID` = '$ReservationID'";
        $result = $conn->query($sql);
        // Kiểm tra và xử lý lỗi nếu cần
        if (!$result) {
            // Xử lý lỗi, ví dụ: echo $conn->error;
        }
    }

    function updateReservationStatus() {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        // Lấy thời gian hiện tại
        $currentDate = date('Y-m-d');

        $listBookings = getReservationStatus();
        if ($listBookings) {
            foreach ($listBookings as $Booking) {
                // Kiểm tra xem thuộc tính tồn tại trước khi sử dụng
                if (property_exists($Booking, 'Check_Out_Date')) {
                    $checkOutDate = date('Y-m-d', strtotime($Booking->Check_Out_Date));
                    if ($currentDate > $checkOutDate) {
                        updateBookingStatus($Booking->ReservationID);
                    }
                } 
            }
        } 
    }
?>