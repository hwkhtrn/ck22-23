<?php
    include("connect.php");

    $mahd = $_POST['mahd'];
    $maphong = $_POST['maphong'];
    $giathue = 0;

    $sql = "SELECT `loaiphong` FROM `phong` WHERE `maphong` = '$maphong'";
    if ($connect->query($sql) == "Phòng đơn") {
        $giathue = 1000000;
    } else {
        $giathue = 1800000;
    }

    $sql = "INSERT INTO `thue`(`mahd`, `maphong`, `ngaythue`, `ngaytra`, `giathue`) VALUES ('$mahd','$maphong','','','$giathue')";
    $sql2 = "UPDATE `phong` SET `tinhtrang`= 'Đang thuê' WHERE `maphong`='$maphong'";

    if ($connect->query($sql) === TRUE && $connect->query($sql2) === TRUE) {
        echo "Thuê phòng thành công!";
    } else {
        echo "Error: " . $sql . "<br>" . $connect->error;
    }

    $connect->close();
