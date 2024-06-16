<?php
    include("connect.php");

    $mahd = $_POST['mahd'];
    $maphong = $_POST['maphong'];

    $sql = "DELETE FROM `thue` WHERE `maphong` = '$maphong'";
    $sql2 = "UPDATE `phong` SET `tinhtrang`= 'Chưa thuê' WHERE `maphong`='$maphong'";

    if ($connect->query($sql) === TRUE && $connect->query($sql2) === TRUE) {
        echo "Xóa phòng thành công!";
    } else {
        echo "Error: " . $sql . "<br>" . $connect->error;
    }

    $connect->close();
