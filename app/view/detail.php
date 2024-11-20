<?php
print_r($data);
    if(isset($data) && !empty($data)){
        if(isset($data['product']) && !empty($data['product'])){
            $product = $data['product'];
        }
        if(isset($data['image']) && !empty($data['image'])){
            $image = $data['image'];
        }
    }
?>
<div class="danhmuc">
            <a href="index.html"><i class="fa-solid fa-house"></i>Trang chủ</a>
            <span>| BỘ SƯU TẬP SUIT DWIN 2024 |</span>
            <span >Áo vest xanh kẻ đen - AV341</span>
        </div>
        <div class="img-title">
            <div class="overlay"></div>
            <h2>Áo vest xanh kẻ đen - AV341</h2>
        </div>
        <div class="container">
            <div class="product-section">
                <div class="image-container">
                    <div class="main-image">
                        <img src="./public/img/<?php if(isset($image[0]) && !empty($image[0])) echo $image[0]['link_anh'] ?>" alt="">
                    </div>
                    <div class="small-images">
                        <div class="small-image">
                            <img src="./public/img/1.webp" alt="">
                        </div>
                        <div class="small-image">
                            <img src="./public/img/2.webp" alt="">
                        </div>
                        <div class="small-image">
                            <img src="./public/img/3.webp" alt="">
                        </div>
                    </div>
                </div>
                <form class="product-details" action="#" method="post" >
                    <div class="product-title"><?php if(isset($product) && !empty($product)) echo $product['ten_sanpham'] ?></div>
                    <div class="masp">TXVN2550</div>
                    <div class="price"><?php if(isset($product) && !empty($product)) echo number_format($product['gia_sanpham']) ?>đ</div>
                    <div class="size-selection">
                        <label>Kích thước:</label>
                        <div class="size-buttons">
                            <div id ="size" >48</div >
                            <div id ="size">50</div >
                            <div id ="size">52</div >
                            <div id="size">54</div >
                            <div id="size">56</div >
                        </div>
                    </div>
                    <div class="quantity-size">
                        <p>Hướng Dẫn Chọn Size</p>
                    </div>
                    <div class="quantity-selection">
                        <label>Số lượng:</label>
                        <div class="quantity-buttons" id="buy-amount">
                            <span class="minus-btn" onclick="handleminus()">-</span>
                            <input type="text" name="amount" id="amount" value="1">
                            <span class="plus-btn" onclick="handleplus()">+</span>
                        </div>
                    </div>
                    <input type="submit" name="add-to-cart" value="THÊM VÀO GIỎ">
                    <input type="submit" name="buy-now" value="MUA NGAY">
                </form>
            </div>
            <div class="tabs">
                <div class="tab1">THÔNG SỐ</div>
                <div class="tab">CHI TIẾT SẢN PHẨM</div>
                <div class="tab">BẢO HÀNH</div>
                <div class="tab">BÌNH LUẬN</div>
            </div>
            <div class="size">
                <img class="luachonsize" src="./public/img/size.webp" alt="">
            </div>
            <div class="related-products">
                <h3>SẢN PHẨM LIÊN QUAN</h3>
                <div class="wrapp-related-products">
                    <div class="product">
                        <a href="#"></a>
                        <img src="./public/img/sp1.webp" alt="Vest Nhung Đen">
                        <h1>VEST NHUNG ĐEN<h1>
                        <p>2,800,000₫<p> 
                    </div>
                    <div class="product">
                        <a href="#"></a>
                        <img src="./public/img/sp2.webp" alt="Vest Nhung Xanh">
                        <h1>VEST NHUNG XANH<h1>
                        <p>2,800,000₫</p>
                    </div>
                    <div class="product">
                        <a href="#"></a>
                        <img src="./public/img/sp3.webp" alt="Vest Xám"  accesske>
                        <h1>TOV 22059 - ĐEN VÀNG ĐỎ<h1>
                        <p>4,700,000₫</p>
                    </div>
                </div>
            </div>
        </div> 
    </div>