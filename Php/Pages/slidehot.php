<section id="Slider">
    <div class="aspect-ratio-169">
        <img src="../../Admin/modules/quanlysp/uploads/1671517183_odyssey_ark_1.jpg">
        <img src="../../Admin/modules/quanlysp/uploads/1669580926_favicon.png">
        <img src="../../Admin/modules/quanlysp/uploads/1669581047_cute hello.gif">
        <img src="../../Admin/modules/quanlysp/uploads/1670858611_asus_1.jpg">
    </div>
    <div class="dot-container">
        <div class="dot active"></div>
        <div class="dot"></div>
        <div class="dot"></div>
        <div class="dot"></div>
    </div>
</section>

<section class="product">
    <h2 style="color: rgb(252, 9, 41);text-decoration: underline;" class="product-category">Sản Phẩm HOT Nhất</h2>
    <button class="pre-btn"><img src="../../Img/arrow.png" alt=""></button>
    <button class="nxt-btn"><img src="../../Img/arrow.png" alt=""></button>

    <!-- Products Hot -->
    <div class="product-container">
        <?php 
            $sql_slide = "SELECT * FROM tbl_sanpham, tbl_danhmuc 
            WHERE tbl_sanpham.id_danhmuc=tbl_danhmuc.id_danhmuc 
            -- ORDER BY id_sanpham DESC
            LIMIT 10";
            $query_slide = mysqli_query($mysqli, $sql_slide);
            while($row_slide = $query_slide -> fetch_array()){
        ?>
        <div class="product-card">
            <div class="product-image">
                <a href="/Php/index.php?quanly=sanpham&id=<?php echo $row_slide['id_sanpham'] ?>"><span class="discount-tag">5% off</span>
                <img style="height: 200px; width: 100%; margin-top: 60px;" src="../../Admin/modules/quanlysp/uploads/<?php echo $row_slide['hinhanh']?>" class="product-thumb" alt="">
                <button class="card-btn">Mua Ngay</button></a>
            </div>
            <div class="product-info">
                <h2 class="product-brand"><?php echo $row_slide['tendanhmuc'].' '.$row_slide['tensanpham'] ?></h2>
                <p class="product-short-description"><?php echo $row_slide['tensanpham'].' '.$row_slide['tomtat'] ?></p>
                <span class="price" style="font-weight: bold;"><?php 
                $giadagiam = $row_slide['giasp'] - $row_slide['giasp'] * 5/100;
                echo number_format($giadagiam,0,',','.').'₫'
                ?>
                </span>
                <span class="actual-price"><?php echo number_format($row_slide['giasp'],0,',','.').'₫'?></span>
            </div>
        </div>
        <?php 
            }
        ?>
    </div>
</section>