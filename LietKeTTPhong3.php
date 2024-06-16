<?php
include("connect.php");

    $mahd = $_POST['mahd']; 

    $sql = "SELECT phong.maphong, phong.loaiphong
            FROM thue 
            JOIN phong ON thue.maphong = phong.maphong 
            WHERE thue.mahd = '$mahd'";
    $result = $connect->query($sql);

    $roomInfoTable = "<tr><th>STT</th><th>Mã Phòng</th><th>Loại Phòng</th></tr>";
    $stt = 1;
    while ($row = $result->fetch_assoc()) {
        $roomInfoTable .= "<tr>
            <td>" . $stt . "</td>
            <td>" . $row['maphong'] . "</td>
            <td>" . $row['loaiphong'] . "</td>
        </tr>";
        $stt++;
    }

    echo $roomInfoTable;

$connect->close();
?>
