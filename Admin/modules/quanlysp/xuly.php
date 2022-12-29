<?php
    include("../../config/config.php");

    $tensp = $_POST['tensp'];
    $masp = $_POST['masp'];
    $giasp = $_POST['giasp'];
    $soluongsp = $_POST['soluongsp'];

    //Xử Lý Hình Ảnh
    $hinhanh = $_FILES['hinhanh']['name'];
    $hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
    $hinhanh = time().'_'.$hinhanh;

    $tomtat = $_POST['tomtat'];
    $chitiet = $_POST['chitiet'];
    $tinhtrang = $_POST['tinhtrang'];
    $danhmuc = $_POST['danhmuc'];

                                                    /*CHỨC NĂNG*/
    //Thêm
    if(isset($_POST['themsanpham'])){
        $sql_add = "INSERT INTO tbl_sanpham(tensanpham,masp,giasp,soluongsp,hinhanh,tomtat,chitiet,tinhtrang,id_danhmuc) 
        VALUES('".$tensp."', '".$masp."', '".$giasp."', '".$soluongsp."', '".$hinhanh."', '".$tomtat."', '".$chitiet."',
        '".$tinhtrang."','".$danhmuc."')";

        mysqli_query($mysqli, $sql_add);
        move_uploaded_file($hinhanh_tmp, "uploads/".$hinhanh);
        header("Location:../../index.php?action=quanlysp&query=add");

    //Sửa
    }elseif(isset($_POST['suasanpham'])){
        if($hinhanh!=''){
            move_uploaded_file($hinhanh_tmp, "uploads/".$hinhanh);  

            $sql_update = "UPDATE tbl_sanpham SET 
            tensanpham = '".$tensp."', masp = '".$masp."', giasp = '".$giasp."', soluongsp = '".$soluongsp."',
            hinhanh = '".$hinhanh."', tomtat = '".$tomtat."', chitiet = '".$chitiet."',
            tinhtrang = '".$tinhtrang."',id_danhmuc = '".$danhmuc."' WHERE id_sanpham = '$_GET[idsanpham]'"; 

            //Xóa Hình Ảnh Cũ
            $sql = "SELECT * FROM tbl_sanpham WHERE id_sanpham = '$_GET[idsanpham]' LIMIT 1";
            $query = mysqli_query($mysqli, $sql);
            while($row = $query -> fetch_array()){
                unlink("uploads/".$row['hinhanh']);
            }
        } else{
            $sql_update = "UPDATE tbl_sanpham SET tensanpham = '".$tensp."', masp = '".$masp."', giasp = '".$giasp."',
            soluongsp = '".$soluongsp."', tomtat = '".$tomtat."' , chitiet = '".$chitiet."' , tinhtrang = '".$tinhtrang."',
            id_danhmuc = '".$danhmuc."' WHERE id_sanpham = '$_GET[idsanpham]'";
        }

        mysqli_query($mysqli, $sql_update);
        header("Location:../../index.php?action=quanlysp&query=add");
    //Xóa
    }else{
        $id = $_GET['idsanpham'];
        $sql = "SELECT * FROM tbl_sanpham WHERE id_sanpham = '$id' LIMIT 1";
        $query = mysqli_query($mysqli, $sql);
        $sql_delete = "DELETE FROM tbl_sanpham WHERE id_sanpham = '".$id."'";

        while($row = $query -> fetch_array()){
            unlink("uploads/".$row['hinhanh']);
        }   
        
        mysqli_query($mysqli, $sql_delete);
        header("Location:../../index.php?action=quanlysp&query=add");
    }

?>