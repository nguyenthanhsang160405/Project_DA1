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
                    <h2>LOOKBOOK</h2>
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
                        <h2>LOOKBOOK</h2>
                        <div class="lookbook-items">
                            <!-- Mỗi phần tử trong Lookbook -->
                            
                                <?php 
                                    if(isset($blog) && !empty($blog)){
                                        $row = intval(count($blog) / 3);
                                            for($i = 0 ; $i <= $row ; $i++){
                                                if($i < $row ){
                                                    echo '<div class="wrapper-lookbook-item">';
                                                    for($j = $i * 3 ; $j < $i * 3 + 3  ; $j++ ){
                                                        echo '<div class="lookbook-item">
                                                                    <a href=""><img src="./public/img/'.$blog[$j]['anh_baiviet'].'" alt="Ảnh Lookbook 2"></a>
                                                                    <h1 class="item-title">'.$blog[$j]['ten_baiviet'].'</h1>
                                                                    <p class="item-date">'.$blog[$j]['ngay_gio_tao'].'</p>
                                                                    <p class="item-description">ADAMS SWEATER 24 | TIẾP NỐI CẢM HỨNG THỜI TRANG HIỆN ĐẠI...</>
                                                                </div>';
                                                        }
                                                    echo '</div>';
                                                }else if($i==$row){
                                                    echo '<div class="wrapper-lookbook-item">';
                                                    for($j = $row * 3 ; $j < count($blog); $j++ ){
                                                        echo '<div class="lookbook-item">
                                                                <a href=""><img src="./public/img/'.$blog[$j]['anh_baiviet'].'" alt="Ảnh Lookbook 2"></a>
                                                                <h1 class="item-title">'.$blog[$j]['ten_baiviet'].'</h1>
                                                                <p class="item-date">'.$blog[$j]['ngay_gio_tao'].'</p>
                                                                <p class="item-description">ADAMS SWEATER 24 | TIẾP NỐI CẢM HỨNG THỜI TRANG HIỆN ĐẠI...</>
                                                            </div>';
                                                        }
                                                    echo '</div>';
                                                }
                                
                            }
                                    }
                                ?>
                        </div>
                    </div>
                </div>
            </div>