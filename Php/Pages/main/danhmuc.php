<?php 
    $id = $_GET['id'];
    $sql_pro = "SELECT * FROM tbl_sanpham 
                WHERE tbl_sanpham.id_danhmuc = '$id'
                ORDER BY id_sanpham DESC";
    $query_pro = mysqli_query($mysqli, $sql_pro);
    $row_count = $query_pro -> num_rows;

    //Lấy tên danh mục
    $sql_cate = "SELECT * FROM tbl_danhmuc 
                WHERE tbl_danhmuc.id_danhmuc = '$id'
                LIMIT 1";
    $query_cate = mysqli_query($mysqli, $sql_cate);
    $row_title = $query_cate -> fetch_array();
?> 
<h1><?php echo $row_title['tendanhmuc']?></h1>
<div class="align-center" style="display: inline-block!important;">
    <div class="row1">
        <?php 
            if($row_count > 0){
            while($row_pro = $query_pro -> fetch_array()){
        ?>
        <div class="col-33">
            <a href="/Php/index.php?quanly=sanpham&id=<?php echo $row_pro['id_sanpham'] ?>">
            <img src="../../../Admin/modules/quanlysp/uploads/<?php echo $row_pro['hinhanh']?>" style="width: 100%">
                <p style="font-weight: bold; font-size: 25px; margin-top: 10px;"><?php echo $row_pro['tensanpham']?></p>
                <span style="font-size: 20px;" class="price">
                    <?php echo number_format($row_pro['giasp'],0,',','.').'vnd'?>
                </span>
            </a>
        </div>
        <?php
        }   
        ?>
        <?php
        } else{
        ?>
            <p style="font-weight: bold; font-size: 25px; color: chocolate; margin-left: 400px;">Hiện tại không có hàng bạn tìm kiếm. Mong quý khách thông cảm</p>
        <?php
            }
        ?>
    </div>      
</div>