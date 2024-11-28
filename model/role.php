<?php
    // Lấy tất cả loại người dùng ;
    function getRole() {
        $conn = connectDB() ;
        $sql = "SELECT * FROM `role`" ;
        $result = $conn -> query($sql) -> fetchAll() ;
        return $result ;
    }
?>