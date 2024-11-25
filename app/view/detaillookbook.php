<?php 
    if(isset($data) && !empty($data)){
        if(isset($data['blog']) && !empty($data['blog'])){
            $blog = $data['blog'];
        }
    }
?>
<div class="main">
                <div class="danhmuc">
                    <a href="#"><i class="fa-solid fa-house"></i>Trang chủ</a>
                    <span>/</span>
                    <span>LOOK BOOK</span>
                </div>
                <div class="img-title">
                    <div class="overlay"></div>
                    <h2 style="text-transform: uppercase;"><?php if(isset($blog['ten_baiviet']) && !empty($blog['ten_baiviet'])) echo $blog['ten_baiviet'] ?></h2>
                </div>
                <div class="lookbook-container">
                    <div class="sidebar">
                        <h2>ADAMSTORE 360</h2>
                        <ul>
                            <li><a href="#">News</a></li>
                            <li><a href="#">Khuyến mãi</a></li>
                            <li><a href="#">Ưu đãi đối tác Adam</a></li>
                            <li><a href="#">Sao Việt & Khách hàng</a></li>
                            <li><a href="#">Adam's Videos</a></li>
                        </ul>
                        <div class="banner">
                            <img src="./public/img/7.webp" alt="">
                        </div>
                        <div class="banner">
                            <img src="./public/img/8.webp" alt="">
                        </div>
                    </div>
                    <div class="lookbook-content">
                    <h2 style="text-transform: uppercase;"><?php if(isset($blog['ten_baiviet']) && !empty($blog['ten_baiviet'])) echo $blog['ten_baiviet'] ?></h2>
                        <p><i class="fa-regular fa-calendar"></i> <?php if(isset($blog['ngay_gio_tao']) && !empty($blog['ngay_gio_tao'])) echo $blog['ngay_gio_tao'] ?> <i class="fa-regular fa-message"></i></p>
                        <div class="toc">
                            <div class="toc-title">
                                <h2>MỤC LỤC BÀI VIẾT</h2>
                            </div>
                            <button class="toc-toggle"><i class="fa-solid fa-list"></i></button>
                        </div>
                        <div class="lookbook-items">
                            <!-- Mỗi phần tử trong Lookbook -->
                            <h2 style="text-transform: uppercase;"><?php if(isset($blog['ten_baiviet']) && !empty($blog['ten_baiviet'])) echo $blog['ten_baiviet'] ?></h2>
                            <div class="content">
                                <img src="./public/img/<?php if(isset($blog['anh_baiviet']) && !empty($blog['anh_baiviet'])) echo $blog['anh_baiviet'] ?>" alt="Mangto & Safari Jacket" class="fashion-image">
                                <p class="description">
                                <?php if(isset($blog['noidung_baiviet']) && !empty($blog['noidung_baiviet'])) echo $blog['noidung_baiviet'] ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>