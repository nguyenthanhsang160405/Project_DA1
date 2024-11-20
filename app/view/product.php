<?php
    if(isset($data) && !empty($data)){
        if(isset($data['product']) && !empty($data['product'])){
            $product = $data['product'];
        }
        if(isset($data['image']) && !empty($data['image'])){
            $image = $data['image'];
        }
    }
?>
<div class="back-home">
            <p class="home">
                <a href="index.html">
                    <i class="fa-solid fa-home"></i> Trang Chủ/
                </a>
            </p>
            <p class="collection-product">
                BỘ SƯU TẬP SUIT DWIN 2024
            </p>
        </div>
        <div class="title-background">
            <div class="overlayy">
                
            </div>
            <h2>BỘ SƯU TẬP SUIT DWIN 2024</h2>
        </div>
        <div class="main">
            <h2 class="collection">
                BỘ SƯU TẬP SUIT DWIN 2024
            </h2>
            <div class="arrange">
                <form action="#" method="get">
                    <label for="">Sắp xếp: </label>
                    <select name="" id="">
                        <option value="-1">Tùy chọn</option>
                        <option value="Theo bảng chữ cái A->Z">Theo bảng chữ cái Z->A</option>
                        <option value="Theo bảng chữ cái Z->A">Theo bảng chữ cái A->Z</option>
                        <option value="Giá từ thấp đến cao">Giá từ thấp đến cao</option>
                        <option value="Giá từ cao đến thấp">Giá từ cao đến thấp</option>
                        <input type="button" value="Chọn">
                    </select>
                </form>
            </div>
            <div class="wrapp-product-large">
                    <?php 
                        if(isset($product) && !empty($product) && isset($image) && !empty($image)){
                            $row = intval(count($product) / 3);
                            for($i = 0 ; $i <= $row ; $i++){
                                if($i < $row ){
                                    echo '<div class="wrapp-product">';
                                    for($j = $i * 3 ; $j < $i * 3 + 3  ; $j++ ){
                                        echo '<div class="fame-product">
                                                <a href="#"><img src="public/img/'.$image[$j]['link_anh'].'" alt="">
                                                    <div class="content-product">
                                                        <p class="name-product">'.$product[$j]['ten_sanpham'].'</p>
                                                        <p class="price-product">'.number_format($product[$j]['gia_sanpham']).'đ</p>
                                                    </div>
                                                </a>
                                            </div>';
                                        }
                                    echo '</div>';
                                }else if($i==$row){
                                    echo '<div class="wrapp-product">';
                                    for($j = $row * 3 ; $j < count($product); $j++ ){
                                        echo '<div class="fame-product">
                                                <a href="#"><img src="public/img/'.$image[$j]['link_anh'].'" alt="">
                                                    <div class="content-product">
                                                        <p class="name-product">'.$product[$j]['ten_sanpham'].'</p>
                                                        <p class="price-product">'.number_format($product[$j]['gia_sanpham']).'đ</p>
                                                    </div>
                                                </a>
                                            </div>';
                                        }
                                    echo '</div>';
                                }
                                
                            }
                        }
                    ?>
                
                
            </div>
            <div class="next-page">
                <div class="number-page">
                    <span class="page">1</span>
                    <span class="page">2</span>
                    <span class="page">3</span>
                    <span class="page">...</span>
                    <span class="page"><i class="fa-solid fa-angle-right"></i></span>
                    <span class="page"><i class="fa-solid fa-angles-right"></i></span>
                </div>
            </div>
            <div class="image-background">
                <div class="overlay">
                    
                </div>
                <h2>
                    ADAM STORE - Thương hiệu veston may sẵn
                </h2>
            </div>
        </div>