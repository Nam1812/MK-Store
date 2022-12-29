<?php 
    $sql_listed_hang = "SELECT * FROM tbl_marque ORDER BY thutu DESC";
    $query_listed_hang = mysqli_query($mysqli, $sql_listed_hang);
?>
<h1>Liệt Kê Hãng</h1>
<table border="1" width="100%">
    <tr>
        <th>ID</th>
        <th>Tên Hãng</th>
        <th>Chức Năng</th>
    </tr>
    
    <?php
    $i = 0;
    while($row = $query_listed_hang -> fetch_array()){ 
    $i++;
    ?>
            <tr> 
                <td><?php echo $i?></td>
                <td><?php echo $row['tenhang']?></td>
                <td>
                    <a href="/Admin/modules/quanlyhang/xuly.php?idhang=<?php echo $row['id_hang']?>">Xóa</a> | 
                    <a href="?action=quanlyhang&query=edit&idhang=<?php echo $row['id_hang']?>">Sửa</a>
                </td>
            </tr>
        <?php
        }
        ?>
</table>