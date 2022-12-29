<?php
?>
<!-- payment -->
<section class="delivery">
    <div class="container">
        <div class="delivery-top-wrap">
            <div class="delivery-top">
                <div class="delivery-top-delivery delivery-top-item">
                    <i class="fas fa-shopping-cart"></i>
                </div>
                <div class="delivery-top-adress delivery-top-item">
                    <i class="fas fa-map-marker-alt"></i>
                </div>
                <div class="delivery-top-payment delivery-top-item">
                    <i class="fas fa-money-check-alt"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="delivery-content row">
            <div class="delivery-content-left">
                <div class="delivery-content-left-input-top row">
                    <div class="delivery-content-left-input-top-item">
                        <label for="">Họ tên <span style="color: red;">*</span></label>
                        <input type="text">
                    </div>
                    <div class="delivery-content-left-input-top-item">
                        <label for="">Điện thoại <span style="color: red;">*</span></label>
                        <input type="text">
                    </div>
                    <div class="delivery-content-left-input-top-item">
                        <label for="">Tỉnh/Tp <span style="color: red;">*</span></label>
                        <input type="text">
                    </div>
                    <div class="delivery-content-left-input-top-item">
                        <label for="">Quận/Huyện <span style="color: red;">*</span></label>
                        <input type="text">
                    </div>
                </div>
                <div class="delivery-content-left-input-top-bottom">
                    <label for="">Địa chỉ <span style="color: red;">*</span></label>
                    <input type="text">
                </div>
                <div class="delivery-content-left-input-top-bottom">
                    <label for="">Ghi chú <span style="color: red;">*</span></label>
                    <input type="text">
                </div>
                <div class="delivery-content-left-button row">
                    <a href="/Php/index.php?quanly=giohang"><span>&#171;</span> Quay lại giỏ hàng</a>
                    <a href="/Php/index.php?quanly=thanhtoan"><button><p style="font-weight: bold;">THANH TOÁN VÀ GIAO HÀNG</p></button></a>
                </div>
            </div>
            <div class="delivery-content-right">
                <table>
                    <tr>
                        <th>Id</th>
                        <th>Tên Sản Phẩm</th>
                        <th>Mã Sản Phẩm</th>
                        <th>Số Lượng</th>
                        <th>Thành Tiền</th>
                    </tr>
                    <?php
                        $tongtien = 0;
                        $tongsl = 0;
                        $thuevat;
                        $tong = 0;
                    if(isset($_SESSION['cart'])){
                        $i = 0;
                        foreach($_SESSION['cart'] as $cart_item){
                        $tongsl += $cart_item['soluong'];
                        $thanhtien = $cart_item['soluong'] * $cart_item['giasp'];
                        $thuevat = $thanhtien * 10/100;
                        $tongtien += $thanhtien;
                        $tong = $thuevat + $tongtien;
                        $i++;
                    ?>
                    <tr>
                        <td><?php echo $i?></td>
                        <td><?php echo $cart_item['tensanpham']?></td>
                        <td><?php echo $cart_item['masp']?></td>
                        <td><?php echo $cart_item['soluong']?></td>
                        <td><?php echo number_format($thanhtien,0,',','.')?><sup>đ</sup></p></td>
                    </tr>
                    <?php
                        }
                    }
                        ?>
                    <tr>
                        <td style="font-weight: bold; font-size: 15px;" colspan="4">Tổng</td>
                        <td style="font-weight: bold; font-size: 15px;"><p><?php echo number_format($tongtien,0,',','.')?><sup>đ</sup></p></td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold; font-size: 15px;" colspan="4">Thuế VAT</td>
                        <td style="font-weight: bold; font-size: 15px;"><p><?php echo number_format($thuevat,0,',','.')?><sup>đ</sup></p></td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold; font-size: 15px;" colspan="4   ">Tổng tiền hàng</td>
                        <td style="font-weight: bold; font-size: 15px;"><p><?php echo number_format($tong,0,',','.')?><sup>đ</sup></p></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</section>
<!-- end payment  -->