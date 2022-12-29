<?php
    session_start();
    if(isset($_POST['thanhtoan'])){
        unset($_SESSION['cart']);
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/1147679ae7.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="/Css/style_tc.css">
    <link rel="stylesheet" href="../Css/product.css">
    <link rel="stylesheet" href="../Css/cartegory.css">
    <link rel="stylesheet" href="../Css/header, footer.css">
    <link rel="stylesheet" href="../Css/cart.css">    
    <link rel="stylesheet" href="../Css/ship.css  ">
    <link rel="stylesheet" href="../Css/dangnhap,dangky.css">
    <link rel="stylesheet" href="../Css/payment.css">
    <title>Trang Chủ</title>
</head>

<body>
    <?php
        include("../Admin/config/config.php");
        include("Pages/header.php");
        include("Pages/slidehot.php");
        include("Pages/main.php");
        include("Pages/footer.php");
    ?>
</body>
<script src="/Js/index.js"></script>

</html>