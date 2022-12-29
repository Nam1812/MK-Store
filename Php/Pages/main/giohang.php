<section class="cart">
        <h5 style="margin-left: 160px;">Xin Chào
        <?php
            if(isset($_SESSION['dangky'])){
                echo '<span style="color: red">'.$_SESSION['dangky'].'</span>';
            }
        ?>
    </h5>
        <div class="container">
            <div class="cart-top-wrap">
                <div class="cart-top">
                    <div class="cart-top-cart cart-top-item">
                        <i class="fas fa-shopping-cart"></i>
                    </div>
                    <div class="cart-top-adress cart-top-item">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <div class="cart-top-payment cart-top-item">
                        <i class="fas fa-money-check-alt"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="cart-content row">
                <div class="cart-content-left">
                    <table>
                        <tr>
                            <th>Sản phẩm</th>
                            <th>Id</th>
                            <th>Tên sản phẩm</th>
                            <th>Mã sản phẩm</th>
                            <th>Số lượng</th>
                            <th>Thành tiền</th>
                            <th>Xóa</th>
                            
                        </tr>
                        <?php
                            $tongtien = 0;
                            $tongsl = 0;
                        if(isset($_SESSION['cart'])){
                            $i = 0;
                            foreach($_SESSION['cart'] as $cart_item){
                            $thanhtien = $cart_item['soluong'] * $cart_item['giasp'];
                            $tongtien += $thanhtien;
                            $tongsl += $cart_item['soluong'];
                            $i++;
                        ?>
                        <tr>
                            <td><img src="../../../Admin/modules/quanlysp/uploads/<?php echo $cart_item['hinhanh']?>"></td>
                            <td><?php echo $i ?></td>
                            <td>
                                <p><?php echo $cart_item['tensanpham']?></p>
                            </td>
                            <td><?php echo $cart_item['masp']?></td>
                            <td>
                                <!-- Trừ sản phẩm -->
                                <a href="/Php/Pages/main/themgiohang.php?tru=<?php echo $cart_item['id']?>">
                                <i class="fa fa-minus fa-style"></i>
                                </a>
                                <?php 
                                echo $cart_item['soluong']
                                ?>
                                <!-- Thêm sản phẩm -->
                                <a href="/Php/Pages/main/themgiohang.php?cong=<?php echo $cart_item['id']?>">
                                <i class="fa fa-plus fa-style"></i>
                                </a>
                            </td>
                            <td>
                                <p><?php echo number_format($cart_item['giasp'],0,',','.')?> <sub>đ</sub></p>
                            </td>
                            <td>
                                <a href="/Php/Pages/main/themgiohang.php?xoa=<?php echo $cart_item['id']?>">
                                <i class="fa-solid fa-trash fa-style"></i>
                            </a>
                            </td>
                        </tr>
                        
                        <?php
                            }
                        ?>
                        <tr>
                            <td colspan="7">
                                <p style="float: right;"><a class="fa-style"href="/Php/Pages/main/themgiohang.php?xoatatca=1">
                                <i class="fa-solid fa-trash"></i>
                                Xóa tất cả
                                </a></p>
                            </td>
                        </tr>
                        <?php
                            } else{
                        ?>
                        <tr>
                            <td colspan="7">Hiện tại giỏ hàng trống</td>
                        </tr>
                        <?php 
                        }
                        ?>
                    </table>
                </div>
                <div class="cart-content-right">
                    <table>
                    <?php
                        if($tongsl != 0 && $tongtien != 0){
                    ?>
                        <tr>
                            <th colspan="2">Tổng tiền giỏ hàng</th>
                        </tr>
                        <tr>
                            <td>Tổng sản phẩm</td>
                            <td><?php echo $tongsl?></td>
                        </tr>
                        <tr>
                            <td>Tổng tiền hàng</td>
                            <td>
                                <p><?php echo number_format($tongtien,0,',','.')?> <sub>đ</sub></p>
                            </td>
                        </tr>
                        <tr>
                            <td>Tạm tính</td>
                            <td>
                                <p style="color: black; font-weight: bold;"><?php echo number_format($tongtien,0,',','.')?> <sub>đ</sub></p>
                            </td>
                        </tr>
                        <?php 
                        }
                        ?>
                    </table>
                    <div class="cart-content-right-text">
                        <p>Bạn sẽ được miễn phí ship khi đơn hàng trên 2.000.000 đ</p>
                        <?php
                        if($tongtien >= 2000000){
                        ?> 
                            <p style="color: blue; font-weight: bold; font-size: 15px;">Bạn được miễn phí ship</p>
                        <?php 
                        }else{
                            $themtien = 2000000 - $tongtien;
                        ?>
                            <p style="color: red; font-weight: bold;">Mua thêm 
                            <span style="font-size: 18px;"><?php echo number_format($themtien,0,',','.') ?></span> để được miễn phí ship
                        </p>
                        <?php
                        }
                        ?>
                    </div>
                    <div class="cart-content-right-botton">
                    <!-- Tiếp tục mua -->
                        <form class="buy-in" action="../../../Php/index.php" method="POST">
                            <input type="submit" value="Tiếp tục mua sắm" style="position: relative; right: 30px">
                        </form>
                    <!-- Thanh toán  -->
                        <?php
                            if(isset($_SESSION['dangky'])){
                                if(isset($_SESSION['cart'])){
                        ?>
                                    <form class="buy-in" action="/Php/index.php?quanly=diachi" method="POST">
                                        <input type="submit" value="Đặt Hàng" style="position: relative; left: 100px; bottom: 35px;">
                                    </form>  
                                <?php
                                } else{
                                ?>
                                    <p class="messen-empty">Giỏ Hàng Trống Không Thể Thanh Toán</p>
                                <?php 
                                }
                                ?>
                                
                        <?php
                            } else{ 
                        ?>
                                <form class="buy-in" action="index.php?quanly=dangky" method="POST">
                                    <input type="submit" value="Đăng Ký Đặt Hàng" style="position: relative; left: 100px; bottom: 35px;">
                                </form>
                        <?php
                            }
                        ?>
                    </div>
                    <?php
                            if(isset($_SESSION['dangky'])){
                        ?>
                            <div class="cart-content-right-dangnhap">
                                <p style="color: rgb(216, 106, 10)">Tài khoản của
                                    <?php 
                                        echo $_SESSION['dangky'];
                                    ?>
                                </p> <br>
                                <p></p>
                            </div>
                        <?php
                            } else{   
                        ?>
                            <div class="cart-content-right-dangnhap">
                                <p>Tài khoản Mk Store</p> <br>
                                <p>Hãy <a href="/Php/index.php?quanly=dangnhap" style="color: rgb(216, 106, 10);">Đăng nhập</a> tài khoản của bạn để tích lũy thành viên </p>
                            </div>
                        <?php
                            }
                        ?>
                    
                </div>
            </div>
        </div>
    </section>

