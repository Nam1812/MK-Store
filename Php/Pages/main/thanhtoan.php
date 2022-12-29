<!-- ship -->
<section class="payment">
    <div class="container">
        <div class="payment-top-wrap">
            <div class="payment-top">
                <div class="payment-top-payment payment-top-item">
                    <i class="fas fa-shopping-cart"></i>
                </div>
                <div class="payment-top-adress payment-top-item">
                    <i class="fas fa-map-marker-alt"></i>
                </div>
                <div class="payment-top-paymentt payment-top-item">
                    <i class="fas fa-money-check-alt"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="payment-content row">
            <div class="payment-content-left">
                <div class="payment-content-left-method-delivery">
                    <p style="font-weight: bold;">Phương thức giao hàng</p>
                    <div class="payment-content-left-method-delivery-item">
                        <input checked type="radio" name="giaohang">
                        <label for="">Giao hàng chuyển phát nhanh</label>
                        <br>
                        <input checked type="radio" name="giaohang">
                        <label for="">Nhận tại cửa hàng gần nhất</label>
                    </div>
                </div>
                <div class="payment-content-left-method-payment">
                    <p style="font-weight: bold;">Phương thức thanh toán</p>
                    <p>Mọi giao dịch đều được bảo mật và mã hóa. Thông tin của thẻ tín dụng sẽ không bao giờ lưu lại</p>
                    <div class="payment-content-left-method-payment-item">
                        <input name="method-payment" type="radio">
                        <label for="">Thanh toán bằng thẻ tín dụng(OnePay)</label>
                    </div>
                    <div class="payment-content-left-method-payment-item-img">
                        <img src="https://pubcdn.ivymoda.com/ivy2/images/1.png" alt="">
                    </div>
                    <div class="payment-content-left-method-payment-item">
                        <input name="method-payment" type="radio">
                        <label for="">Thanh toán bằng thẻ ATM(OnePay)</label>
                    </div>
                    <div class="payment-content-left-method-payment-item">
                        <input name="method-payment" type="radio">
                        <label for="">Thanh toán bằng Momo</label>
                    </div>
                    <div class="payment-content-left-method-payment-item">
                        <input checked name="method-payment" type="radio">
                        <label for="">Thanh toán khi nhận hàng</label>
                    </div>
                </div>
            </div>
            <div class="payment-content-right">
                <div class="payment-content-right-button">
                    <input type="text" placeholder="Mã giảm giá">
                    <button><i class="fas fa-check"></i></button>
                </div>
                <div class="payment-content-right-button">
                    <input type="text" placeholder="Mã cộng tác viên">
                    <button><i class="fas fa-check"></i></button>
                </div>
                <div class="payment-content-right-mnv">
                    <select name="" id="">
                        <option value="">Chọn mã nhân viên thân thiết</option>
                        <option value="">D345</option>
                        <option value="">A345</option>
                        <option value="">B345</option>
                        <option value="">C345</option>
                    </select>
                </div>
                <table style="margin-top: 20px">
                    <tr>
                        <th>Id</th>
                        <th>Tên Sản Phẩm</th>
                        <th>Mã sp</th>
                        <th>Số Lượng</th>
                        <th>Thành Tiền</th>
                    </tr>
                    <?php
                        $tongtien = 0;
                        $tongsl = 0;
                        $thuevat;
                        $tong = 0;
                        $ship = 0;
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
                        <td style="font-weight: bold; font-size: 15px;">
                            <p><?php echo number_format($tong,0,',','.')?><sup>đ</sup></p>
                        </td>
                    </tr>
                    <?php
                        if($tongtien > 2000000){
                    ?>
                    <tr>
                        <td style="font-weight: bold; font-size: 15px;" colspan="4">Giao hàng chuyển phát nhanh</td>
                        <td style="font-weight: bold; font-size: 15px;">
                            <p><?php 
                                echo number_format($ship,0,',','.')
                            ?>
                            <sup>đ</sup></p>
                        </td>
                    </tr>
                    <?php
                        }else{
                    ?>
                        <td style="font-weight: bold; font-size: 15px;" colspan="4">Giao hàng chuyển phát nhanh</td>
                        <td style="font-weight: bold; font-size: 15px;">
                            <p>
                            <?php 
                                $ship += 50000;
                                echo number_format($ship,0,',','.');
                            ?>
                            <sup>đ</sup></p>
                        </td>
                    <?php
                        }
                    ?>
                    <tr>
                        <td style="font-weight: bold; font-size: 15px;" colspan="4">Tiền thanh toán</td>
                        <td style="font-weight: bold; font-size: 15px;">
                            <p>
                            <?php
                                $tong += $ship;
                                echo number_format($tong,0,',','.');
                            ?>
                            <sup>đ</sup></p>
                        </td>
                    </tr>
                    
                </table>
            </div>
        </div>
        <div class="payment-content-right-payment">
            <form action="/Php/index.php" method="POST">
                <input type="submit" name="thanhtoan" value="Thanh Toán">
            </form>
        </div>
    </div>
</section>
<!-- end ship -->