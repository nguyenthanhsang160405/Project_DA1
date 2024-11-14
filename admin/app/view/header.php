<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/header.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="public/css/all.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="admin-content">
            <header>
                <div class="image_nguoi_dung">
                    <img src="../public/img/haicho.jpg" alt="">
                    <p>Xin chào, <?php if(isset($_SESSION['admin']) && !empty($_SESSION['admin'])) echo $_SESSION['admin']['ten_kh'] ?></p>
                    <p>Chào mừng bạn trở lại!</p>
                </div>
                <div class="nav">
                    <ul>
                    <div class="row">
                        <li><a href="index.php?page_adm=catepro"><i class="fa-solid fa-ticket"></i><p>Danh mục sản phẩm</p></a></li>
                        <li><a href="index.php?page_adm=product"><i class="fa-solid fa-ticket"></i><p>Danh sách sản phẩm</p></a></li>
                        </div>
                        <div class="row">
                        <li><a href="index.php?page_adm=user"><i class="fa-solid fa-ticket"></i><p>Người dùng</p></a></li>
                        <li><a href="index.php?page_adm=voucher"><i class="fa-solid fa-ticket"></i><p>Mã giảm giá</p></a></li>
                        </div>
                        <div class="row">
                        <li><a href=""><i class="fa-solid fa-ticket"></i><p>Danh mục bài viết</p></a></li>
                        <li><a href=""><i class="fa-solid fa-ticket"></i><p>Bài viết</p></a></li>
                        </div>
                        <div class="row">
                        <li><a href="index.php?page_adm=pendingorder"><i class="fa-solid fa-ticket"></i><p>Đơn hàng chờ xác nhận</p></a></li>
                        <li><a href="index.php?page_adm=acceptedorder"><i class="fa-solid fa-ticket"></i><p>Đơn hàng đã xác nhận</p></a></li>
                        </div>
                        <div class="row">
                        <li><a href=""><i class="fa-solid fa-ticket"></i><p>Thống kê</p></a></li>
                        <li><a href=""><i class="fa-solid fa-ticket"></i><p>Bình luận</p></a></li>
                        </div>
                    </ul>
                </div>
            </header>
            <div class="main">
                <div class="admin-ifm">
                    <div class="admin-name">
                        <div class="admin-background-name">
                            <p>ADMIN</p>
                            <a href=""><i class="fa-solid fa-right-from-bracket"></i></a>
                        </div>
                    </div>