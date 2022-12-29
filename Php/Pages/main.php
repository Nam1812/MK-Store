<div class="main">
      <?php
        if(isset($_GET['quanly'])){
            $tam = $_GET['quanly'];
        }else{
            $tam = '';
        }

        if($tam == 'danhmucsanpham'){
            include("main/danhmuc.php");
        }
        elseif($tam == 'phukien'){
            include("main/phukien.php");
        }
        elseif($tam == 'maycu'){
            include("main/maycu.php");
        }
        elseif ($tam == 'thongtin') {
            include("main/thongtin.php");
        }
        elseif ($tam == '24h') {
            include("main/24h.php");
        }
        elseif ($tam == 'sanpham') {
            include("main/sanpham.php");   
        }
        elseif ($tam == 'giohang') {
            include("main/giohang.php");   
        }
        elseif ($tam == 'diachi') {
            include("main/diachi.php");   
        }
        elseif ($tam == 'thanhtoan') {
            include("main/thanhtoan.php");   
        }
        elseif ($tam == 'dangky') {
            include("main/dangky.php");   
        }
        elseif ($tam == 'dangnhap') {
            include("main/dangnhap.php");   
        }
        elseif ($tam == 'thaydoimatkhau') {
            include("main/thaydoimatkhau.php");   
        }
        elseif ($tam == 'timkiem') {
            include("main/timkiem.php");   
        }
        else{
            include("main/index.php");
        }
      ?>
</div>