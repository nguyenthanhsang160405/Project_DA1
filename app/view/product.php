<?php
    if(isset($data) && !empty($data)){
        if(isset($data['product']) && !empty($data['product'])){
            $product = $data['product'];
        }
        if(count($product ) % 12 == 0){
            $page_number = count($product) / 12;
        }else{
            $page_number = intval(count($product) / 12) + 1;
        }
        $page_number = count($product) / 12;
        if(isset($data['image']) && !empty($data['image'])){
            $image = $data['image'];
        }
        if(isset($data['name_timkiem']) && !empty($data['name_timkiem'])){
            $name_timkiem = $data['name_timkiem'];
        }
        if(isset($data['id_cate']) && !empty($data['id_cate'])){
            $id_cate = $data['id_cate'];
        }
        if(isset($data['product_ht']) && !empty($data['product_ht'])){
            $product_ht = $data['product_ht'];
        }
        if(isset($data['image_ht']) && !empty($data['image_ht'])){
            $image_ht = $data['image_ht'];

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
                <form action="index.php?page=product&&id_cate=<?php if(isset($id_cate) && !empty($id_cate)) echo $id_cate?>&&timkiem=<?php if(isset($name_timkiem) && !empty($name_timkiem)) echo $name_timkiem ?>" method="post">
                    <label for="">Sắp xếp: </label>
                    <select name="arrange" id="">
                        <option value="1">Tùy chọn</option>
                        <option value="2">Theo bảng chữ cái Z->A</option>
                        <option value="3">Theo bảng chữ cái A->Z</option>
                        <option value="4">Giá từ thấp đến cao</option>
                        <option value="5">Giá từ cao đến thấp</option>
                        <input name="sapxep" type="submit" value="Chọn">
                    </select>
                </form>
            </div>
            <div class="wrapp-product-large">
                <div class="wrapp-product">
                    <?php 

                        if(isset($product_ht) && !empty($product_ht) && isset($image_ht) && !empty($image_ht)){
                            for($i = 0 ; $i < count($product_ht) ; $i++){
                                echo'<div class="fame-product">
                                        <a href="index.php?page=detail&&id_pro='.$product_ht[$i]['id_sanpham'].'"><img src="public/img/'.$image_ht[$i]['link_anh'].'" alt="">
                                            <div class="content-product">
                                                <p class="name-product">'.$product_ht[$i]['ten_sanpham'].'</p>
                                                <p class="price-product">'.number_format($product_ht[$i]['gia_sanpham']).'đ</p>
                                            </div>
                                        </a>
                                    </div>';
                            }
                        }
                    ?>
                </div>
                
                
            </div>
            <div class="next-page">
                <div class="number-page">
                    <?php
                        for($i = 0 ; $i < $page_number ; $i++){
                            echo '<a style="color:black" href="index.php?page=product&&id_page='.($i+1).'&&id_cate='.(isset($id_cate) && !empty($id_cate) ? $id_cate : '').'&&timkiem='.(isset($name_timkiem) && !empty($name_timkiem) ? $name_timkiem : '').'"><span class="page">'.($i+1).'</span></a>';
                        }
                    ?>
                    <!-- <a href=""><span class="page">1</span></a>
                    <span class="page">2</span>
                    <span class="page">3</span>
                    <span class="page">...</span>
                    <span class="page"><i class="fa-solid fa-angle-right"></i></span>
                    <span class="page"><i class="fa-solid fa-angles-right"></i></span> -->
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