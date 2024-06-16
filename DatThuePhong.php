<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CK - Đặt thuê phòng</title>
</head>

<body>
    <form action="" method="post">
        <h1>Đặt thuê phòng</h1>

        Mã hóa đơn <select name="mahd" id="mahd">
            <?php
            include("connect.php");

            $sql = "SELECT `mahd`, `tenhd` FROM `hoadon`";
            $result = $connect->query($sql);
            while ($row = $result->fetch_row()) {
                echo "<option value='$row[0]'>$row[1]</option>";
            }
            ?>
        </select>
        <h3>Danh sách các phòng còn trống</h3>
        <table id="dsptrong" border="1" cellspacing="0">
            <?php
                include("connect.php");

                $result = $connect->query("SELECT `maphong`, `tenphong` FROM `phong` WHERE `tinhtrang` = 'Chưa thuê'");

                if ($result->num_rows == 0) {
                    echo "<tr><th>Không còn phòng trống nào để thuê!</th></tr>";
                } else {
                    echo "<tr>
                                <th>STT</th>
                                <th>Mã phòng</th>
                                <th>Tên phòng</th>
                                <th>Chức năng</th>
                            </tr>";
                    while ($row = $result->fetch_row()) {
                        $stt = 1;
                        echo "<tr>
                                    <td>$stt</td>
                                    <td class='maphong'>$row[0]</td>
                                    <td>$row[1]</td>
                                    <td><input type='button' name='thue' class='thue' value='Thuê'></td>
                                </tr>";
                        $stt++;
                    }
                }
                $connect->close();
            ?>
        </table>
        <h3>Danh sách các phòng đã thêm</h3>
        <table id="dspthem" border="1" cellspacing="0">
            <?php
                include("connect.php");
               
                $result = $connect->query("SELECT `maphong`, `tenphong` FROM `phong` WHERE `tinhtrang` = 'Đang thuê'");

                if ($result->num_rows == 0) {
                    echo "<tr><th>Không có phòng nào đang được thuê!</th></tr>";
                } else {
                    echo "<tr>
                                <th>STT</th>
                                <th>Mã phòng</th>
                                <th>Tên phòng</th>
                                <th>Chức năng</th>
                            </tr>";
                    while ($row = $result->fetch_row()) {
                        $stt = 1;
                        echo "<tr>
                                    <td>$stt</td>
                                    <td class='maphong'>$row[0]</td>
                                    <td>$row[1]</td>
                                    <td><input type='button' name='xoa' class='xoa' value='Xóa'></td>
                                </tr>";
                        $stt++;
                    }
                }
                $connect->close();
            ?>
        </table>
    </form>
</body>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var thueBtns = document.querySelectorAll('.thue');
        thueBtns.forEach(function(btn) {
            btn.addEventListener('click', function() {
                event.preventDefault();
                var mahd = document.querySelector('#mahd').value;
                var maphong = btn.closest('tr').querySelector('.maphong').textContent;

                var xhr = new XMLHttpRequest();
                xhr.open('POST', 'DatThuePhong2.php', true);
                xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                xhr.onload = function() {
                    if (xhr.status === 200) {
                        location.reload();
                    }
                };
                xhr.send('mahd=' + mahd + '&maphong=' + maphong);
            });
        });

        var xoaBtns = document.querySelectorAll('.xoa');
        xoaBtns.forEach(function(btn) {
            btn.addEventListener('click', function(event) {
                event.preventDefault();
                var mahd = document.querySelector('#mahd').value;
                var maphong = btn.closest('tr').querySelector('.maphong').textContent;

                var xhr = new XMLHttpRequest();
                xhr.open('POST', 'DatThuePhong3.php', true);
                xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                xhr.onload = function() {
                    if (xhr.status === 200) {
                        location.reload();
                    }
                };
                xhr.send('mahd=' + mahd + '&maphong=' + maphong);
            });
        });
    });
</script>

</html>