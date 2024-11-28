<?php

    // Phần đăng nhập ;
    function login($email) {
        $conn = connectDB() ;
        $sql = "SELECT * FROM `user` WHERE `Email` = '$email'" ;
        $result = $conn -> query($sql) -> fetch() ;
        return $result ;
    }

    // Phần đăng ký của người dùng ;
    function signup($password , $email , $RoleID) {
        $conn = connectDB() ;
        $sql = "INSERT INTO `user`(`Password` , `Email` , `DisplayStatusID` , `RoleID`) VALUES('$password' , '$email' , 1 , '$RoleID')" ;
        $result = $conn -> query($sql) ;
        echo "<script>alert('Đăng ký tài khoản thành công');</script>" ;
        echo '<script type="text/javascript">window.location.href = "?action=login";</script>';
    }

    // Phần đăng xuất ;
    function logout() {
        if(isset($_SESSION['login'])) {
            session_unset() ;
            session_destroy() ;
            
        }
        echo '<script type="text/javascript">window.location.href = "?action=login";</script>';
    }


    // Lấy số lượng người dùng;
    function getCountUsers() {
        $conn = connectDB() ;
        $sql = "SELECT COUNT(*) AS `CountUser` FROM `user`" ;
        $result = $conn -> query($sql) -> fetch() ;
        return $result ;
    }

    // Lấy tất cả thông tin user trong trang admin ;
    function getUsersAdmin() {
        if(isset($_GET['pages'])) {
            $pages = $_GET['pages'] ;
        }else {
            $pages = 1 ;
        }
        $location = ($pages - 1) * 10 ;
        $conn = connectDB() ;
        $sql = "SELECT r.`Role` , u.* FROM `user` u 
        JOIN `role` r ON r.`RoleID` = u.`RoleID` LIMIT $location,10" ;
        $result = $conn -> query($sql) -> fetchAll() ;
        return $result ;
    }

    // Lấy thông tin user theo ID ;
    function getUsersID($UserID) {
        $conn = connectDB() ;
        $sql = "SELECT r.`Role` , u.* FROM `user` u 
        JOIN `role` r ON r.`RoleID` = u.`RoleID` WHERE `UserID` = '$UserID'" ;
        $result = $conn -> query($sql) -> fetch() ;
        return $result ;
    }
    
    // Thêm người dùng trong trang admin ;
    function createUser($password , $email , $RoleID) {
        $conn = connectDB() ;
        $sql = "INSERT INTO `user`(`Password` , `Email` , `DisplayStatusID` , `RoleID`) VALUES('$password' , '$email' , 1 , '$RoleID')" ;
        $result = $conn -> query($sql) ;
        echo '<script type="text/javascript">window.location.href = "?action=managerUsers";</script>';
    }

    // Xóa người dùng ;
    function deleteUser($UserID) {
        $conn = connectDB() ;
        $sql = "DELETE FROM `user` WHERE `UserID` IN ('$UserID')" ;
        $result = $conn -> query($sql) ;
        echo '<script type="text/javascript">window.location.href = "?action=managerUsers";</script>';
    }

    // Cập nhật tài khoản trong trong admin ;
    function updateUser($email , $password , $UserID , $status , $roleID) {
        $conn = connectDB() ;
        $sql = "UPDATE `user` SET `Email` = '$email' , `Password` = '$password' , `DisplayStatusID` = '$status' , `RoleID` = '$roleID' WHERE `UserID` = '$UserID'" ;
        $result = $conn -> query($sql) ;
        echo '<script type="text/javascript">window.location.href = "?action=managerUsers";</script>';
    }

    // Thay đổi mật khẩu trong trang thông tin tài khoản ;
    function changePassword($Password , $UserID) {
        $conn = connectDB() ;
        $sql = "UPDATE `user` SET `Password` = '$Password' WHERE `UserID` = '$UserID'" ;
        $result = $conn -> query($sql) ;
        echo '<script type="text/javascript">window.location.href = "?action=profile";</script>';
    }

    function changeProfile($FullName , $Phone , $UserID) {
        $conn = connectDB() ;
        $sql = "UPDATE `user` SET `FullName` = '$FullName' , `Phone` = '$Phone' WHERE `UserID` = '$UserID'" ;
        $result = $conn -> query($sql) ;
        echo '<script type="text/javascript">window.location.href = "?action=profile";</script>';
    }
    
?>