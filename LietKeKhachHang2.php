<?php
    include("connect.php");

    $slkh = $_POST['slkh'];

    if ($slkh == 0 || $slkh == '') {
        echo "Nhập số lượng khách hàng!";
    } else {
        echo "<h2>" . $slkh . " khách hàng có số tiền thuê nhiều nhất</h2>";

        $sql = "SELECT khachhang.makh, khachhang.tenkh, SUM(hoadon.tongtien) AS total 
                FROM khachhang 
                JOIN hoadon ON hoadon.makh = khachhang.makh
                GROUP BY KHACHHANG.MAKH 
                ORDER BY TOTAL DESC 
                LIMIT $slkh";

        $result = $connect->query($sql);

        echo "<table border='1' cellspacing='0'><tr><th>STT</th><th>Mã Khách hàng</th><th>Tên Khách hàng</th><th>Tổng tiền thuê</th></tr>";
        $stt = 1;
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                        <td>" . $stt . "</td>
                        <td>" . $row['makh'] . "</td>
                        <td>" . $row['tenkh'] . "</td>
                        <td>" . $row['total'] . "</td>
                    </tr>";
            $stt++;
        }
        echo "</table>";

        if ($result->num_rows < $slkh) {
            echo "<br><br>Lượng khách hàng hiện tại không đủ " . $slkh . " người, chỉ có thể hiển thị " . $result->num_rows . " khách!";
        }
    }

    $connect->close();