<?php
    include("../../config/config.php");

    $tenhang = $_POST['tenhang'];
    $thutu = $_POST['thutu'];
    
                                                        /*CHỨC NĂNG*/
    //Thêm
    if(isset($_POST['themhang'])){
        $sql_add = "INSERT INTO tbl_marque(tenhang, thutu) VALUES('".$tenhang."', '".$thutu."')";
        mysqli_query($mysqli, $sql_add);
        header("Location:../../index.php?action=quanlyhang&query=add");

    //Sửa
    }elseif(isset($_POST['suahang'])){
        $sql_update = "UPDATE tbl_marque SET tenhang = '".$tenhang."', thutu = '".$thutu."' 
        WHERE id_hang = '$_GET[idhang]' ";
        mysqli_query($mysqli, $sql_update);
        header("Location:../../index.php?action=quanlyhang&query=add");

    //Xóa
    }else{
        $id = $_GET['idhang'];
        $sql_delete = "DELETE FROM tbl_marque WHERE id_hang = '".$id."'";
        mysqli_query($mysqli, $sql_delete);
        header("Location:../../index.php?action=quanlyhang&query=add");
    }
?>