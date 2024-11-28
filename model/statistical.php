<?php
// Kiểm tra xem yêu cầu thống kê rồi trả về câu lệnh truy vấn về số lượt đặt phòng phù hợp ;
function SQLQueryBookings($time)
{
    switch ($time) {
        case "day":
            return "SELECT h.NameHotel, r.StatusID , COUNT(r.ReservationID) AS total_rooms
                        FROM hotel h
                        LEFT JOIN room rm ON h.HotelID = rm.HotelID
                        LEFT JOIN reservation r ON rm.RoomID = r.RoomID
                        WHERE DATE(r.ReservationDate) = CURDATE() AND StatusID IN (2,4)
                        GROUP BY h.HotelID";
        case "week":
            return "SELECT h.NameHotel, r.StatusID , COUNT(r.ReservationID) AS total_rooms
                        FROM hotel h
                        LEFT JOIN room rm ON h.HotelID = rm.HotelID
                        LEFT JOIN reservation r ON rm.RoomID = r.RoomID
                        WHERE YEARWEEK(r.ReservationDate) = YEARWEEK(CURDATE()) AND StatusID IN (2,4)
                        GROUP BY h.HotelID";
        case "month":
            return "SELECT h.NameHotel , r.StatusID , COUNT(r.ReservationID) AS total_rooms
                        FROM hotel h
                        LEFT JOIN room rm ON h.HotelID = rm.HotelID
                        LEFT JOIN reservation r ON rm.RoomID = r.RoomID
                        WHERE MONTH(r.ReservationDate) = MONTH(CURDATE()) AND StatusID IN (2,4)
                        GROUP BY h.HotelID";
        case "year":
            return "SELECT h.NameHotel, r.StatusID , COUNT(r.ReservationID) AS total_rooms
                        FROM hotel h
                        LEFT JOIN room rm ON h.HotelID = rm.HotelID
                        LEFT JOIN reservation r ON rm.RoomID = r.RoomID
                        WHERE YEAR(r.ReservationDate) = YEAR(CURDATE()) AND StatusID IN (2,4)
                        GROUP BY h.HotelID";
        default:
            return "";
    }
}

// Kiểm tra xem yêu cầu thống kê rồi trả về câu lệnh truy vấn về doanh thu phù hợp ;
function RevenueSQLQuery($time)
{
    switch ($time) {
        case "day":
            return "SELECT h.NameHotel, r.StatusID , SUM(r.TotalAmount) AS total_revenue
                        FROM hotel h
                        LEFT JOIN room rm ON h.HotelID = rm.HotelID
                        LEFT JOIN reservation r ON rm.RoomID = r.RoomID
                        WHERE DATE(r.ReservationDate) = CURDATE() AND StatusID IN (2,4)
                        GROUP BY h.HotelID";
        case "week":
            return "SELECT h.NameHotel, r.StatusID , SUM(r.TotalAmount) AS total_revenue
                        FROM hotel h
                        LEFT JOIN room rm ON h.HotelID = rm.HotelID
                        LEFT JOIN reservation r ON rm.RoomID = r.RoomID
                        WHERE YEARWEEK(r.ReservationDate) = YEARWEEK(CURDATE()) AND StatusID IN (2,4)
                        GROUP BY h.HotelID";
        case "month":
            return "SELECT h.NameHotel, r.StatusID , SUM(r.TotalAmount) AS total_revenue
                        FROM hotel h JOIN room rm ON h.HotelID = rm.HotelID
                        LEFT JOIN reservation r ON rm.RoomID = r.RoomID
                        WHERE MONTH(r.ReservationDate) = MONTH(CURDATE()) AND StatusID IN (2,4)
                        GROUP BY h.HotelID";
        case "year":
            return "SELECT h.NameHotel, r.StatusID , SUM(r.TotalAmount) AS total_revenue
                        FROM hotel h
                        LEFT JOIN room rm ON h.HotelID = rm.HotelID
                        LEFT JOIN reservation r ON rm.RoomID = r.RoomID
                        WHERE YEAR(r.ReservationDate) = YEAR(CURDATE()) AND StatusID IN (2,4)
                        GROUP BY h.HotelID";
        default:
            return "";
    }
}


// Hàm thực hiện thống kê theo số lượng đặt phòng hoặc doanh thu của mỗi khách sạn ;
function ReservationHotel($sqlQuery)
{
    $conn = connectDB();
    $sql = "$sqlQuery";
    $result = $conn->query($sql)->fetchAll();
    return $result;
}
