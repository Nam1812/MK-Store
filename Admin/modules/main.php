<div class="clear"></div>
<div class="main">
    <?php
        if(isset($_GET['action']) && isset($_GET['query'])){ 
            $tam = $_GET['action'];
            $query = $_GET['query'];
        } else {
            $tam = '';
            $query = ''; 
        }

        //Quản Lý Danh Mục Sản Phẩm
        if($tam == 'quanlydanhmucsp' && $query == 'add'){
            include("quanlydanhmucsp/add.php");
            include("quanlydanhmucsp/listed.php");
        } elseif($tam == 'quanlydanhmucsp' && $query == 'edit'){
            include("quanlydanhmucsp/edit.php");
        } 
        //Quản Lý Sản Phẩm
        elseif($tam == 'quanlysp' && $query == 'add'){
            include("quanlysp/add.php");
            include("quanlysp/listed.php");
        } elseif($tam == 'quanlysp' && $query == 'edit'){
            include("quanlysp/edit.php");

        //Quản Lý Hãng
        } elseif($tam == 'quanlyhang' && $query == 'add'){
            include("quanlyhang/add.php");
            include("quanlyhang/listed.php");
        } elseif($tam == 'quanlyhang' && $query == 'edit'){
            include("quanlyhang/edit.php");

        } else {
            include("dasboard.php");
        }
    ?>
</div>