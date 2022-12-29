<?php 
    $sql_listed_sp = "SELECT * FROM tbl_sanpham,tbl_danhmuc
    WHERE tbl_sanpham.id_danhmuc = tbl_danhmuc.id_danhmuc 
    ORDER BY id_sanpham ASC";
    $query_listed_sp = mysqli_query($mysqli, $sql_listed_sp);
?>
<h1>Liệt Kê Sản Phẩm</h1>
<table border="1" width="100%">
    <tr>
        <th>ID</th>
        <th>Tên Sản Phẩm</th>
        <th>Hình Ảnh</th>
        <th>Giá Sản Phẩm</th>
        <th>Số Lượng</th>
        <th>Danh Mục</th>
        <th>Mã Sản Phẩm</th>
        <th>Tóm Tắt</th>
        <th>Trạng Thái</th>
        <th>Chức Năng</th>
    </tr>
    
    <?php
        $i = 0;
        while($row = $query_listed_sp -> fetch_array()){ 
        $i++;
    ?>
            <tr> 
                <td><?php echo $i?></td>
                <td><?php echo $row['tensanpham']?></td>
                <td> <img src="modules/quanlysp/uploads/<?php echo $row['hinhanh']?>" width="200px"></td>
                <td><?php echo $row['giasp']?></td>
                <td><?php echo $row['soluongsp']?></td>
                <td><?php echo $row['tendanhmuc']?></td>
                <td><?php echo $row['masp']?></td>
                <td><?php echo $row['tomtat']?></td>
                <td><?php if($row['tinhtrang'] == 1){
                    echo "Còn Hàng";
                }else{
                    echo "Hết Hàng";
                } 
                ?>
                </td>
                <td>
                    <a href="/Admin/modules/quanlysp/xuly.php?idsanpham=<?php echo $row['id_sanpham']?>">Xóa</a> | 
                    <a href="?action=quanlysp&query=edit&idsanpham=<?php echo $row['id_sanpham']?>">Sửa</a>
                </td>
            </tr>
        <?php
        }
        ?>
</table>