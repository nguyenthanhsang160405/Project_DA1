<?php
    if(isset($data) && !empty($data)){
        if(isset($data['cate']) && !empty($data['cate'])){
            $cate = $data['cate'];
        }
        if(isset($data['pro_special']) && !empty($data['pro_special'])){
            $pro_special = $data['pro_special'];
        }
        if(isset($data['image']) && !empty($data['image'])){
            $image = $data['image'];
        }
    }
?>


            <div class="main">
                <div class="grid-banner mb-banner">
                        <div class="item1">
                            <img src="public/img/hc_img_1_1024x1024.png" alt="">
                            <button class="hover-button">Xem Thêm</button>
                        </div>
                    <div class="item2">
                        <img src="public/img/hc_img_2_large.png" alt="">
                        <button class="hover-button">Xem Thêm</button>
                    </div>
                    <div class="item3">
                        <img src="public/img/hc_img_3_large.png" alt="">
                        <button class="hover-button">Xem Thêm</button>
                    </div>
                    <div class="item4 img4">
                        <img src="public/img/hc_img_4_large.png" alt="">
                        <button class="hover-button">Xem Thêm</button>
                    </div>
                </div>
                <section class="popular">
                    <h2>NGƯỜI NỔI TIẾNG</h2>
                    <div class="wrapper">
                        <div class="celebrity">
                            <img src="public/img/htesti_img_1_large.webp" alt="">
                            <p>LÝ HẢI</p>
                        </div>
                        <div class="celebrity">
                            <img src="public/img/htesti_img_2_large.webp" alt="">
                            <p>NGÔ KIẾN HUY</p>
                        </div>
                        <div class="celebrity">
                            <img src="public/img/htesti_img_3_large.webp" alt="">
                            <p>XUÂN BẮC</p>
                        </div>
                        <div class="celebrity img4">
                            <img src="public/img/htesti_img_4_large.webp" alt="">
                            <p>QUÂN A.P</p>
                        </div>
                    </div>
                </section>
                <?php
                if(isset($pro_special) && !empty($pro_special)){
                        echo '<section class="suits">
                        <h2>BST SẢN PHẨM ĐẶC BIỆT</h2>
                        <div class="wrapper">';
                                if(isset($pro_special[0]) && !empty($pro_special[0])){
                                    echo '<a href="index.php?page=detail&&id_pro='.$pro_special[0]['id_sanpham'].'">
                                            <div class="new-suit">
                                                    <img src="public/img/'.$image[0]['link_anh'].'" alt="">
                                                    <span>special</span>
                                                </div>
                                            </a>';
                                }
                                if(isset($pro_special[1]) && !empty($pro_special[1])){
                                    echo '<a href="index.php?page=detail&&id_pro='.$pro_special[1]['id_sanpham'].'">
                                            <div class="new-suit">
                                                    <img src="public/img/'.$image[1]['link_anh'].'" alt="">
                                                    <span>special</span>
                                                </div>
                                            </a>';
                                }
                                if(isset($pro_special[2]) && !empty($pro_special[2])){
                                    echo '<a href="index.php?page=detail&&id_pro='.$pro_special[2]['id_sanpham'].'">
                                            <div class="new-suit">
                                                    <img src="public/img/'.$image[2]['link_anh'].'" alt="">
                                                    <span>special</span>
                                                </div>
                                            </a>';
                                }
                                if(isset($pro_special[3]) && !empty($pro_special[3])){
                                    echo '<a href="index.php?page=detail&&id_pro='.$pro_special[3]['id_sanpham'].'">
                                            <div class="new-suit">
                                                    <img src="public/img/'.$image[3]['link_anh'].'" alt="">
                                                    <span>special</span>
                                                </div>
                                            </a>';
                                }
                        echo '</div>
                    </section>';
                }
                
                ?>
                <section class="lookbook">
                    <h2>Lookbook</h2>
                    <div class="wrapper">
                        <div class="lookbook-img">
                            <img src="public/img/fourth_htesti_img_1_large.webp" alt="">
                            <p>REAL MEN - Dwin STORE</p>
                        </div>
                        <div class="lookbook-img">
                            <img src="public/img/fourth_htesti_img_2_large.webp" alt="">
                            <p>Dream of Venice</p>
                        </div>
                        <div class="lookbook-img">
                            <img src="public/img/fourth_htesti_img_3_large.jpg" alt="">
                            <p>코리아 스프링 썸머 컬렉션 - Mr Right</p>
                        </div>
                        <div class="lookbook-img img4">
                            <img src="public/img/fourth_htesti_img_4_large.webp" alt="">
                            <p>Lost in Paris</p>
                        </div>
                    </div>
                </section>
            </div>