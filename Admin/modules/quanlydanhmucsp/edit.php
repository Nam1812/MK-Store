<?php 
    $sql_edit_danhmucsp = "SELECT * FROM tbl_danhmuc WHERE id_danhmuc='$_GET[iddanhmuc]' LIMIT 1";
    $query_edit_danhmucsp = mysqli_query($mysqli, $sql_edit_danhmucsp);
?>
<h1>Sửa Danh Mục Sản Phẩm</h1>
    <table border="1" width="50%" style="border-collapse: collapse;">
        <form method="POST" action="modules/quanlydanhmucsp/xuly.php?iddanhmuc=<?php echo $_GET['iddanhmuc']?>">
            <?php
            while($dong = $query_edit_danhmucsp -> fetch_array()){
            ?>
            <tr>
                <td>Tên Danh Mục</td>
                <td><input type="text" value="<?php echo $dong['tendanhmuc']?>" name="tendanhmuc"></td>
            </tr>
            <tr>
                <td>Thứ Tự</td>
                <td><input type="text" value="<?php echo $dong['thutu']?>" name="thutu"></td>
            </tr>
            <tr >
                <td colspan="2"><input type="submit" name="suadanhmuc" value="Sửa Danh Mục Sản Phẩm"></td>
            </tr>
            <?php 
                }
            ?>
        </form>
    </table>