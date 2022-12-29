<?php  
    session_start();
    include("../../../Admin/config/config.php");
    //Thêm số lượng
    if(isset($_GET['cong'])){
        $id = $_GET['cong'];
        foreach($_SESSION['cart'] as $cart_item){
            print_r($_SESSION['cart']);
            if($cart_item['id']!=$id){
                $product[] = array('tensanpham'=>$cart_item['tensanpham'], 'id'=>$cart_item['id'], 
                        'soluong'=>$cart_item['soluong'], 'giasp'=>$cart_item['giasp'], 
                        'hinhanh'=>$cart_item['hinhanh'], 'masp'=>$cart_item['masp'], 'tomtat' => $row_addgio['tomtat']);
                        $_SESSION['cart'] = $product;
            }else{
                if($cart_item['soluong'] < 10){
                    $tangsl = $cart_item['soluong'] + 1;
                    $product[] = array('tensanpham'=>$cart_item['tensanpham'], 'id'=>$cart_item['id'], 
                        'soluong'=>$tangsl, 'giasp'=>$cart_item['giasp'], 
                        'hinhanh'=>$cart_item['hinhanh'], 'masp'=>$cart_item['masp'], 'tomtat' => $row_addgio['tomtat']);
                        $_SESSION['cart'] = $product;
                }else{
                    $product[] = array('tensanpham'=>$cart_item['tensanpham'], 'id'=>$cart_item['id'], 
                        'soluong'=>$cart_item['soluong'], 'giasp'=>$cart_item['giasp'], 
                        'hinhanh'=>$cart_item['hinhanh'], 'masp'=>$cart_item['masp'], 'tomtat' => $row_addgio['tomtat']);
                }
                $_SESSION['cart'] = $product;
            } 
        }
        header('Location:../../index.php?quanly=giohang');
    }
    //Trừ số lượng
    if(isset($_GET['tru'])){
        $id = $_GET['tru'];
        foreach($_SESSION['cart'] as $cart_item){
            print_r($_SESSION['cart']);
            if($cart_item['id']!=$id){
                $product[] = array('tensanpham'=>$cart_item['tensanpham'], 'id'=>$cart_item['id'], 
                        'soluong'=>$cart_item['soluong'], 'giasp'=>$cart_item['giasp'], 
                        'hinhanh'=>$cart_item['hinhanh'], 'masp'=>$cart_item['masp'], 'tomtat' => $row_addgio['tomtat']);
                        $_SESSION['cart'] = $product;
            }else{
                
                if($cart_item['soluong'] > 1){
                    $giamsl = $cart_item['soluong'] - 1;
                    $product[] = array('tensanpham'=>$cart_item['tensanpham'], 'id'=>$cart_item['id'], 
                        'soluong'=>$giamsl, 'giasp'=>$cart_item['giasp'], 
                        'hinhanh'=>$cart_item['hinhanh'], 'masp'=>$cart_item['masp'], 'tomtat' => $row_addgio['tomtat']);
                        $_SESSION['cart'] = $product;
                }else{
                    $product[] = array('tensanpham'=>$cart_item['tensanpham'], 'id'=>$cart_item['id'], 
                        'soluong'=>$cart_item['soluong'], 'giasp'=>$cart_item['giasp'], 
                        'hinhanh'=>$cart_item['hinhanh'], 'masp'=>$cart_item['masp'], 'tomtat' => $row_addgio['tomtat']);
                }
                $_SESSION['cart'] = $product;
            } 
        }
        header('Location:../../index.php?quanly=giohang');
    }
    //Xóa sản phẩm
    if(isset($_SESSION['cart']) && isset($_GET['xoa'])){
        $id = $_GET['xoa'];
        foreach($_SESSION['cart'] as $cart_item){
            if($cart_item['id']!=$id){
                $product[] = array('tensanpham'=>$cart_item['tensanpham'], 'id'=>$cart_item['id'], 
                        'soluong'=>$cart_item['soluong'], 'giasp'=>$cart_item['giasp'], 
                        'hinhanh'=>$cart_item['hinhanh'], 'masp'=>$cart_item['masp'], 'tomtat' => $row_addgio['tomtat']);
            }
            $_SESSION['cart'] = $product;

        }

        header('Location:../../index.php?quanly=giohang');
    }
    //Xóa tất cả
    if(isset($_GET['xoatatca']) && $_GET['xoatatca'] == 1){
        unset($_SESSION['cart']);
        header('Location:../../index.php?quanly=giohang');
    }
    //Mua sản phẩm
    if(isset($_POST['muahang'])){
        $id = $_GET['idsanpham'];
        $soluong = 1;
        $sql_addgio = "SELECT * FROM tbl_sanpham 
                WHERE id_sanpham = '".$id."' LIMIT 1";
        $query_addgio = mysqli_query($mysqli, $sql_addgio);
        
        if($row_addgio = $query_addgio -> fetch_array()){
            $new_product = array(array('tensanpham'=>$row_addgio['tensanpham'], 'id'=>$id, 
                'soluong'=>$soluong, 'giasp'=>$row_addgio['giasp'],
                'hinhanh'=>$row_addgio['hinhanh'], 'masp'=>$row_addgio['masp'], 'tomtat' => $row_addgio['tomtat']));
            //Kiểm tra session giỏ hàng tồn tại
            if(isset($_SESSION['cart'])){
                $found = false;
                foreach($_SESSION['cart'] as $cart_item){
                    //Nếu trùng
                    if($cart_item['id'] == $id){
                        $product[] = array('tensanpham'=>$cart_item['tensanpham'], 'id'=>$cart_item['id'], 
                        'soluong'=>$soluong+1, 'giasp'=>$cart_item['giasp'], 
                        'hinhanh'=>$cart_item['hinhanh'], 'masp'=>$cart_item['masp'], 'tomtat' => $row_addgio['tomtat']);
                        $found = true;
                    }else{
                        //Nếu không trùng
                        $product[] = array('tensanpham'=>$cart_item['tensanpham'], 'id'=>$cart_item['id'], 
                        'soluong'=>$cart_item['soluong'], 'giasp'=>$cart_item['giasp'], 
                        'hinhanh'=>$cart_item['hinhanh'], 'masp'=>$cart_item['masp'], 'tomtat' => $row_addgio['tomtat']);
                    }
                }
                if($found == false){
                    $_SESSION['cart']=array_merge($product, $new_product);
                }else{
                    $_SESSION['cart'] = $product;
                }
            } else{
                $_SESSION['cart'] = $new_product;
            } 
            
        }
        header('Location:../../index.php?quanly=giohang');  
    }
    //Thêm sản phẩm vào giỏ
    if(isset($_POST['themgiohang'])){
        $id = $_GET['idsanpham'];
        $soluong = 1;
        $sql_addgio = "SELECT * FROM tbl_sanpham 
                WHERE id_sanpham = '".$id."' LIMIT 1";
        $query_addgio = mysqli_query($mysqli, $sql_addgio);
        
        if($row_addgio = $query_addgio -> fetch_array()){
            $new_product = array(array('tensanpham'=>$row_addgio['tensanpham'], 'id'=>$id, 
                'soluong'=>$soluong, 'giasp'=>$row_addgio['giasp'],
                'hinhanh'=>$row_addgio['hinhanh'], 'masp'=>$row_addgio['masp'], 'tomtat' => $row_addgio['tomtat']));
            //Kiểm tra session giỏ hàng tồn tại
            if(isset($_SESSION['cart'])){
                $found = false;
                foreach($_SESSION['cart'] as $cart_item){
                    if($cart_item['id'] == $id){
                        $product[] = array('tensanpham'=>$cart_item['tensanpham'], 'id'=>$cart_item['id'], 
                        'soluong'=>$soluong+1, 'giasp'=>$cart_item['giasp'], 
                        'hinhanh'=>$cart_item['hinhanh'], 'masp'=>$cart_item['masp'], 'tomtat' => $row_addgio['tomtat']);
                        $found = true;
                    }else{
                        $product[] = array('tensanpham'=>$cart_item['tensanpham'], 'id'=>$cart_item['id'], 
                        'soluong'=>$cart_item['soluong'], 'giasp'=>$cart_item['giasp'], 
                        'hinhanh'=>$cart_item['hinhanh'], 'masp'=>$cart_item['masp'], 'tomtat' => $row_addgio['tomtat']);
                    }
                }
                //Kiểm tra trùng sản phẩm
                if($found == false){
                    $_SESSION['cart']=array_merge($product, $new_product);
                }else{
                    $_SESSION['cart'] = $product;
                }
            } else{
                $_SESSION['cart'] = $new_product;
            } 
            
        }
        header('Location:../../index.php');
    }
?>
