<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CK - Thêm Hóa đơn</title>
</head>
<body>
    <form action="">
        <h1>Thêm hóa đơn</h1>
        Tên khách hàng <select name="makh" id="makh">            
            <?php 
            include("connect.php");

            $sql = "SELECT `makh`, `tenkh` FROM `khachhang`";
            $result = $connect->query($sql);

            while ($row = $result->fetch_row()) {
                echo "<option value='$row[0]'>$row[1]</option>";
            }
            ?>
        </select> <br><br>
        Mã hóa đơn <input type="text" name="mahd" id="mahd" placeholder="Mã hóa đơn"> <br><br>
        Tên hóa đơn <input type="text" name="tenhd" id="tenhd" placeholder="Tên hóa đơn"> <br><br>
        Tổng tiền <input type="number" name="tongtien" id="tongtien" placeholder="Tổng tiền"> <br><br>
        <h1><input type="submit" name="submit" id="submit" value="Thêm"></h1>
    </form>
</body>
<?php 
    if (isset($_GET['submit']) && $_GET['submit'] == 'Thêm') {
        $mahd = $_GET['mahd'];
        $tenhd = $_GET['tenhd'];
        $makh = $_GET['makh'];
        $tongtien = $_GET['tongtien'];

        include("connect.php");
        $sql = "INSERT INTO `hoadon`(`mahd`, `tenhd`, `makh`, `tongtien`) VALUES ('$mahd','$tenhd','$makh','$tongtien')";
        
        if ($connect->query($sql) == true) {
            echo "Thêm hóa đơn thành công!";
        } else {
            echo "Thêm hóa đơn thất bại...";
        }
    }
?>
</html>