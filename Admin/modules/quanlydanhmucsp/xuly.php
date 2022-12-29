<?php
    include("../../config/config.php");

    $tenloaisp = $_POST['tendanhmuc'];
    $thutu = $_POST['thutu'];

                                                        /*CHỨC NĂNG*/
    //Thêm
    if(isset($_POST['themdanhmuc'])){
        $sql_add = "INSERT INTO tbl_danhmuc(tendanhmuc, thutu) VALUES('".$tenloaisp."', '".$thutu."')";
        mysqli_query($mysqli, $sql_add);
        header("Location:../../index.php?action=quanlydanhmucsp&query=add");

    //Sửa
    }elseif(isset($_POST['suadanhmuc'])){
        $sql_update = "UPDATE tbl_danhmuc SET tendanhmuc = '".$tenloaisp."', thutu = '".$thutu."' 
        WHERE id_danhmuc = '$_GET[iddanhmuc]' ";
        mysqli_query($mysqli, $sql_update);
        header("Location:../../index.php?action=quanlydanhmucsp&query=add");

    //Xóa
    }else{
        $id = $_GET['iddanhmuc'];
        $sql_delete = "DELETE FROM tbl_danhmuc WHERE id_danhmuc = '".$id."'";
        mysqli_query($mysqli, $sql_delete);
        header("Location:../../index.php?action=quanlydanhmucsp&query=add");
    }
?>