<?php 
    $sql_listed_danhmucsp = "SELECT * FROM tbl_danhmuc ORDER BY thutu DESC";
    $query_listed_danhmucsp = mysqli_query($mysqli, $sql_listed_danhmucsp);
?>
<h1>Liệt Kê Danh Mục</h1>
<table border="1" width="100%" style="backback">
    <tr>
        <th>ID</th>
        <th>Tên Danh Mục</th>
        <th>Chức Năng</th>
    </tr>
    
    <?php
    $i = 0;
    while($row = $query_listed_danhmucsp -> fetch_array()){ 
    $i++;
    ?>
            <tr> 
                <td><?php echo $i?></td>
                <td><?php echo $row['tendanhmuc']?></td>
                <td>
                    <a href="/Admin/modules/quanlydanhmucsp/xuly.php?iddanhmuc=<?php echo $row['id_danhmuc']?>">Xóa</a> | 
                    <a href="?action=quanlydanhmucsp&query=edit&iddanhmuc=<?php echo $row['id_danhmuc']?>">Sửa</a>
                </td>
            </tr>
        <?php
        }
        ?>
</table>