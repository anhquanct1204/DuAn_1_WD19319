-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th12 03, 2024 lúc 06:33 AM
-- Phiên bản máy phục vụ: 8.0.30
-- Phiên bản PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `project`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hotel`
--

CREATE TABLE `hotel` (
  `HotelID` int NOT NULL,
  `NameHotel` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `Image` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `Address` varchar(400) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `Phone` varchar(40) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `Email` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `Views` int DEFAULT NULL,
  `DisplayHotelID` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hotel`
--

INSERT INTO `hotel` (`HotelID`, `NameHotel`, `Image`, `Address`, `Phone`, `Email`, `Views`, `DisplayHotelID`) VALUES
(49, 'MELIA HỒ TRÀM', './image_hotel/1.6.jpg,./image_hotel/2.3.jpg,./image_hotel/2.4.jpg,./image_hotel/2.5.jpg,./image_hotel/2.6.jpg,./image_hotel/2.7.jpg', 'Hồ Tràm,Xã Phước Thuận,Huyện Xuyên Mộc,Tỉnh Bà Rịa - Vũng Tàu', '0332768671', 'anhquanct1204@gmail.com', 52, 1),
(50, 'MIKAZUKI RESORT ĐÀ NẴNG', './image_hotel/2.7.jpg,./image_hotel/2.6.jpg,./image_hotel/2.5.jpg,./image_hotel/2.4.jpg,./image_hotel/2.3.jpg,./image_hotel/2.2.jpg,./image_hotel/2.1.jpg', 'Khu du lịch Xuân Thiều,Phường Hòa Hiệp Nam,Quận Liên Chiểu,Thành phố Đà Nẵng', '0332768671', 'anhquanct1204@gmail.com', 19, 1),
(51, 'MERCURE VŨNG TÀU', './image_hotel/3.8.jpg,./image_hotel/3.7.jpg,./image_hotel/3.6.jpg,./image_hotel/3.5.jpg,./image_hotel/3.4.jpg,./image_hotel/3.3.jpg,./image_hotel/3.2.jpg,./image_hotel/3.1.jpg', 'Hồ Tràm,Xã Phước Thuận,Huyện Xuyên Mộc,Tỉnh Bà Rịa - Vũng Tàu', '0332768671', 'anhquanct1204@gmail.com', 92, 1),
(52, 'IXORA HỒ TRÀM BY FUSION', './image_hotel/4.6.jpg,./image_hotel/4.5.jpg,./image_hotel/4.4.jpg,./image_hotel/4.3.jpg,./image_hotel/4.2.jpg,./image_hotel/4.1.jpg', 'Hồ Tràm,Xã Phước Thuận,Huyện Xuyên Mộc,Tỉnh Bà Rịa - Vũng Tàu', '0332768671', 'anhquanct1204@gmail.com', 23, 1),
(53, 'CENTARA MŨI NÉ', './image_hotel/5.8.jpg,./image_hotel/5.7.jpg,./image_hotel/5.6.jpg,./image_hotel/5.5.jpg,./image_hotel/5.4.jpg,./image_hotel/5.3.jpg', 'Huỳnh Thúc Kháng,Phường Hàm Tiến,Thành phố Phan Thiết,Tỉnh Bình Thuận', '0332768671', 'anhquanct1204@gmail.com', 9, 1),
(54, 'DE LA COUPOLE SAPA', './image_hotel/6.6.jpg,./image_hotel/6.5.jpg,./image_hotel/6.4.jpg,./image_hotel/6.3.jpg,./image_hotel/6.2.jpg,./image_hotel/6.1.jpg', 'Đường 1,Phường Sa Pa,Thị xã Sa Pa,Tỉnh Lào Cai', '0332768671', 'anhquanct1204@gmail.com', 31, 1),
(55, 'LADY HILL SAPA RESORT', './image_hotel/7.6.jpg,./image_hotel/7.5.jpg,./image_hotel/7.4.jpg,./image_hotel/7.3.jpg,./image_hotel/7.2.jpg,./image_hotel/7.1.jpg', 'Tổ 4 , đường Nguyễn Chí Thanh,Phường Phan Si Păng,Thị xã Sa Pa,Tỉnh Lào Cai', '0332768671', 'anhquanct1204@gmail.com', 1, 1),
(56, 'AMANOI NINH THUẬN', './image_hotel/8.7.jpg,./image_hotel/8.6.jpg,./image_hotel/8.5.jpg,./image_hotel/8.4.jpg,./image_hotel/8.3.jpg,./image_hotel/8.2.jpg,./image_hotel/8.1.jpg', 'Thôn Vinh Hy,Xã Vĩnh Hải,Huyện Ninh Hải,Tỉnh Ninh Thuận', '0332768671', 'anhquanct1204@gmail.com', 25, 1),
(57, 'TERRACOTTA ĐÀ LẠT', './image_hotel/9.6.jpg,./image_hotel/9.5.jpg,./image_hotel/9.4.jpg,./image_hotel/9.3.jpg,./image_hotel/9.2.jpg,./image_hotel/9.1.jpg', 'Khu du lịch Tuyền Lâm, Phường 3, Đà Lạt,Phường 3,Thành phố Đà Lạt,Tỉnh Lâm Đồng', '0332768671', 'anhquanct1204@gmail.com', 8, 1),
(58, 'MAIA RESORT QUY NHƠN', './image_hotel/10.6.jpg,./image_hotel/10.5.jpg,./image_hotel/10.4.jpg,./image_hotel/10.3.jpg,./image_hotel/10.2.jpg,./image_hotel/10.1.jpg', 'Khu kinh tế Nhơn Hội,Thị trấn Cát Tiến,Huyện Phù Cát,Tỉnh Bình Định', '0332768671', 'anhquanct1204@gmail.com', 15, 1),
(59, 'KHÁCH SẠN MƯỜNG THANH - VINH', './image_hotel/11.6.jpeg,./image_hotel/11.5.jpeg,./image_hotel/11.4.jpeg,./image_hotel/11.3.jpg,./image_hotel/11.2.jpeg,./image_hotel/11.1.jpeg', '02 Đường Trường Thi,Phường Trường Thi,Thành phố Vinh,Tỉnh Nghệ An', '0332768671', 'anhquanct1204@gmail.com', 1, 1),
(60, 'KHÁCH SẠN SOLEIL BOUTIQUE HÀ NỘI', './image_hotel/12.6.jpg,./image_hotel/12.5.jpg,./image_hotel/12.4.jpg,./image_hotel/12.3.jpg,./image_hotel/12.2.jpg,./image_hotel/12.1.jpg', '221,Phường Hàng Bông,Quận Hoàn Kiếm,Thành phố Hà Nội', '0332768671', 'anhquanct1204@gmail.com', 1, 1),
(61, 'KHÁCH SẠN MƯỜNG THANH HÀ NỘI ', './image_hotel/13.5.jpeg,./image_hotel/13.4.jpeg,./image_hotel/13.3.jpeg,./image_hotel/13.2.jpeg,./image_hotel/13.1.jpeg', '78 Thợ Nhuộm,Phường Trần Hưng Đạo,Quận Hoàn Kiếm,Thành phố Hà Nội', '0332768671', 'anhquanct1204@gmail.com', 1, 1),
(62, 'KHÁCH SẠN SEN GRAND HÀ NỘI', './image_hotel/14.5.jpg,./image_hotel/14.4.jpg,./image_hotel/14.3.jpg,./image_hotel/14.2.jpg,./image_hotel/14.1.jpg', '20/118 Nguyễn Khánh Toàn,Phường Trung Hoà,Quận Cầu Giấy,Thành phố Hà Nội', '0332768671', 'anhquanct1204@gmail.com', 1, 1),
(63, 'KHÁCH SẠN EQUATORIAL HỒ CHÍ MINH', './image_hotel/15.5.jpg,./image_hotel/15.4.jpg,./image_hotel/15.3.jpg,./image_hotel/15.2.jpg,./image_hotel/15.1.jpg', 'Trần Bình Trọng,Phường 04,Quận 5,Thành phố Hồ Chí Minh', '0332768671', 'anhquanct1204@gmail.com', 12, 1),
(64, 'KHÁCH SẠN MÀU TÍM HỒ CHÍ MINH', './image_hotel/16.5.jpg,./image_hotel/16.4.jpg,./image_hotel/16.3.jpg,./image_hotel/16.2.jpg,./image_hotel/16.1.jpg', '847 Hà Huy Giáp,Phường Thạnh Xuân,Quận 12,Thành phố Hồ Chí Minh', '0332768671', 'anhquanct1204@gmail.com', 3, 1),
(67, 'Mường Thanh VIP Tầng 4', './image_hotel/1.1.jpg,./image_hotel/1.2.jpg,./image_hotel/1.4.jpg,./image_hotel/1.7.jpg,./image_hotel/1.8.jpg,./image_hotel/1.9.jpg', 'số 61,Phường Quỳnh Thiện,Thị xã Hoàng Mai,Tỉnh Nghệ An', '0865458705', 'anhquanct1204@gmail.com', 18, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pay`
--

CREATE TABLE `pay` (
  `PayID` int NOT NULL,
  `ReservationID` int NOT NULL,
  `PayInfo` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `pay`
--

INSERT INTO `pay` (`PayID`, `ReservationID`, `PayInfo`) VALUES
(38, 93, 'Thanh toán qua ATM MoMo'),
(39, 95, 'Thanh toán qua ATM MoMo');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `reservation`
--

CREATE TABLE `reservation` (
  `ReservationID` int NOT NULL,
  `UserID` int NOT NULL,
  `RoomID` int NOT NULL,
  `ReservationDate` datetime NOT NULL,
  `Check_In_Date` date NOT NULL,
  `Check_Out_Date` date NOT NULL,
  `Price` int NOT NULL,
  `TotalAmount` int NOT NULL,
  `StatusID` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `reservation`
--

INSERT INTO `reservation` (`ReservationID`, `UserID`, `RoomID`, `ReservationDate`, `Check_In_Date`, `Check_Out_Date`, `Price`, `TotalAmount`, `StatusID`) VALUES
(80, 34, 27, '2024-11-20 22:37:52', '2024-11-20', '2024-11-23', 500000, 1500000, 3),
(81, 35, 51, '2024-11-23 15:00:22', '2024-11-23', '2024-11-26', 1000000, 3000000, 3),
(83, 34, 82, '2024-11-27 21:32:05', '2024-11-27', '2024-11-29', 600000, 1200000, 3),
(84, 34, 82, '2024-11-28 15:07:34', '2024-11-28', '2024-11-30', 600000, 1200000, 3),
(85, 34, 30, '2024-11-28 15:50:24', '2024-11-28', '2024-11-30', 1000000, 2000000, 3),
(86, 34, 54, '2024-11-28 15:54:05', '2024-11-28', '2024-11-30', 550000, 1100000, 3),
(87, 34, 27, '2024-11-28 16:00:26', '2024-11-28', '2024-11-30', 500000, 1000000, 3),
(88, 36, 51, '2024-11-28 16:02:45', '2024-11-28', '2024-11-30', 1000000, 2000000, 3),
(89, 34, 82, '2024-11-28 16:28:43', '2024-11-28', '2024-11-30', 600000, 1200000, 3),
(90, 34, 53, '2024-11-28 16:41:43', '2024-11-28', '2024-11-30', 750000, 1500000, 3),
(91, 34, 82, '2024-11-29 11:59:09', '2024-11-29', '2024-12-01', 600000, 1200000, 3),
(92, 34, 33, '2024-11-29 12:03:30', '2024-11-29', '2024-12-01', 1000000, 2000000, 3),
(93, 34, 82, '2024-12-02 20:23:50', '2024-12-02', '2024-12-04', 600000, 1200000, 2),
(94, 34, 51, '2024-12-02 21:14:49', '2024-12-02', '2024-12-05', 1000000, 3000000, 3),
(95, 34, 51, '2024-12-03 10:26:04', '2024-12-03', '2024-12-05', 1000000, 2000000, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `review`
--

CREATE TABLE `review` (
  `ReviewID` int NOT NULL,
  `ReservationID` int NOT NULL,
  `Rating` int NOT NULL,
  `Comment` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `RatingDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role`
--

CREATE TABLE `role` (
  `RoleID` int NOT NULL,
  `Role` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `role`
--

INSERT INTO `role` (`RoleID`, `Role`) VALUES
(1, 'Quản lý'),
(2, 'Khách hàng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `room`
--

CREATE TABLE `room` (
  `RoomID` int NOT NULL,
  `HotelID` int NOT NULL,
  `RoomTypeID` int NOT NULL,
  `RoomName` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `MaximumNumber` int NOT NULL,
  `Description` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `Image` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `Price` int NOT NULL,
  `DisplayRoomID` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `room`
--

INSERT INTO `room` (`RoomID`, `HotelID`, `RoomTypeID`, `RoomName`, `MaximumNumber`, `Description`, `Image`, `Price`, `DisplayRoomID`) VALUES
(27, 49, 23, 'Phòng Tiêu Chuẩn 3 Sao', 2, 'Phòng tiêu chuẩn là không gian lý tưởng cho những du khách mong muốn sự thoải mái và tiện nghi cơ bản trong kỳ nghỉ của mình. Với diện tích rộng rãi, phòng này được trang bị một giường thoải mái, truyền hình cáp màn hình phẳng, và khu vực làm việc thuận tiện. Khách có thể tận hưởng không gian phòng tắm sang trọng với bồn tắm hoặc vòi sen, cùng các sản phẩm chăm sóc cá nhân chất lượng cao. Đối với những du khách kết nối công việc, khu vực làm việc được thiết kế thoải mái với bàn làm việc và Wi-Fi miễn phí. Phòng tiêu chuẩn mang đến sự thuận tiện và ấm áp, tạo nên một không gian nghỉ ngơi hoàn hảo sau những ngày dạo chơi hoặc công tác.', './image_room/1.5.jpg,./image_room/1.4.jpg,./image_room/1.3.jpg', 500000, 1),
(30, 49, 25, 'Phòng Panorama', 3, 'Phòng Góc là một hòn ngọc hiếm có trong danh sách lưu trú, nơi du khách có thể trải nghiệm sự độc đáo và sang trọng. Với thiết kế độc đáo, phòng này tận dụng tối đa ánh sáng tự nhiên qua những cửa sổ lớn, tạo ra không gian rộng lớn và tươi sáng. Giường ngủ thoải mái tọa lạc ở một góc phòng, tạo nên không gian riêng tư và thoải mái. Khu vực làm việc được bố trí sáng tạo, cung cấp không gian tốt nhất để sáng tạo và nghỉ ngơi. Phòng tắm sang trọng với bồn tắm hoặc vòi sen, cùng các sản phẩm chăm sóc cá nhân cao cấp, đảm bảo một trải nghiệm nghỉ ngơi đẳng cấp. Phòng Góc không chỉ là nơi lưu trú mà còn là điểm nhấn nổi bật trong hành trình khám phá của du khách.', './image_room/15.2.jpg,./image_room/15.1.jpg,./image_room/14.5.jpg', 1000000, 1),
(31, 49, 26, 'Phòng Biển Đêm', 3, '\r\nPhòng View là điểm đến lý tưởng cho những du khách thưởng thức vẻ đẹp ngoại ô hoặc thành phố. Với cửa sổ lớn, phòng này mang đến tầm nhìn tuyệt vời và làm nổi bật không gian nghỉ của bạn. Giường ngủ thoải mái được đặt ở vị trí chiến lược để bạn có thể thức dậy với khung cảnh tuyệt vời. Khu vực làm việc được bố trí để bạn có thể làm việc hoặc thư giãn với tầm nhìn đẹp. Phòng tắm với cửa sổ lớn, bồn tắm hoặc vòi sen, tạo điểm nhấn cho trải nghiệm tắm thêm phần thú vị', './image_room/14.5.jpg,./image_room/14.4.jpg,./image_room/14.3.jpg', 2000000, 1),
(32, 49, 27, 'Góc Hạnh Phúc Gia Đình', 6, 'Phòng Gia Đình là sự kết hợp hoàn hảo giữa thoải mái và tiện ích để tạo nên không gian ấm cúng cho cả gia đình. Với không gian rộng rãi và thiết kế thông minh, phòng này mang đến cảm giác như ở nhà, đồng thời đảm bảo đủ tiện nghi để tất cả mọi người cảm thấy thoải mái. Phòng có thể bao gồm một phòng ngủ chính và một phòng ngủ phụ hoặc không gian dành riêng cho trẻ em, giúp tạo ra không gian riêng tư và linh hoạt cho gia đình.', './image_room/11.3.jpg,./image_room/11.2.jpeg,./image_room/11.1.jpeg', 4500000, 1),
(33, 50, 23, 'Phòng Tiêu Chuẩn 2 Người', 2, 'Phòng tiêu chuẩn là không gian lý tưởng cho những du khách mong muốn sự thoải mái và tiện nghi cơ bản trong kỳ nghỉ của mình. Với diện tích rộng rãi, phòng này được trang bị một giường thoải mái, truyền hình cáp màn hình phẳng, và khu vực làm việc thuận tiện. Khách có thể tận hưởng không gian phòng tắm sang trọng với bồn tắm hoặc vòi sen, cùng các sản phẩm chăm sóc cá nhân chất lượng cao. Đối với những du khách kết nối công việc, khu vực làm việc được thiết kế thoải mái với bàn làm việc và Wi-Fi miễn phí. Phòng tiêu chuẩn mang đến sự thuận tiện và ấm áp, tạo nên một không gian nghỉ ngơi hoàn hảo sau những ngày dạo chơi hoặc công tác.', './image_room/14.4.jpg,./image_room/14.3.jpg,./image_room/14.2.jpg', 1000000, 1),
(35, 50, 25, 'Góc Panorama', 2, 'Phòng Góc là một hòn ngọc hiếm có trong danh sách lưu trú, nơi du khách có thể trải nghiệm sự độc đáo và sang trọng. Với thiết kế độc đáo, phòng này tận dụng tối đa ánh sáng tự nhiên qua những cửa sổ lớn, tạo ra không gian rộng lớn và tươi sáng. Giường ngủ thoải mái tọa lạc ở một góc phòng, tạo nên không gian riêng tư và thoải mái. Khu vực làm việc được bố trí sáng tạo, cung cấp không gian tốt nhất để sáng tạo và nghỉ ngơi. Phòng tắm sang trọng với bồn tắm hoặc vòi sen, cùng các sản phẩm chăm sóc cá nhân cao cấp, đảm bảo một trải nghiệm nghỉ ngơi đẳng cấp. Phòng Góc không chỉ là nơi lưu trú mà còn là điểm nhấn nổi bật trong hành trình khám phá của du khách.', './image_room/10.6.jpg,./image_room/10.5.jpg,./image_room/10.4.jpg', 1500000, 1),
(36, 50, 27, 'Suite Thành Phố Phồn Thịnh', 4, 'Phòng Gia Đình là sự kết hợp hoàn hảo giữa thoải mái và tiện ích để tạo nên không gian ấm cúng cho cả gia đình. Với không gian rộng rãi và thiết kế thông minh, phòng này mang đến cảm giác như ở nhà, đồng thời đảm bảo đủ tiện nghi để tất cả mọi người cảm thấy thoải mái. Phòng có thể bao gồm một phòng ngủ chính và một phòng ngủ phụ hoặc không gian dành riêng cho trẻ em, giúp tạo ra không gian riêng tư và linh hoạt cho gia đình.', './image_room/8.6.jpg,./image_room/8.5.jpg,./image_room/8.4.jpg', 5000000, 1),
(37, 51, 23, 'Double Room ', 2, 'Phòng tiêu chuẩn là không gian lý tưởng cho những du khách mong muốn sự thoải mái và tiện nghi cơ bản trong kỳ nghỉ của mình. Với diện tích rộng rãi, phòng này được trang bị một giường thoải mái, truyền hình cáp màn hình phẳng, và khu vực làm việc thuận tiện. Khách có thể tận hưởng không gian phòng tắm sang trọng với bồn tắm hoặc vòi sen, cùng các sản phẩm chăm sóc cá nhân chất lượng cao. Đối với những du khách kết nối công việc, khu vực làm việc được thiết kế thoải mái với bàn làm việc và Wi-Fi miễn phí. Phòng tiêu chuẩn mang đến sự thuận tiện và ấm áp, tạo nên một không gian nghỉ ngơi hoàn hảo sau những ngày dạo chơi hoặc công tác.', './image_room/14.3.jpg,./image_room/14.2.jpg,./image_room/14.1.jpg', 750000, 2),
(41, 59, 23, 'Phòng Tiêu Chuẩn Mường Thanh', 2, 'Phòng Tiêu Chuẩn là sự kết hợp tuyệt vời giữa sự thoải mái và tiện ích cơ bản, mang đến cho du khách một không gian ấm cúng và thuận tiện trong kỳ nghỉ của họ. Với diện tích rộng rãi, phòng này có một giường thoải mái, trang thiết bị giải trí màn hình phẳng và một khu vực làm việc tiện lợi. Phòng tắm thoải mái với bồn tắm hoặc vòi sen, cùng với các sản phẩm chăm sóc cá nhân cơ bản, tạo điểm nhấn cho trải nghiệm nghỉ ngơi.', './image_room/7.6.jpg,./image_room/7.5.jpg,./image_room/7.4.jpg', 500000, 1),
(42, 61, 27, 'Phòng Grand Gia Đình', 5, 'Phòng Gia Đình là sự kết hợp hoàn hảo giữa thoải mái và tiện ích để tạo nên không gian ấm cúng cho cả gia đình. Với không gian rộng rãi và thiết kế thông minh, phòng này mang đến cảm giác như ở nhà, đồng thời đảm bảo đủ tiện nghi để tất cả mọi người cảm thấy thoải mái. Phòng có thể bao gồm một phòng ngủ chính và một phòng ngủ phụ hoặc không gian dành riêng cho trẻ em, giúp tạo ra không gian riêng tư và linh hoạt cho gia đình.', './image_room/11.2.jpeg,./image_room/11.1.jpeg,./image_room/10.6.jpg', 5500000, 1),
(44, 64, 23, 'Phòng Tiêu Chuẩn Tím', 2, 'Phòng Tiêu Chuẩn là sự kết hợp tuyệt vời giữa sự thoải mái và tiện ích cơ bản, mang đến cho du khách một không gian ấm cúng và thuận tiện trong kỳ nghỉ của họ. Với diện tích rộng rãi, phòng này có một giường thoải mái, trang thiết bị giải trí màn hình phẳng và một khu vực làm việc tiện lợi. Phòng tắm thoải mái với bồn tắm hoặc vòi sen, cùng với các sản phẩm chăm sóc cá nhân cơ bản, tạo điểm nhấn cho trải nghiệm nghỉ ngơi.', './image_room/12.2.jpg,./image_room/12.1.jpg,./image_room/11.6.jpeg', 1000000, 1),
(45, 64, 27, 'Tím Family', 5, 'Phòng Gia Đình là sự kết hợp hoàn hảo giữa thoải mái và tiện ích để tạo nên không gian ấm cúng cho cả gia đình. Với không gian rộng rãi và thiết kế thông minh, phòng này mang đến cảm giác như ở nhà, đồng thời đảm bảo đủ tiện nghi để tất cả mọi người cảm thấy thoải mái. Phòng có thể bao gồm một phòng ngủ chính và một phòng ngủ phụ hoặc không gian dành riêng cho trẻ em, giúp tạo ra không gian riêng tư và linh hoạt cho gia đình.', './image_room/11.2.jpeg,./image_room/11.1.jpeg,./image_room/10.6.jpg', 6000000, 1),
(46, 62, 25, 'Phòng Góc Grand Hà Nội', 2, 'Phòng Góc là một hòn ngọc hiếm có trong danh sách lưu trú, nơi du khách có thể trải nghiệm sự độc đáo và sang trọng. Với thiết kế độc đáo, phòng này tận dụng tối đa ánh sáng tự nhiên qua những cửa sổ lớn, tạo ra không gian rộng lớn và tươi sáng. Giường ngủ thoải mái tọa lạc ở một góc phòng, tạo nên không gian riêng tư và thoải mái. Khu vực làm việc được bố trí sáng tạo, cung cấp không gian tốt nhất để sáng tạo và nghỉ ngơi. Phòng tắm sang trọng với bồn tắm hoặc vòi sen, cùng các sản phẩm chăm sóc cá nhân cao cấp, đảm bảo một trải nghiệm nghỉ ngơi đẳng cấp. Phòng Góc không chỉ là nơi lưu trú mà còn là điểm nhấn nổi bật trong hành trình khám phá của du khách.', './image_room/16.4.jpg,./image_room/16.3.jpg,./image_room/16.2.jpg', 2500000, 1),
(47, 63, 26, 'Equatorial Hồ Chí Minh', 3, 'Phòng View là điểm đến lý tưởng cho những du khách thưởng thức vẻ đẹp ngoại ô hoặc thành phố. Với cửa sổ lớn, phòng này mang đến tầm nhìn tuyệt vời và làm nổi bật không gian nghỉ của bạn. Giường ngủ thoải mái được đặt ở vị trí chiến lược để bạn có thể thức dậy với khung cảnh tuyệt vời. Khu vực làm việc được bố trí để bạn có thể làm việc hoặc thư giãn với tầm nhìn đẹp. Phòng tắm với cửa sổ lớn, bồn tắm hoặc vòi sen, tạo điểm nhấn cho trải nghiệm tắm thêm phần thú vị.', './image_room/15.5.jpg,./image_room/15.4.jpg,./image_room/15.3.jpg', 1500000, 1),
(48, 58, 27, 'Maia Family', 6, 'Phòng Gia Đình là sự kết hợp hoàn hảo giữa thoải mái và tiện ích để tạo nên không gian ấm cúng cho cả gia đình. Với không gian rộng rãi và thiết kế thông minh, phòng này mang đến cảm giác như ở nhà, đồng thời đảm bảo đủ tiện nghi để tất cả mọi người cảm thấy thoải mái. Phòng có thể bao gồm một phòng ngủ chính và một phòng ngủ phụ hoặc không gian dành riêng cho trẻ em, giúp tạo ra không gian riêng tư và linh hoạt cho gia đình.', './image_room/12.3.jpg,./image_room/12.2.jpg,./image_room/12.1.jpg', 4500000, 1),
(49, 59, 23, 'Phòng Cơ Bản ', 1, 'Phòng Tiêu Chuẩn là sự kết hợp tuyệt vời giữa sự thoải mái và tiện ích cơ bản, mang đến cho du khách một không gian ấm cúng và thuận tiện trong kỳ nghỉ của họ. Với diện tích rộng rãi, phòng này có một giường thoải mái, trang thiết bị giải trí màn hình phẳng và một khu vực làm việc tiện lợi. Phòng tắm thoải mái với bồn tắm hoặc vòi sen, cùng với các sản phẩm chăm sóc cá nhân cơ bản, tạo điểm nhấn cho trải nghiệm nghỉ ngơi.', './image_room/10.2.jpg,./image_room/10.1.jpg,./image_room/9.6.jpg', 750000, 1),
(51, 54, 25, 'De La View Góc', 2, 'Phòng Góc là một hòn ngọc hiếm có trong danh sách lưu trú, nơi du khách có thể trải nghiệm sự độc đáo và sang trọng. Với thiết kế độc đáo, phòng này tận dụng tối đa ánh sáng tự nhiên qua những cửa sổ lớn, tạo ra không gian rộng lớn và tươi sáng. Giường ngủ thoải mái tọa lạc ở một góc phòng, tạo nên không gian riêng tư và thoải mái. Khu vực làm việc được bố trí sáng tạo, cung cấp không gian tốt nhất để sáng tạo và nghỉ ngơi. Phòng tắm sang trọng với bồn tắm hoặc vòi sen, cùng các sản phẩm chăm sóc cá nhân cao cấp, đảm bảo một trải nghiệm nghỉ ngơi đẳng cấp. Phòng Góc không chỉ là nơi lưu trú mà còn là điểm nhấn nổi bật trong hành trình khám phá của du khách.', './image_room/14.1.jpg,./image_room/13.5.jpeg,./image_room/13.4.jpeg', 1000000, 1),
(52, 56, 27, 'Amanoi Family', 6, 'Phòng Gia Đình là sự kết hợp hoàn hảo giữa thoải mái và tiện ích để tạo nên không gian ấm cúng cho cả gia đình. Với không gian rộng rãi và thiết kế thông minh, phòng này mang đến cảm giác như ở nhà, đồng thời đảm bảo đủ tiện nghi để tất cả mọi người cảm thấy thoải mái. Phòng có thể bao gồm một phòng ngủ chính và một phòng ngủ phụ hoặc không gian dành riêng cho trẻ em, giúp tạo ra không gian riêng tư và linh hoạt cho gia đình.', './image_room/13.2.jpeg,./image_room/13.1.jpeg,./image_room/12.6.jpg', 3500000, 0),
(53, 58, 23, 'Maia Quy Nhơn', 3, 'Phòng Tiêu Chuẩn là sự kết hợp tuyệt vời giữa sự thoải mái và tiện ích cơ bản, mang đến cho du khách một không gian ấm cúng và thuận tiện trong kỳ nghỉ của họ. Với diện tích rộng rãi, phòng này có một giường thoải mái, trang thiết bị giải trí màn hình phẳng và một khu vực làm việc tiện lợi. Phòng tắm thoải mái với bồn tắm hoặc vòi sen, cùng với các sản phẩm chăm sóc cá nhân cơ bản, tạo điểm nhấn cho trải nghiệm nghỉ ngơi.', './image_room/11.6.jpeg,./image_room/11.5.jpeg,./image_room/11.4.jpeg', 750000, 1),
(54, 56, 23, 'Phòng Tiêu Chuẩn Chất Lượng Cao', 2, 'Phòng Tiêu Chuẩn là sự kết hợp tuyệt vời giữa sự thoải mái và tiện ích cơ bản, mang đến cho du khách một không gian ấm cúng và thuận tiện trong kỳ nghỉ của họ. Với diện tích rộng rãi, phòng này có một giường thoải mái, trang thiết bị giải trí màn hình phẳng và một khu vực làm việc tiện lợi. Phòng tắm thoải mái với bồn tắm hoặc vòi sen, cùng với các sản phẩm chăm sóc cá nhân cơ bản, tạo điểm nhấn cho trải nghiệm nghỉ ngơi.', './image_room/9.2.jpg,./image_room/9.1.jpg,./image_room/8.7.jpg', 550000, 1),
(56, 58, 23, 'Maia Room 2', 2, 'Phòng Tiêu Chuẩn là sự kết hợp tuyệt vời giữa sự thoải mái và tiện ích cơ bản, mang đến cho du khách một không gian ấm cúng và thuận tiện trong kỳ nghỉ của họ. Với diện tích rộng rãi, phòng này có một giường thoải mái, trang thiết bị giải trí màn hình phẳng và một khu vực làm việc tiện lợi. Phòng tắm thoải mái với bồn tắm hoặc vòi sen, cùng với các sản phẩm chăm sóc cá nhân cơ bản, tạo điểm nhấn cho trải nghiệm nghỉ ngơi.', './image_room/14.1.jpg,./image_room/13.5.jpeg,./image_room/13.4.jpeg', 750000, 1),
(59, 56, 25, 'Phòng Góc Amanoi View Biển', 2, 'Phòng Góc là một hòn ngọc hiếm có trong danh sách lưu trú, nơi du khách có thể trải nghiệm sự độc đáo và sang trọng. Với thiết kế độc đáo, phòng này tận dụng tối đa ánh sáng tự nhiên qua những cửa sổ lớn, tạo ra không gian rộng lớn và tươi sáng. Giường ngủ thoải mái tọa lạc ở một góc phòng, tạo nên không gian riêng tư và thoải mái. Khu vực làm việc được bố trí sáng tạo, cung cấp không gian tốt nhất để sáng tạo và nghỉ ngơi. Phòng tắm sang trọng với bồn tắm hoặc vòi sen, cùng các sản phẩm chăm sóc cá nhân cao cấp, đảm bảo một trải nghiệm nghỉ ngơi đẳng cấp. Phòng Góc không chỉ là nơi lưu trú mà còn là điểm nhấn nổi bật trong hành trình khám phá của du khách.', './image_room/15.4.jpg,./image_room/15.3.jpg,./image_room/15.2.jpg', 1000000, 1),
(61, 56, 27, 'Amanoi Family Ninh Thuận', 5, 'Phòng Gia Đình là sự kết hợp hoàn hảo giữa thoải mái và tiện ích để tạo nên không gian ấm cúng cho cả gia đình. Với không gian rộng rãi và thiết kế thông minh, phòng này mang đến cảm giác như ở nhà, đồng thời đảm bảo đủ tiện nghi để tất cả mọi người cảm thấy thoải mái. Phòng có thể bao gồm một phòng ngủ chính và một phòng ngủ phụ hoặc không gian dành riêng cho trẻ em, giúp tạo ra không gian riêng tư và linh hoạt cho gia đình.', './image_room/14.2.jpg,./image_room/14.1.jpg,./image_room/13.5.jpeg', 4500000, 1),
(62, 58, 25, 'Maia Room View Hồ', 3, 'Phòng Góc là một hòn ngọc hiếm có trong danh sách lưu trú, nơi du khách có thể trải nghiệm sự độc đáo và sang trọng. Với thiết kế độc đáo, phòng này tận dụng tối đa ánh sáng tự nhiên qua những cửa sổ lớn, tạo ra không gian rộng lớn và tươi sáng. Giường ngủ thoải mái tọa lạc ở một góc phòng, tạo nên không gian riêng tư và thoải mái. Khu vực làm việc được bố trí sáng tạo, cung cấp không gian tốt nhất để sáng tạo và nghỉ ngơi. Phòng tắm sang trọng với bồn tắm hoặc vòi sen, cùng các sản phẩm chăm sóc cá nhân cao cấp, đảm bảo một trải nghiệm nghỉ ngơi đẳng cấp. Phòng Góc không chỉ là nơi lưu trú mà còn là điểm nhấn nổi bật trong hành trình khám phá của du khách.', './image_room/16.4.jpg,./image_room/16.3.jpg,./image_room/16.2.jpg', 1500000, 1),
(63, 58, 26, 'Phòng View Biển 2', 3, 'Phòng View là điểm đến lý tưởng cho những du khách thưởng thức vẻ đẹp ngoại ô hoặc thành phố. Với cửa sổ lớn, phòng này mang đến tầm nhìn tuyệt vời và làm nổi bật không gian nghỉ của bạn. Giường ngủ thoải mái được đặt ở vị trí chiến lược để bạn có thể thức dậy với khung cảnh tuyệt vời. Khu vực làm việc được bố trí để bạn có thể làm việc hoặc thư giãn với tầm nhìn đẹp. Phòng tắm với cửa sổ lớn, bồn tắm hoặc vòi sen, tạo điểm nhấn cho trải nghiệm tắm thêm phần thú vị.', './image_room/13.5.jpeg,./image_room/13.4.jpeg,./image_room/13.3.jpeg', 1000000, 1),
(64, 58, 27, 'Maia Resort Family 1', 6, 'Phòng Gia Đình là sự kết hợp hoàn hảo giữa thoải mái và tiện ích để tạo nên không gian ấm cúng cho cả gia đình. Với không gian rộng rãi và thiết kế thông minh, phòng này mang đến cảm giác như ở nhà, đồng thời đảm bảo đủ tiện nghi để tất cả mọi người cảm thấy thoải mái. Phòng có thể bao gồm một phòng ngủ chính và một phòng ngủ phụ hoặc không gian dành riêng cho trẻ em, giúp tạo ra không gian riêng tư và linh hoạt cho gia đình.', './image_room/13.2.jpeg,./image_room/13.1.jpeg,./image_room/12.6.jpg', 5000000, 1),
(65, 51, 23, 'Mercure Room 2', 2, 'Phòng Tiêu Chuẩn là sự kết hợp tuyệt vời giữa sự thoải mái và tiện ích cơ bản, mang đến cho du khách một không gian ấm cúng và thuận tiện trong kỳ nghỉ của họ. Với diện tích rộng rãi, phòng này có một giường thoải mái, trang thiết bị giải trí màn hình phẳng và một khu vực làm việc tiện lợi. Phòng tắm thoải mái với bồn tắm hoặc vòi sen, cùng với các sản phẩm chăm sóc cá nhân cơ bản, tạo điểm nhấn cho trải nghiệm nghỉ ngơi.', './image_room/1.9.jpg,./image_room/1.8.jpg,./image_room/1.7.jpg', 600000, 1),
(66, 51, 23, 'Mercure Room 3', 2, 'Phòng Tiêu Chuẩn là sự kết hợp tuyệt vời giữa sự thoải mái và tiện ích cơ bản, mang đến cho du khách một không gian ấm cúng và thuận tiện trong kỳ nghỉ của họ. Với diện tích rộng rãi, phòng này có một giường thoải mái, trang thiết bị giải trí màn hình phẳng và một khu vực làm việc tiện lợi. Phòng tắm thoải mái với bồn tắm hoặc vòi sen, cùng với các sản phẩm chăm sóc cá nhân cơ bản, tạo điểm nhấn cho trải nghiệm nghỉ ngơi.', './image_room/5.3.jpg,./image_room/5.2.jpg,./image_room/5.1.jpg', 600000, 1),
(67, 51, 25, 'Phòng Góc Mercure 1', 3, 'Phòng Góc là một hòn ngọc hiếm có trong danh sách lưu trú, nơi du khách có thể trải nghiệm sự độc đáo và sang trọng. Với thiết kế độc đáo, phòng này tận dụng tối đa ánh sáng tự nhiên qua những cửa sổ lớn, tạo ra không gian rộng lớn và tươi sáng. Giường ngủ thoải mái tọa lạc ở một góc phòng, tạo nên không gian riêng tư và thoải mái. Khu vực làm việc được bố trí sáng tạo, cung cấp không gian tốt nhất để sáng tạo và nghỉ ngơi. Phòng tắm sang trọng với bồn tắm hoặc vòi sen, cùng các sản phẩm chăm sóc cá nhân cao cấp, đảm bảo một trải nghiệm nghỉ ngơi đẳng cấp. Phòng Góc không chỉ là nơi lưu trú mà còn là điểm nhấn nổi bật trong hành trình khám phá của du khách.', './image_room/4.4.jpg,./image_room/4.3.jpg,./image_room/4.2.jpg', 750000, 1),
(69, 51, 27, 'Mercure Family 3', 5, 'Phòng Gia Đình là sự kết hợp hoàn hảo giữa thoải mái và tiện ích để tạo nên không gian ấm cúng cho cả gia đình. Với không gian rộng rãi và thiết kế thông minh, phòng này mang đến cảm giác như ở nhà, đồng thời đảm bảo đủ tiện nghi để tất cả mọi người cảm thấy thoải mái. Phòng có thể bao gồm một phòng ngủ chính và một phòng ngủ phụ hoặc không gian dành riêng cho trẻ em, giúp tạo ra không gian riêng tư và linh hoạt cho gia đình.', './image_room/8.3.jpg,./image_room/8.2.jpg,./image_room/8.1.jpg', 4500000, 1),
(70, 57, 23, 'Terracotta Room 3', 2, 'Phòng Tiêu Chuẩn là sự kết hợp tuyệt vời giữa sự thoải mái và tiện ích cơ bản, mang đến cho du khách một không gian ấm cúng và thuận tiện trong kỳ nghỉ của họ. Với diện tích rộng rãi, phòng này có một giường thoải mái, trang thiết bị giải trí màn hình phẳng và một khu vực làm việc tiện lợi. Phòng tắm thoải mái với bồn tắm hoặc vòi sen, cùng với các sản phẩm chăm sóc cá nhân cơ bản, tạo điểm nhấn cho trải nghiệm nghỉ ngơi.', './image_room/7.3.jpg,./image_room/7.2.jpg,./image_room/7.1.jpg', 500000, 1),
(72, 57, 27, 'Terracotta Family 3', 6, 'Phòng Gia Đình là sự kết hợp hoàn hảo giữa thoải mái và tiện ích để tạo nên không gian ấm cúng cho cả gia đình. Với không gian rộng rãi và thiết kế thông minh, phòng này mang đến cảm giác như ở nhà, đồng thời đảm bảo đủ tiện nghi để tất cả mọi người cảm thấy thoải mái. Phòng có thể bao gồm một phòng ngủ chính và một phòng ngủ phụ hoặc không gian dành riêng cho trẻ em, giúp tạo ra không gian riêng tư và linh hoạt cho gia đình.', './image_room/5.5.jpg,./image_room/5.4.jpg,./image_room/5.3.jpg', 5000000, 1),
(73, 57, 26, 'Terracotta View Núi', 2, 'Phòng View là điểm đến lý tưởng cho những du khách thưởng thức vẻ đẹp ngoại ô hoặc thành phố. Với cửa sổ lớn, phòng này mang đến tầm nhìn tuyệt vời và làm nổi bật không gian nghỉ của bạn. Giường ngủ thoải mái được đặt ở vị trí chiến lược để bạn có thể thức dậy với khung cảnh tuyệt vời. Khu vực làm việc được bố trí để bạn có thể làm việc hoặc thư giãn với tầm nhìn đẹp. Phòng tắm với cửa sổ lớn, bồn tắm hoặc vòi sen, tạo điểm nhấn cho trải nghiệm tắm thêm phần thú vị.', './image_room/3.6.jpg,./image_room/3.5.jpg,./image_room/3.4.jpg', 750000, 1),
(75, 52, 27, 'Phòng Gia Đình 3', 5, 'Phòng Gia Đình là sự kết hợp hoàn hảo giữa thoải mái và tiện ích để tạo nên không gian ấm cúng cho cả gia đình. Với không gian rộng rãi và thiết kế thông minh, phòng này mang đến cảm giác như ở nhà, đồng thời đảm bảo đủ tiện nghi để tất cả mọi người cảm thấy thoải mái. Phòng có thể bao gồm một phòng ngủ chính và một phòng ngủ phụ hoặc không gian dành riêng cho trẻ em, giúp tạo ra không gian riêng tư và linh hoạt cho gia đình.', './image_room/16.5.jpg,./image_room/16.4.jpg,./image_room/16.3.jpg', 5000000, 1),
(76, 52, 25, 'Phòng Góc Ixora', 2, 'Phòng Góc là một hòn ngọc hiếm có trong danh sách lưu trú, nơi du khách có thể trải nghiệm sự độc đáo và sang trọng. Với thiết kế độc đáo, phòng này tận dụng tối đa ánh sáng tự nhiên qua những cửa sổ lớn, tạo ra không gian rộng lớn và tươi sáng. Giường ngủ thoải mái tọa lạc ở một góc phòng, tạo nên không gian riêng tư và thoải mái. Khu vực làm việc được bố trí sáng tạo, cung cấp không gian tốt nhất để sáng tạo và nghỉ ngơi. Phòng tắm sang trọng với bồn tắm hoặc vòi sen, cùng các sản phẩm chăm sóc cá nhân cao cấp, đảm bảo một trải nghiệm nghỉ ngơi đẳng cấp. Phòng Góc không chỉ là nơi lưu trú mà còn là điểm nhấn nổi bật trong hành trình khám phá của du khách.', './image_room/14.1.jpg,./image_room/13.5.jpeg,./image_room/13.4.jpeg', 1000000, 1),
(77, 53, 23, 'Phòng Tiêu Chuẩn Centara 1', 2, 'Phòng Tiêu Chuẩn là sự kết hợp tuyệt vời giữa sự thoải mái và tiện ích cơ bản, mang đến cho du khách một không gian ấm cúng và thuận tiện trong kỳ nghỉ của họ. Với diện tích rộng rãi, phòng này có một giường thoải mái, trang thiết bị giải trí màn hình phẳng và một khu vực làm việc tiện lợi. Phòng tắm thoải mái với bồn tắm hoặc vòi sen, cùng với các sản phẩm chăm sóc cá nhân cơ bản, tạo điểm nhấn cho trải nghiệm nghỉ ngơi.', './image_room/16.2.jpg,./image_room/16.1.jpg,./image_room/15.5.jpg', 750000, 1),
(79, 53, 26, 'Phòng View Biển Centara', 2, 'Phòng View là điểm đến lý tưởng cho những du khách thưởng thức vẻ đẹp ngoại ô hoặc thành phố. Với cửa sổ lớn, phòng này mang đến tầm nhìn tuyệt vời và làm nổi bật không gian nghỉ của bạn. Giường ngủ thoải mái được đặt ở vị trí chiến lược để bạn có thể thức dậy với khung cảnh tuyệt vời. Khu vực làm việc được bố trí để bạn có thể làm việc hoặc thư giãn với tầm nhìn đẹp. Phòng tắm với cửa sổ lớn, bồn tắm hoặc vòi sen, tạo điểm nhấn cho trải nghiệm tắm thêm phần thú vị.', './image_room/13.5.jpeg,./image_room/13.4.jpeg,./image_room/13.3.jpeg', 2000000, 1),
(80, 53, 27, 'Centara Family 2', 5, 'Phòng Gia Đình là sự kết hợp hoàn hảo giữa thoải mái và tiện ích để tạo nên không gian ấm cúng cho cả gia đình. Với không gian rộng rãi và thiết kế thông minh, phòng này mang đến cảm giác như ở nhà, đồng thời đảm bảo đủ tiện nghi để tất cả mọi người cảm thấy thoải mái. Phòng có thể bao gồm một phòng ngủ chính và một phòng ngủ phụ hoặc không gian dành riêng cho trẻ em, giúp tạo ra không gian riêng tư và linh hoạt cho gia đình.', './image_room/11.5.jpeg,./image_room/11.4.jpeg,./image_room/11.3.jpg', 4500000, 1),
(82, 67, 23, 'PHÒNG VIP TẦNG 4', 2, 'VIP', './image_room/2.6.jpg', 600000, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `roomtype`
--

CREATE TABLE `roomtype` (
  `RoomTypeID` int NOT NULL,
  `RoomTypeName` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `Description` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `DisplayRoomTypeID` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `roomtype`
--

INSERT INTO `roomtype` (`RoomTypeID`, `RoomTypeName`, `Description`, `DisplayRoomTypeID`) VALUES
(23, 'Phòng Tiêu Chuẩn', 'Đặc điểm: Là lựa chọn phổ biến cho những người muốn lưu trú thoải mái với giá cả hợp lý.\r\nNội thất: Phòng có thể đi kèm với một giường đơn hoặc giường đôi, bàn làm việc, TV màn hình phẳng, điều hòa nhiệt độ, và phòng tắm riêng.\r\nSức chứa: Thường chứa từ 1 đến 2 người.', 1),
(25, 'Phòng Góc', 'Đặc điểm: Phòng ở góc tòa nhà, mang lại tầm nhìn rộng và đẹp hơn.\r\nNội thất: Có thể giống phòng tiêu chuẩn nhưng với cửa sổ hai hướng, tạo cảm giác thoải mái và sáng sủa.\r\nSức chứa: Thường chứa từ 1 đến 2 người.', 1),
(26, 'Phòng View', 'Đặc điểm: Thiết kế để khách hàng tận hưởng tầm nhìn đẹp của môi trường xung quanh.\r\nNội thất: Phòng có thể tương tự phòng tiêu chuẩn, nhưng với cửa sổ lớn và tiện ích để tận hưởng view.\r\nSức chứa: Thường chứa từ 1 đến 3 người.', 1),
(27, 'Phòng Gia Đình', 'Đặc điểm: Dành cho gia đình hoặc nhóm, với không gian lớn hơn và tiện ích phù hợp.\r\nNội thất: Có thể bao gồm giường đôi hoặc giường đôi kết hợp với giường đơn hoặc giường tầng, bàn làm việc, TV màn hình phẳng, và điều hòa nhiệt độ.\r\nSức chứa: Thường chứa từ 3 đến 6 người.', 1),
(35, 'Phòng Vua Chúa', 'Dịch vụ như vua', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `status`
--

CREATE TABLE `status` (
  `StatusID` int NOT NULL,
  `NameStatus` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `status`
--

INSERT INTO `status` (`StatusID`, `NameStatus`) VALUES
(1, 'Chờ thanh toán'),
(2, 'Đã thanh toán'),
(3, 'Đã hủy'),
(4, 'Hoàn thành');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `UserID` int NOT NULL,
  `FullName` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `Password` varchar(40) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `Email` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `Phone` varchar(40) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `DisplayStatusID` int NOT NULL,
  `RoleID` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`UserID`, `FullName`, `Password`, `Email`, `Phone`, `DisplayStatusID`, `RoleID`) VALUES
(34, 'Nguyễn Đức Quân', '123456', 'anhquanct1204@gmail.com', '0865458705', 1, 1),
(35, NULL, '123456', 'tuanlvph51193@gmail.com', NULL, 1, 1),
(36, NULL, '123456', 'qqq@gmail.com', NULL, 1, 2);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`HotelID`);

--
-- Chỉ mục cho bảng `pay`
--
ALTER TABLE `pay`
  ADD PRIMARY KEY (`PayID`),
  ADD KEY `ReservationID` (`ReservationID`);

--
-- Chỉ mục cho bảng `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`ReservationID`),
  ADD KEY `RoomID` (`RoomID`),
  ADD KEY `UserID` (`UserID`),
  ADD KEY `StatusID` (`StatusID`);

--
-- Chỉ mục cho bảng `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`ReviewID`),
  ADD KEY `ReservationID` (`ReservationID`);

--
-- Chỉ mục cho bảng `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`RoleID`);

--
-- Chỉ mục cho bảng `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`RoomID`),
  ADD KEY `HotelID` (`HotelID`),
  ADD KEY `RoomTypeID` (`RoomTypeID`);

--
-- Chỉ mục cho bảng `roomtype`
--
ALTER TABLE `roomtype`
  ADD PRIMARY KEY (`RoomTypeID`);

--
-- Chỉ mục cho bảng `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`StatusID`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserID`),
  ADD KEY `user_ibfk_1` (`RoleID`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `hotel`
--
ALTER TABLE `hotel`
  MODIFY `HotelID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT cho bảng `pay`
--
ALTER TABLE `pay`
  MODIFY `PayID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT cho bảng `reservation`
--
ALTER TABLE `reservation`
  MODIFY `ReservationID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT cho bảng `review`
--
ALTER TABLE `review`
  MODIFY `ReviewID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT cho bảng `role`
--
ALTER TABLE `role`
  MODIFY `RoleID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `room`
--
ALTER TABLE `room`
  MODIFY `RoomID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT cho bảng `roomtype`
--
ALTER TABLE `roomtype`
  MODIFY `RoomTypeID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT cho bảng `status`
--
ALTER TABLE `status`
  MODIFY `StatusID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `UserID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `pay`
--
ALTER TABLE `pay`
  ADD CONSTRAINT `pay_ibfk_1` FOREIGN KEY (`ReservationID`) REFERENCES `reservation` (`ReservationID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`RoomID`) REFERENCES `room` (`RoomID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reservation_ibfk_3` FOREIGN KEY (`StatusID`) REFERENCES `status` (`StatusID`);

--
-- Các ràng buộc cho bảng `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`ReservationID`) REFERENCES `reservation` (`ReservationID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `room`
--
ALTER TABLE `room`
  ADD CONSTRAINT `room_ibfk_1` FOREIGN KEY (`HotelID`) REFERENCES `hotel` (`HotelID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `room_ibfk_2` FOREIGN KEY (`RoomTypeID`) REFERENCES `roomtype` (`RoomTypeID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`RoleID`) REFERENCES `role` (`RoleID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
