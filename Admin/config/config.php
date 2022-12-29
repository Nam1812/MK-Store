<?php
    $mysqli = new mysqli("localhost","root","","dacs2");

    // Check connection
    if ($mysqli->connect_errno) {
    echo "Kết nối DACS2 lỗi: " . $mysqli -> connect_error;
    exit();
    }
?>
