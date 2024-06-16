<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CK - Thêm Khách hàng</title>
</head>
<body>
    <form action="">
        <h1>Thêm khách hàng</h1>
        Mã khách hàng <input type="text" name="makh" id="makh" placeholder="Mã khách hàng"> <br><br>
        Tên khách hàng <input type="text" name="tenkh" id="tenkh" placeholder="Tên khách hàng"> <br><br>
        Số điện thoại <input type="number" name="sdt" id="sdt" placeholder="Số điện thoại"> <br><br>
        Căn cước công nhân <input type="text" name="cccn" id="cccn" placeholder="Căn cước công nhân"> <br><br>
        <h1><input type="submit" name="submit" id="submit" value="Thêm"></h1>
    </form>
</body>
<?php 
    if (isset($_GET['submit']) && $_GET['submit'] == 'Thêm') {
        $makh = $_GET['makh'];
        $tenkh = $_GET['tenkh'];
        $sdt = $_GET['sdt'];
        $cccn = $_GET['cccn'];

        include("connect.php");
        $sql = "INSERT INTO `khachhang`(`makh`, `tenkh`, `sdt`, `cccn`) VALUES ('$makh','$tenkh','$sdt','$cccn')";
        
        if ($connect->query($sql) == true) {
            echo "Thêm khách hàng thành công!";
        } else {
            echo "Thêm khách hàng thất bại...";
        }
    }
?>
</html>