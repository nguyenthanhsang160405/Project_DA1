<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./public/css/header.css">
    <link rel="stylesheet" href="./public/css/footer.css">
    <link rel="stylesheet" href="./public/css/index.css">
    <link rel="stylesheet" href="./public/css/all.css">
    <link rel="stylesheet" href="./public/webfonts/all.css">
    <title>Document</title>
</head>
<body>
        <div class="container">
            <header>
                <div><img onclick="AnHienConMenu(this)" src="public/img/Remove-bg.ai_1730792910599.png" alt="logo"></div>
                <div id="navigation">
                    <nav>
                        <ul class="menu-large">
                            <li class="sub-menu-left active"><a href="index.html">Trang chủ</a></li>
                            <li class="sub-menu-left"><a href="#">Giới thiệu</a></li>
                            <li class="sub-menu-left" ><a href="product.html">Sản phẩm<i class="fa-solid fa-chevron-down"></i></a>
                                <ul class="menu-small">
                                    <li class="menu-smaller"><a href="#">Áo Vest</a></li>
                                    <li class="menu-smaller"><a href="#">Áo Polo</a></li>
                                    <li class="menu-smaller"><a href="#">Áo Thun</a></li>
                                </ul>
                            </li>
                            <li class="sub-menu-left"><a href="lookbook.html">Lookbook</a></li>
                            <li class="sub-menu-left"><a href="about.html">Về chúng tôi</a></li>
                            <li class="sub-menu-left"><a href="contact.html">Liên Hệ</a></li>
                        </ul>
                    </nav>
                </div>
                <div>
                    <ul class="menu-large">
                        <form id="form-desktop" action="" method="get">
                            <li  class="sub-menu-right">
                                <input type="text" name="timkem" id="timkem" placeholder="Tìm Kiếm">
                                <i class="fa-solid fa-magnifying-glass search"></i>
                            </li>
                        </form>
                        <form id="form-mobile" action="" method="get">
                            <li class="sub-menu-right">
                                <input type="text" name="timkem" id="timkem">
                                <i class="fa-solid fa-magnifying-glass search"></i>
                            </li>
                        </form>
                        <li class="sub-menu-right"><a href="sigin.html"><i class="fa-solid fa-user"></i></a></li>
                        <li class="sub-menu-right"><a href="cart.html"><i class="fa-solid fa-cart-shopping cart"></i></a></li>
                        <li  onclick="AnHienMobile()" id="icon-mobile" class="sub-menu-right">
                            <i class="fa-solid fa-bars"></i>
                        </li>
                    </ul>
                </div>
            </header>
            <ul id="menu-mobile-visi-hid">
                <li><a href="#">Trang chủ</a></li>
                <li><a href="#">Giới thiệu</a></li>
                <li>
                    <a href="#">Sản phẩm</a>
                    <i onclick="AnHienConMenu()" class="fa-solid fa-plus"></i>
                    <ul id="menu_con-icon-mobile">
                        <li class="menu-smaller"><a href="#">Áo Vest</a></li>
                        <li class="menu-smaller"><a href="#">Áo Polo</a></li>
                        <li class="menu-smaller"><a href="#">Áo Thun</a></li>
                    </ul>
                </li>
                <li><a href="#">Lookbook</a></li>
                <li><a href="#">Về chúng tôi</a></li>
                <li><a href="#">Liên Hệ</a></li>
            </ul>