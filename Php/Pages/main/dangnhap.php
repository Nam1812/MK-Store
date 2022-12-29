<?php
    //Đăng Nhập
    if(isset($_POST['dangnhap'])){
        $email = $_POST['email'];
        $matkhau = md5($_POST['password']);
        $sql = "SELECT * FROM tbl_dangky WHERE email = '".$email."' AND matkhau = '".$matkhau."' LIMIT 1";
        $row = mysqli_query($mysqli, $sql);
        $count = $row -> num_rows;
        if($count > 0){
            $row_data = $row -> fetch_array();
            $_SESSION['dangky'] = $row_data['tenkhachhang'];
            echo '<p style="color: green; text-align: center;">Đăng nhập thành công</p>';
        }else{
            echo '<p style="color: red; text-align: center;">Email hoặc mặt khẩu không đúng, vui lòng nhập lại</p>';
        }
    }
?>
<body>
    <main>
        <form class="form" method="POST" autocomplete="" action="">
            <h2>Đăng nhập User</h2>
            <div class="field required">
                <input type="text" name="email" placeholder="Email User...">
            </div>
            <div class="field required">
                <input type="password" name="password" placeholder="Mật khẩu...">
            </div>
            <div class="field">
                <input class="primary form__submit" type="submit" name="dangnhap" value="Đăng Nhập Ngay">
            </div>
            <p class="or">Hoặc</p>
            <div class="field">
                <a class="if-have" href="/Php/index.php?quanly=dangky">Đăng Ký Nếu Chưa Có Tài Khoản</a>
            </div>
        </form>
    </main>
</body>