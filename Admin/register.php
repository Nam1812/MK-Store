<?php
    include("config/config.php");
    if(isset($_POST['register'])){
        $tenadmin = $_POST['adminname'];
        $matkhau = md5($_POST['adminpassword']);
        $trangthai = $_POST['status'];
        $sql_register = "INSERT INTO tbl_admin(admin_name, password, admin_status) 
        VALUE ('".$tenadmin."', '".$matkhau."', '".$trangthai."')";
        $query_register = mysqli_query($mysqli, $sql_register);
        if($query_register){
            $_SESSION['dangky'] = $tenadmin;
            echo '<p style="color: green; text-align: center;">Đăng ký thành công</p>';
            header("Location:../Admin/index.php");
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký</title>
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
            <a href="index.php"><img src="/Img/mk.png" alt=""></a>
        </div>
        <select class="lang" data-v-e4a59aca="">
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

    <div id="main-panel">
        <div class="content" style="top: 0px;">
            <form id="form-register" class="loginForm" action="" method="post" autocomplete="off">
                <h2 class="title">Đăng ký</h2>
                <div id="line-username" class="line">
                    <input required id="sso_register_form_account" type="text" name="adminname" placeholder="Tên truy cập" autocorrect="off" autocapitalize="off">
                    <span style="display: flex;width: calc(23% - 5px);padding-top: 5px; color: #CC0000; text-align:left; margin: auto; font-size:12px;">
                    </span>
                    
                </div>
                    <div id="line-password" class="line">
                        <input required id="sso_register_form_password" type="password" name="adminpassword" placeholder="Mật khẩu"><span id="span-toggle" class="icon clearfix"><span class="icon-eye icon-eye-hide fr"></span></span>
                    </div>
                    <div id="line-username" class="line"> 
                        <input type="text" name="status" placeholder="Hoạt động(1)/Không hoạt động(0)...">
                    </div>
                    <div id="line-terms" class="terms linee">
                        <input class="check" type="checkbox">
                        <label id="sso_register_form_terms_label" for="sso_register_form_terms">Tôi đồng ý với 
                            <a id="sso_register_terms_link">Điều Khoản Dịch Vụ</a> và 
                            <a id="sso_register_privacy_link">Chính Sách Bảo Mật</a>
                        </label>
                    </div> 
                    <div id="line-btn" class="btnLine">
                        <input id="confirm-btn" type="submit" value="Đăng Ký Ngay" name="register" class="btn">
                    </div> 
                    <p class="or">Hoặc</p>
                    <div class="field">
                        <a class="if-have-acc" href="/Admin/index.php">Đăng Nhập Nếu Đã Có Tài Khoản</a>
                    </div>
                </div>  
            </form>
        </div>
    </div>
</body>
</html>