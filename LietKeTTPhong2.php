<?php
    include("connect.php");

    $makh = $_POST['makh'];

    $sql = "SELECT mahd FROM hoadon WHERE makh = '$makh'";
    $result = $connect->query($sql);

    $options = "";
    while ($row = $result->fetch_assoc()) {
        $options .= "<option value='" . $row['mahd'] . "'>" . $row['mahd'] . "</option>";
    }

    echo $options;

    $connect->close();
?>