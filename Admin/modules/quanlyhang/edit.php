<?php 
    $sql_edit_hang = "SELECT * FROM tbl_marque WHERE id_hang='$_GET[idhang]' LIMIT 1";
    $query_edit_hang = mysqli_query($mysqli, $sql_edit_hang);
?>
<h1>Sửa Hãng</h1>
    <table border="1" width="50%" style="border-collapse: collapse;">
        <form method="POST" action="modules/quanlyhang/xuly.php?idhang=<?php echo $_GET['idhang']?>">
            <?php
            while($dong = $query_edit_hang -> fetch_array()){
            ?>
            <tr>
                <td>Tên Hãng</td>
                <td><input type="text" value="<?php echo $dong['tenhang']?>" name="tenhang"></td>
            </tr>
            <tr>
                <td>Thứ Tự</td>
                <td><input type="text" value="<?php echo $dong['thutu']?>" name="thutu"></td>
            </tr>
            <tr >
                <td colspan="2"><input type="submit" name="suahang" value="Sửa Hãng"></td>
            </tr>
            <?php 
                }
            ?>
        </form>
    </table>