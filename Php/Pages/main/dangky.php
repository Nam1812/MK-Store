<?php
    if(isset($_POST['dangky'])){
        $tenkhachhang = $_POST['hovaten'];
        $email = $_POST['email'];
        $diachi = $_POST['diachi'];
        $dienthoai = $_POST['dienthoai'];
        $matkhau = md5($_POST['matkhau']);
        $sql_dangky = "INSERT INTO tbl_dangky(tenkhachhang, email, diachi, matkhau, dienthoai) 
        VALUE ('".$tenkhachhang."', '".$email."', '".$diachi."', '".$matkhau."', '".$dienthoai."')";
        $query_dangky = mysqli_query($mysqli, $sql_dangky);
        if($query_dangky){
            $_SESSION['dangky'] = $tenkhachhang;
            echo '<p style="color: green; text-align: center;">Đăng ký thành công</p>';
            
        }
    }
?>
<form class="form" method="POST" autocomplete="" action="">
    <h2 class="title-regis"><i class="fa fa-id-card"></i> Đăng Ký Thành Viên </h2>
    <div class="field required">
        <input type="text" name="hovaten" placeholder="Họ và tên">
    </div>
    <div class="field required">
        <input type="text" name="email" placeholder="Email">
    </div>
    <div class="field required">
        <input type="text" name="diachi" placeholder="Địa Chỉ">
    </div>
    <div class="field required">
        <input type="text" name="dienthoai" placeholder="Điện Thoại">
    </div>
    <div class="field required">
        <input type="password" name="matkhau" placeholder="Mật khẩu">
    </div>
    <div class="field">
        <input class="primary form__submit" type="submit" name="dangky" value="Đăng Ký">
    </div>
    <div class="or">
        <p>Hoặc</p>
    </div>
    <div class="field">
        <a class="if-have"href="/Php/index.php?quanly=dangnhap">Đăng Nhập Nếu Đã Có Tài Khoản</a>
    </div>
</form>
    
