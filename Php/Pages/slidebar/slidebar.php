<?php
    $sql_danhmuc = "SELECT * FROM tbl_danhmuc ORDER BY id_danhmuc ASC";
    $query_danhmuc = mysqli_query($mysqli, $sql_danhmuc);
?>
<div class="menu">
    <li> <a href="/Php/index.php">Trang chủ</a></li>
    <li> <b style="font-size: 14px; cursor: pointer;">Danh mục sản phẩm</b>
        <ul class="sub-menu">
            <?php
            while($row_danhmuc = $query_danhmuc -> fetch_array()){
            ?>  
                <li> <a href="/Php/index.php?quanly=danhmucsanpham&id=<?php echo $row_danhmuc['id_danhmuc'] ?>">
                    <?php echo $row_danhmuc['tendanhmuc']?></a> </li>
            <?php 
            }
            ?>
        </ul>
    </li>
    <li><a href="/Php/index.php?quanly=phukien">Phụ kiện</a></li>
    <li><a href="/Php/index.php?quanly=maycu">Máy cũ giá rẻ</a></li>
    <li><a href="/Php/index.php?quanly=24h">24h Công nghệ</a></li>
</div>