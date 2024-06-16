<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CK - Liệt kê Thông tin Phòng</title>
</head>

<body>
    <form action="" method="post">
        <h1>Liệt kê thông tin phòng</h1>

        Tên khách hàng
        <select name="tenkh" id="tenkh">
            <?php
            include("connect.php");

            $result = $connect->query("SELECT `makh`, `tenkh` FROM `khachhang`");

            while ($row = $result->fetch_row()) {
                echo "<option value='$row[0]'>$row[1]</option>";
            }
            $connect->close();
            ?>
        </select>

        <br><br>

        Mã hóa đơn
        <select name="mahd" id="mahd"></select>

        <br><br>

        Danh sách các phòng trong hóa đơn

        <table id="result" border="1" cellspacing="0"></table>
    </form>
</body>
<script>
    document.getElementById('tenkh').addEventListener("change", function() {
        var makh = this.value;

        loadInvoices(makh);
    });

    function loadInvoices(makh) {
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'LietKeTTPhong2.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onload = function() {
            if (xhr.status >= 200 && xhr.status < 300) {
                document.getElementById('mahd').innerHTML = xhr.responseText;
            } else {
                console.error('The request failed!');
            }
        };
        xhr.send('makh=' + encodeURIComponent(makh));
    }

    document.getElementById('mahd').addEventListener("change", function() {
        var mahd = this.value;

        loadDetails(mahd);
    }); 

    function loadDetails(mahd) {
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'LietKeTTPhong3.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onload = function() {
            if (xhr.status >= 200 && xhr.status < 300) {
                document.getElementById('result').innerHTML = xhr.responseText;
            } else {
                console.error('The request failed!');
            }
        };
        xhr.send('mahd=' + encodeURIComponent(mahd));
    }
</script>

</html>