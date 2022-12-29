<?php 
    if(isset($_GET['trang'])){
        $page = $_GET['trang'];
    }else{
        $page = 1;
    }
    if($page == '' || $page == 1){
        $begin = 0;
    }else{
        $begin = ($page*5)-5;
    }
    $sql_pro = "SELECT * FROM tbl_sanpham, tbl_danhmuc 
                WHERE tbl_sanpham.id_danhmuc=tbl_danhmuc.id_danhmuc
                ORDER BY tbl_sanpham.id_sanpham DESC LIMIT $begin,5";
    $query_pro = mysqli_query($mysqli, $sql_pro);
?>
<!-- Sản phẩm -->
<h1 >Sản Phẩm Mới Nhất</h1>
<div class="align-center" style="display: inline-block!important;">
    <div class="row1">
        <?php 
            while($row = $query_pro -> fetch_array()){
        ?>
        <div class="col-33">
            <a href="/Php/index.php?quanly=sanpham&id=<?php echo $row['id_sanpham'] ?>">
                <img src="../../../Admin/modules/quanlysp/uploads/<?php echo $row['hinhanh']?>" style="width: 100%">
                <p style="font-weight: bold; font-size: 25px; margin-top: 10px;"><?php echo $row['tensanpham']?></p>
                <p style="font-size: 20px;" class="price">
                    <?php echo number_format($row['giasp'],0,',','.').' ₫'?>
                </p>
                <p style="font-size: 20px; color: #d1d1d1;" class="price"><?php echo $row['tendanhmuc']?></p>
            </a>
        </div>
        <?php
        }  
        ?>
    </div>
    <div style="clear: both;"></div>
<!-- Phân trang -->
    <ul class="trang">
        <?php
            $sql_trang = "SELECT * FROM tbl_sanpham ";
            $query_trang = mysqli_query($mysqli, $sql_trang);
            $row_count = $query_trang -> num_rows;
            $trang = ceil($row_count/5);
            if($trang != 0){
        ?>
        
        <p >Trang hiện tại: <?php echo $page ?>/<?php echo $trang ?></p>
        
        <?php
            }else{
        ?>
        <p style="text-align: center;font-weight: bold; font-size: 30px; color: chocolate">Hiện tại hết hàng. Mong quý khách thông cảm</p>
        <?php
        }
        ?>
        <?php
            for($i = 2;$i <= $trang;$i++){
        ?>
        <li class="list_trang">
            <a <?php if($i == $page){echo 'style="background:brown; color:rgb(237, 231, 231)"';}else{echo '';} ?> href="index.php?trang=<?php echo $i?>"><?php echo $i ?></php></a></li>
        <?php
        }
        ?>
    </ul>    
</div>