<?php 
    $id = $_GET['id'];
    $sql_chitiet = "SELECT * FROM tbl_sanpham, tbl_danhmuc 
                WHERE tbl_sanpham.id_danhmuc=tbl_danhmuc.id_danhmuc
                AND tbl_sanpham.id_sanpham = '$id'
                LIMIT 1";
    $query_chitiet = mysqli_query($mysqli, $sql_chitiet);
    while($row_chitiet = $query_chitiet -> fetch_array()){
?> 
<!-- Chi tiết product -->
<section class="product" style="text-align: start;">
    <div class="container">
        <div class="product-top">
            <p style="font-size: xx-large;">Chi tiết sản phẩm</p>
        </div>
        <div class="product-content row">
            <div class="product-content-left row">
                <div class="product-content-left-big-img">
                    <img width="100%" src="../../../Admin/modules/quanlysp/uploads/<?php echo $row_chitiet['hinhanh']?>">
                </div>
                <div class="product-content-left-small-img">
                    <img width="100%" src="../../../Admin/modules/quanlysp/uploads/<?php echo $row_chitiet['hinhanh']?>">
                    <img width="100%" src="../../../Admin/modules/quanlysp/uploads/<?php echo $row_chitiet['hinhanh']?>">
                    <img width="100%" src="../../../Admin/modules/quanlysp/uploads/<?php echo $row_chitiet['hinhanh']?>">
                    <img width="100%" src="../../../Admin/modules/quanlysp/uploads/<?php echo $row_chitiet['hinhanh']?>">
                    <img width="100%" src="../../../Admin/modules/quanlysp/uploads/<?php echo $row_chitiet['hinhanh']?>">
                </div>
            </div>
            <div class="product-content-right">
                <div class="product-content-right-product-name">
                    <h1><?php echo $row_chitiet['tensanpham'].' '.$row_chitiet['masp'].' '.$row_chitiet['tomtat'] ?></h1>
                </div>
                <div class="product-content-right-product-price">
                    <span style="margin-right: 10px; font-size: 30px; color: #000099;"><?php echo number_format($row_chitiet['giasp'],0,',','.')." ₫"?></span>
                    <span style="text-decoration: line-through;"><?php echo number_format($row_chitiet['giasp'],0,',','.')." ₫" ?></span><br>
                </div>
                <div class="product-content-right-product-color">
                    <h5><span>Màu sắc </span>: Xám<span style="color: red;"> *</span></h5><br>
                    <h5><span>Tình trạng: </span>
                    <?php 
                        if($row_chitiet['tinhtrang'] == 1){
                            echo "Còn Hàng";
                        }else{
                            echo "Hết Hàng";
                        } 
                        ?>
                    <span style="color: red;"> *</span></p><br>
                        <br>
                </div>
                <div class="product-content-right-product-size">
                    <p style="font-weight: bold;">Dung lượng: </p><br>
                    <div style="margin-left: 30px;" class="size">
                        <input type="radio" name="dl">
                        <span>8GB </span>
                        <input type="radio" name="dl" style="margin-left: 20px;">
                        <span>16GB</span>
                    </div>
                    <br>
                    <p style="font-weight: bold;">Bộ Nhớ: </p><br>
                    <div style="margin-left: 30px;" class="size">
                        <input type="radio"name="bn">
                        <span>128GB</span>
                        <input type="radio" name="bn" style="margin-left: 20px;">
                        <span>256GB</span>
                        <input type="radio"name="bn" style="margin-left: 20px;">
                        <span>512GB</span>
                        <input type="radio"name="bn" style="margin-left: 20px;">
                        <span>1TB</span>
                    </div>
                </div>
                <div class="quantity"><br>
                    <label for="" style="font-weight: bold;">Số lượng :</label>
                    <input type="number" style="width: 6%;" min="1" value="1">
                </div>
<!-- Mua Hàng/Thêm Giỏ Hàng -->
            <?php
            if($row_chitiet['tinhtrang'] == 1){
            ?>
                <div class="product-content-right-product-button"><br>
                    <form method="POST" action="Pages/main/themgiohang.php?idsanpham=<?php echo $row_chitiet['id_sanpham'] ?>">
                        <i class="fas fa-cart-plus" style="position: relative; top: 30px; left: 18px;"></i>
                        <input name="themgiohang" type="submit" style="font-size: 13px; font-weight: bold;" value="Thêm Vào Giỏ">
                    </form>
                    <form method="POST" action="Pages/main/themgiohang.php?idsanpham=<?php echo $row_chitiet['id_sanpham'] ?>">
                        <i class="fas fa-shopping-cart" style="position: relative; top: 30px; left: 30px;"></i>
                        <input name="muahang" type="submit" style="font-size: 13px; font-weight: bold;" value="Mua Hàng">
                    <form>
                </div>
            <?php
                }else{
            ?>
            <div class="product-content-right-product-button"><br>
            <h1 style=" color: red; ">Hiện tại đã hết hàng *</h1><br>
                <form class="buy-in" action="../../../Php/index.php" method="POST">
                    <input type="submit" value="Tiếp tục mua sắm" style="padding: 0; font-size: 13px; font-weight: bold; margin-left: 33px">
                </form>
            </div>
                    
            <?php
                }
            ?>
                <div class="product-content-right-product-icon">
                    <div class="product-content-right-product-icon-item">
                        <i class="fa-solid fa-phone"> Hotline</i>
                    </div>
                    <div class="product-content-right-product-icon-item">
                        <i class="fa-solid fa-comments"> Messenger</i>
                    </div>
                    <div class="product-content-right-product-icon-item">
                        <i class="fa-solid fa-envelope"> Mail</i>
                    </div>
                </div>
                <div class="product-content-right-bottom">
                    <div class="product-content-right-bottom-top">
                        &#8744;
                    </div>
                </div>
                <div class="product-content-right-bottom-content-big">
                    <div class="product-content-right-bottom-content-title row">
                        <div class="product-content-right-bottom-content-title-item thongtin">
                            <p>Thông tin chi tiết</p>
                        </div>
                        <div class="product-content-right-bottom-content-title-item thongso">
                            <p>Thông số kỹ thuật</p>
                        </div>
                    </div>
                    <div class="product-content-right-bottom-content">
                        <div class="product-content-right-bottom-content-thongtin">
                            <table style="width: 100%;">
                                <tr id="le">
                                    <td>- CPU </td>
                                    <td>Apple M1</td>
                                </tr>
                                <tr>
                                    <td>- Màn hình </td>
                                    <td>13.3", Retina (2560 x 1600)</td>
                                </tr>
                                <tr id="le">
                                    <td>- RAM </td>
                                    <td>8 GB</td>
                                </tr>
                                <tr>
                                    <td>- Đồ họa </td>
                                    <td>Card tích hợp, 7 nhân GPU</td>
                                </tr>
                                <tr id="le">
                                    <td>- Lưu trữ </td>
                                    <td>256 GB SSD</td>
                                </tr>
                                <tr>
                                    <td>- Hệ điều hành </td>
                                    <td>Mac OS</td>
                                </tr>
                                <tr id="le">
                                    <td>- Pin </td>
                                    <td>Khoảng 10 tiếng</td>
                                </tr>
                                <tr>
                                    <td>- Khối lượng </td>
                                    <td>1.29 kg</td>
                                </tr>
                            </table>
                        </div>
                        <div class="product-content-right-bottom-content-thongso">
                            <table>
                                <tr id="le">
                                    <td colspan="2" style="text-align: center; font-size: medium;">Apple</td>
                                    
                                </tr>
                                <tr id="chan">
                                    <td>Bảo hành</td>
                                    <td>12 tháng</td>
                                </tr>
                                <tr id="le">
                                    <td>Thông tin chung :</td>
                                    <td></td>
                                </tr>
                                <tr id="chan">
                                    <td>Series laptop</td>
                                    <td>Modern Series</td>
                                </tr>
                                <tr id="le">
                                    <td>Part-number</td>
                                    <td>204VN</td>
                                </tr>
                                <tr id="chan">
                                    <td>Màu sắc</td>
                                    <td>Xám</td>
                                </tr>
                                <tr id="le">
                                    <td>Thế hệ CPU</td>
                                    <td>Ryzen 5</td>
                                </tr>
                                <tr id="chan">
                                    <td>CPU</td>
                                    <td>AMD Ryzen 5 5500U ( 2.1 GHz - 4.0 GHz / 8MB / 6 nhân, 12 luồng )</td>
                                </tr>
                                <tr id="le">
                                    <td>Chip đồ họa</td>
                                    <td>AMD Radeon Graphics</td>
                                </tr>
                                <tr id="chan">
                                    <td>RAM</td>
                                    <td>1 x 8GB DDR4 3200MHz ( 2 Khe cắm / Hỗ trợ tối đa 64GB )</td>
                                </tr>
                                <tr id="le">
                                    <td>Màn hình</td>
                                    <td>14" ( 1920 x 1080 ) IPS không cảm ứng , HD webcam</td>
                                </tr>
                                <tr id="chan">
                                    <td>Lưu trữ</td>
                                    <td>512GB SSD M.2 NVMe</td>
                                </tr>
                                <tr id="le">
                                    <td>Số cổng lưu trữ tối đa</td>
                                    <td>1 x M.2 NVMe</td>
                                </tr>
                                <tr id="chan">
                                    <td>Kiểu khe M.2 hỗ trợ</td>
                                    <td>1 x M.2 NVMe</td>
                                </tr>
                                <tr id="le">
                                    <td>Kiểu khe M.2 hỗ trợ</td>
                                    <td>M.2 NVMe</td>
                                </tr>
                                <tr id="chan">
                                    <td>Cổng xuất hình</td>
                                    <td>1 x HDMI</td>
                                </tr>
                                <tr id="le">
                                    <td>Cổng kết nối</td>
                                    <td>1 x USB 3.2 Type C , 2 x USB 3.2 , 1 x micro SD card slot</td>
                                </tr>
                                <tr id="chan">
                                    <td>Kết nối không dây</td>
                                    <td>WiFi 802.11ax (Wifi 6) , Bluetooth 5.2</td>
                                </tr>
                                <tr id="le">
                                    <td>Bàn phím</td>
                                    <td>Thường , không phím số , LED</td>
                                </tr>
                                <tr id="chan">
                                    <td>Hệ điều hành</td>
                                    <td>Windows 11 Home</td>
                                </tr>
                                <tr id="le">
                                    <td>Kích thước</td>
                                    <td>31.9 x 21.9 x 1.69 cm</td>
                                </tr>
                                <tr id="chan">
                                    <td>Pin</td>
                                    <td>3 cell Pin liền</td>
                                </tr>
                                <tr id="le">
                                    <td>Khối lượng</td>
                                    <td>1.3 kg</td>
                                </tr>
                                <tr id="chan">
                                    <td>Thông tin khác :</td>
                                    <td></td>
                                </tr>
                                <tr id="le">
                                    <td>Đèn LED trên máy</td>
                                    <td>Không đèn</td>
                                </tr>
                                <tr id="chan">
                                    <td>Phụ kiện đi kèm</td>
                                    <td>Adapter, dây nguồn</td>
                                </tr>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
    }
?>
<!-- sản phẩm liên quan -->
<section class="product-related">
    <div class="product-related-title">
        <p>SẢN PHẨM LIÊN QUAN</p>
    </div>
    <div style="display: flex;" class="product-content">
        <div class="product-related-item">
            <img src="https://cdn.tgdd.vn/Products/Images/44/270920/asus-zenbook-ux482ea-i5-1135g7-8gb-512gbtouch-600x600.jpg" alt="">
            <h1>Asus ZenBook</h1>
            <span style="margin-right: 10px; font-size: 20px; font-weight: bold; color: #000099;">49.490.000₫</span><span style="text-decoration: line-through;">49.990.000₫</span>
        </div>
        <div class="product-related-item">
            <img src="https://cdn.tgdd.vn/Products/Images/44/255618/asus-zenbook-ux482ea-i5-ka274t-271021-093120-600x600.jpg" alt="">
            <h1>Asus ZenBook Duo</h1>
            <span style="margin-right: 10px; font-size: 20px; font-weight: bold; color: #000099;">31.490.000₫</span><span style="text-decoration: line-through;">32.990.000₫</span>
        </div>
        <div class="product-related-item">
            <img src="https://cdn.tgdd.vn/Products/Images/44/281483/asus-vivobook-15-x1502za-i5-ej120w-600x600.jpg" alt="">
            <h1>Asus Vivobook</h1>
            <span style="margin-right: 10px; font-size: 20px; font-weight: bold; color: #000099;">17.690.000₫</span><span style="text-decoration: line-through;">17.990.000₫</span>
        </div>
        <div class="product-related-item">
            <img src="https://cdn.tgdd.vn/Products/Images/44/259620/asus-zenbook-flip-ux363ea-i5-hp726w-151121-043132-600x600.jpg" alt="">
            <h1>Asus ZenBook Flip</h1>
            <span style="margin-right: 10px; font-size: 20px; font-weight: bold; color: #000099;">25.490.000₫</span><span style="text-decoration: line-through;">25.990.000₫</span>
        </div>
        <div class="product-related-item">
            <img src="https://cdn.tgdd.vn/Products/Images/44/274918/asus-tuf-gaming-fx706hc-i5-hx105w-190322-025532-600x600.jpg" alt="">
            <h1>Asus TUF Gaming</h1>
            <span style="margin-right: 10px; font-size: 20px; font-weight: bold; color: #000099;">22.490.000₫</span><span style="text-decoration: line-through;">24.490.000₫</span><span> -8%</span>
        </div>
    </div>
</section>
<script src="/Js/sanpham.js"></script>

