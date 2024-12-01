<?php
    if(isset($data) && !empty($data)){
        if(isset($data['cate']) && !empty($data['cate'])){
            $cate = $data['cate'];
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./public/css/header.css">
    
    <link rel="stylesheet" href="./public/css/all.css">
    <link rel="stylesheet" href="./public/webfonts/all.css">
    <?php
        if(isset($_GET['page']) && !empty($_GET['page'])){
            $page = $_GET['page'];
            switch($page){
                case 'product':
                    echo '<link rel="stylesheet" href="./public/css/product.css">';
                    break;
                case 'cart':
                    echo '<link rel="stylesheet" href="./public/css/cart.css">';
                    break;
                case 'usermanage':
                    echo '<link rel="stylesheet" href="./public/css/pageuser.css">';
                    echo '<link rel="stylesheet" href="./public/css/puchasecart.css">';
                    break;
                case 'detail':
                    echo '<link rel="stylesheet" href="./public/css/detail.css">';
                    break;
                case 'payment':
                    echo '<link rel="stylesheet" href="./public/css/payment.css">';
                    break;
                case 'sigin':
                    echo '<link rel="stylesheet" href="./public/css/title-img.css">
                        <link rel="stylesheet" href="./public/css/index.css">
                        <link rel="stylesheet" href="./public/css/all.css">
                        <link rel="stylesheet" href="./public/css/lookbook.css">';
                    break;
                case 'register':
                        echo '<link rel="stylesheet" href="./public/css/title-img.css">
                            <link rel="stylesheet" href="./public/css/index.css">
                            <link rel="stylesheet" href="./public/css/all.css">
                            <link rel="stylesheet" href="./public/css/lookbook.css">';
                        break;
                case 'cart':
                    echo '<link rel="stylesheet" href="./public/css/cart.css">';
                    break;
                case 'lookbook':
                    echo '<link rel="stylesheet" href="./public/css/lookbook.css">';
                    break;
                case 'about':
                    echo '<link rel="stylesheet" href="./public/css/about.css">';
                    break;
                case 'otp':
                    echo '<link rel="stylesheet" href="./public/css/title-img.css">
                        <link rel="stylesheet" href="./public/css/index.css">
                        <link rel="stylesheet" href="./public/css/all.css">
                        <link rel="stylesheet" href="./public/css/lookbook.css">';
                    break;
                case 'changepass':
                    echo '<link rel="stylesheet" href="./public/css/title-img.css">
                        <link rel="stylesheet" href="./public/css/index.css">
                        <link rel="stylesheet" href="./public/css/all.css">
                        <link rel="stylesheet" href="./public/css/lookbook.css">';
                    break;
                case 'contact':
                    echo '<link rel="stylesheet" href="./public/css/contact.css">';
                    break;
                case 'detaillookbook':
                    echo '<link rel="stylesheet" href="./public/css/ctlookbook.css">';
                    break;
                default:
                    echo '<link rel="stylesheet" href="./public/css/index.css">';
                    
            }
        }else{
            echo '<link rel="stylesheet" href="./public/css/index.css">';
        }
    ?>
    <link rel="stylesheet" href="./public/css/footer.css">
    <title>Document</title>
</head>
<body>
        <div class="container">
            <header>
                <div><a href="index.php"><img onclick="AnHienConMenu(this)" src="public/img/Remove-bg.ai_1730792910599.png" alt="logo"></a></div>
                <div id="navigation">
                    <nav>
                        <ul class="menu-large">
                            <li class="sub-menu-left active"><a href="index.php">Trang chủ</a></li>
                            <li class="sub-menu-left"><a href="#">Giới thiệu</a></li>
                            <li class="sub-menu-left" ><a href="index.php?page=product">Sản phẩm<i class="fa-solid fa-chevron-down"></i></a>
                                <ul class="menu-small">
                                    <?php 
                                        if(isset($cate) && !empty($cate)){
                                            foreach($cate as $item){
                                                echo '<li class="menu-smaller"><a href="index.php?page=product&&id_cate='.$item['id_loai'].'">'.$item['ten_loai'].'</a></li>';
                                            }
                                        }
                                    ?>
                                </ul>
                            </li>
                            <li class="sub-menu-left"><a href="index.php?page=lookbook">Lookbook</a></li>
                            <li class="sub-menu-left"><a href="index.php?page=about">Về chúng tôi</a></li>
                            <li class="sub-menu-left"><a href="index.php?page=contact">Liên Hệ</a></li>
                        </ul>
                    </nav>
                </div>
                <div id="okkkk">
                    <ul class="menu-large">
                        <form id="form-desktop" action="index.php" method="get">
                            <li  class="sub-menu-right">
                                <input type="hidden" name="page" id="timkiem" value="product" placeholder="Tìm Kiếm">
                                <input type="text" name="timkiem" id="timkem1" placeholder="Tìm Kiếm">
                                <i class="fa-solid fa-magnifying-glass search"></i>
                            </li>
                        </form>
                        <form id="form-mobile" action="index.php" method="GET">
                            <li class="sub-menu-right">
                                <input type="text" name="timkiem" id="timkem">
                                <i class="fa-solid fa-magnifying-glass search"></i>
                            </li>
                        </form>
                        <?php if(isset($_SESSION['user']) && !empty($_SESSION['user'])){
                            echo '<li class="sub-menu-right"><a href="index.php?page=usermanage"><i class="fa-solid fa-user"></i></a></li>';
                        }else{
                            echo '<li class="sub-menu-right"><a href="index.php?page=sigin"><i class="fa-solid fa-user"></i></a></li>';
                        }
                        
                        ?>
                        
                        <li class="sub-menu-right"><a href="index.php?page=cart"><i class="fa-solid fa-cart-shopping cart"></i></a></li>
                        <li  onclick="AnHienMobile()" id="icon-mobile" class="sub-menu-right">
                            <i class="fa-solid fa-bars"></i>
                        </li>
                    </ul>
                </div>
            </header>
            <ul id="menu-mobile-visi-hid">
                <li><a href="index.php">Trang chủ</a></li>
                <li><a href="#">Giới thiệu</a></li>
                <li>
                    <a href="index.php?page=product">Sản phẩm</a>
                    <i onclick="AnHienConMenu()" class="fa-solid fa-plus"></i>
                    <ul id="menu_con-icon-mobile">
                        <?php 
                            if(isset($cate) && !empty($cate)){
                                foreach($cate as $item){
                                    echo '<li class="menu-smaller"><a href="index.php?page=product&&id_cate='.$item['id_loai'].'">'.$item['ten_loai'].'</a></li>';
                                }
                            }            
                        ?>
                    </ul>
                </li>
                <li><a href="index.php?page=lookbook">Lookbook</a></li>
                <li><a href="index.php?page=about">Về chúng tôi</a></li>
                <li><a href="index.php?page=contact">Liên Hệ</a></li>
            </ul>