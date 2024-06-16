<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CK - Liệt kê Khách hàng</title>
</head>
<body>
    <form action="" method="post">
        <h1>Liệt kê Khách hànng</h1>

        Số lượng khách hàng <input type="number" name="slkh" id="slkh">
    </form>

    <div id="result"></div>
</body>

<script>
    var inp = document.getElementById('slkh');

    inp.addEventListener("keydown", function(event) {
        if (event.key === "Enter") {
            event.preventDefault();
            handleEnterKey();
        }
    });

    function handleEnterKey() {
        var slkh = document.getElementById('slkh').value;

        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'LietKeKhachHang2.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status === 200) {
                document.getElementById('result').innerHTML = xhr.responseText;
            }
        };

        xhr.send('slkh=' + encodeURIComponent(slkh));
    }
</script>
</html>