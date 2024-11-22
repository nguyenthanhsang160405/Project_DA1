<?php

    if(isset($data) && !empty($data)){
        if(isset($data['product']) && !empty($data['product'])){
            $product = $data['product'];
        }
        if(isset($data['image']) && !empty($data['image'])){
            $image = $data['image'];
            print_r($image);
        }
        if(isset($data['all_product']) && !empty($data['all_product'])){
            $all_product = $data['all_product'];
        }
        if(isset($data['all_image']) && !empty($data['all_image'])){
            $all_image = $data['all_image'];
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
                    <?php if(isset($image[1]) && !empty($image[1])) echo '<div class="small-image">
                                                                                <img src="./public/img/'.$image[1]['link_anh'].'" alt="">
                                                                            </div>';
                            if(isset($image[2]) && !empty($image[2])) echo '<div class="small-image">
                                                                                <img src="./public/img/'.$image[2]['link_anh'].'" alt="">
                                                                            </div>';
                            if(isset($image[3]) && !empty($image[3])) echo '<div class="small-image">
                                                                                <img src="./public/img/'.$image[3]['link_anh'].'" alt="">
                                                                            </div>'
                    
                    ?>
                    </div>
                </div>
                <form class="product-details" action="index.php?page=detail&&id_pro=<?php if(isset($product) && !empty($product)) echo $product['id_sanpham'] ?>" method="post" >
                    <div class="product-title"><?php if(isset($product) && !empty($product)) echo $product['ten_sanpham'] ?></div>
                    <div class="masp">TXVN2550</div>
                    <div class="price"><?php if(isset($product) && !empty($product)) echo number_format($product['gia_sanpham']) ?>đ</div>
                    <div class="size-selection">
                        <label>Kích thước:</label>
                        <div class="size-buttons">
                            <div  onclick="getIFMandCheckSize(0,48)" class ="size" >48</div >
                            <div  onclick="getIFMandCheckSize(1,50)" class ="size">50</div >
                            <div  onclick="getIFMandCheckSize(2,52)" class ="size">52</div >
                            <div  onclick="getIFMandCheckSize(3,54)" class ="size">54</div >
                            <div  onclick="getIFMandCheckSize(4,56)" class ="size">56</div >
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
                    <input type="hidden" name="name_pro" value="<?php if(isset($product) && !empty($product)) echo $product['ten_sanpham'] ?>">
                    <input type="hidden" name="price_pro" value="<?php if(isset($product) && !empty($product)) echo $product['gia_sanpham'] ?>">
                    <input type="hidden" name="id_product" value="<?php if(isset($product) && !empty($product)) echo $product['id_sanpham'] ?>">
                    <input type="hidden" name="image_pro" value="<?php if(isset($image[0]) && !empty($image[0])) echo $image[0]['link_anh'] ?>">
                    <input type="hidden" name="select_size_product" id="select_size_product" value="">
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
                    <?php
                    if(isset($all_product) && !empty($all_product) && isset($all_image) && !empty($all_image)){
                        for($i = 0 ; $i < count($all_product) ; $i++ ){
                            echo '<div class="product">
                                    <a href="index.php?page=detail&&id_pro='.$all_product[$i]['id_sanpham'].'"><img src="./public/img/'.$all_image[$i]['link_anh'].'" alt="Vest Nhung Đen"></a>
                                    <h1>'.$all_product[$i]['ten_sanpham'].'<h1>
                                    <p>'.number_format($all_product[$i]['gia_sanpham']).'đ<p> 
                                </div>';
                        }
                    }
                        
                    ?>
                </div>
            </div>
        </div> 
    </div>