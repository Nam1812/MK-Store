<?php
    session_start();
    include("config/config.php");
    //Đăng Nhập
    if(isset($_POST['dangnhap'])){
        $taikhoan = $_POST['username'];
        $matkhau = md5($_POST['password']);
        $sql = "SELECT * FROM tbl_admin WHERE admin_name = '".$taikhoan."' AND password = '".$matkhau."' LIMIT 1";
        $row = mysqli_query($mysqli, $sql);
        $count = $row -> num_rows;
        if($count > 0){
            $_SESSION['dangnhap'] = $taikhoan;
            header("Location: index.php");
        }else{
            echo '<script>alert("Tài Khoản Hoặc Mặt Khẩu Không Đúng, Vui Lòng Đăng Nhập Lại");</script>';
            header("Location:login.php");
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập Admin</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"/>
<!-- SweetAlert2 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limontesweetalert2/7.2.0/sweetalert2.min.css/>"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="/Admin/Css/login,regis.css">
</head>
<body>
    <header class="top">
        <div class="logo">
            <a href="index.php" ><img src="/Img/mk.png" alt=""></a>
        </div>
        <select class="lang">
            <option value="en-US" data-v-e4a59aca="">International - English</option>
            <option value="en-SG" data-v-e4a59aca="">Singapore - English</option>
            <option value="zh-SG" data-v-e4a59aca="">新加坡 - 简体中文</option>
            <option value="zh-TW" data-v-e4a59aca="">台灣 - 繁体中文</option>
            <option value="en-PH" data-v-e4a59aca="">Philippines - English</option>
            <option value="th-TH" data-v-e4a59aca="">ไทย - ไทย</option>
            <option value="id-ID" data-v-e4a59aca="">Indonesia - Bahasa Indonesia</option>
            <option value="vi-VN" data-v-e4a59aca="">Việt Nam - Tiếng việt</option>
            <option value="ru-RU" data-v-e4a59aca="">Россия - Русский</option>
            <option value="en-MY" data-v-e4a59aca="">Malaysia - English</option>
            <option value="pt-PT" data-v-e4a59aca="">Portugal - Português</option>
            <option value="es-ES" data-v-e4a59aca="">España - Español</option>
        </select>
    </header>

    <main>
        <form class="form" method="POST" autocomplete="off" action="">
            <h2>Đăng nhập Admin</h2>
            <div class="field required">
                <input type="text" name="username" placeholder="Tài khoản Admin">
            </div>
            <div class="field required">
                <input type="password" name="password" placeholder="Mật khẩu">
            </div>
            <div class="field">
                <input class="primary_form_submit" type="submit" name="dangnhap" value="Đăng Nhập Ngay">
            </div>
            <div>
                <p class="or">Hoặc</p>
            </div>
            <div class="field">
                <a class="if-have" href="/Admin/register.php">Đăng Ký Nếu Chưa Có Tài Khoản</a>
            </div>
        </form>
    </main>
</body>
</html>