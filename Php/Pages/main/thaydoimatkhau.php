<?php
    //Đăng Nhập
    if(isset($_POST['doimatkhau'])){
        $email = $_POST['email'];
        $matkhaucu = md5($_POST['password_cu']);
        $matkhaumoi = md5($_POST['password_moi']);

        $sql = "SELECT * FROM tbl_dangky WHERE email = '".$email."' AND matkhau = '".$matkhaucu."' LIMIT 1";
        $query = mysqli_query($mysqli, $sql);
        $count = $query -> num_rows;

        if($count > 0){
            $sql_update = "UPDATE tbl_dangky SET matkhau = '".$matkhaumoi."'";
            $query_update = mysqli_query($mysqli, $sql_update);
            echo '<p style="color: green; text-align: center;">Thay Đổi Thành Công</p>';
        }else{
            echo '<p style="color: red; text-align: center;">Tài Khoản Hoặc Mặt Khẩu Cũ Không Đúng Vui Lòng Nhập Lại</p>';
        }
    }
?>
<body>
    <main>
        <form class="form" method="POST" autocomplete="" action="">
            <h2>Đổi Mật Khẩu 
                <?php if(isset($_SESSION['dangky'])){
                    echo '<span style="color: red">'.$_SESSION['dangky'].'</span>';
                }?>
            </h2>
            <div class="field required">
                <input type="text" name="email" placeholder="Email User...">
            </div>
            <div class="field required">
                <input type="password" name="password_cu" placeholder="Mật khẩu cũ...">
            </div>
            <div class="field required">
                <input type="password" name="password_moi" placeholder="Mật khẩu mới...">
            </div>
            <div class="field">
                <input class="primary form__submit" type="submit" name="doimatkhau" value="Đổi Mật Khẩu">
            </div>
        </form>
    </main>
</body>