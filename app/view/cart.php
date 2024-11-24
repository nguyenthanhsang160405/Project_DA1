<?php

    if(isset($data) && !empty($data)){
        if(isset($data['cart']) && !empty($data['cart'])){
            $cart = $data['cart'];
        }
    }
?>
<div class="main">
                <div class="danhmuc">
                    <a href="#"><i class="fa-solid fa-house"></i>Trang chủ</a>
                    <span>/</span>
                    <span>Giỏ Hàng</span>
                </div>
                <div class="img-title">
                    <div class="overlay"></div>
                    <h2>Giỏ Hàng</h2>
                </div>
                <div class="box-cart">
                    <div class="title-cart"><h1>Giỏ Hàng</h1></div>
                    <div class="detail-cart">
                            <div class="title-product-cart mobile">
                                <div class="col1">Sản phẩm</div>
                                <div class="col2">Thông tin chi tiết sản phẩm</div>
                                <div class="col3">Số lượng</div>
                                <div class="col4">Đơn giá</div>
                                <div class="col5">Tổng giá</div>
                            </div>
                            <?php
                            $total = 0;
                            if(isset($_SESSION['user']) && !empty($_SESSION['user'])){
                                if(isset($cart) && !empty($cart)){
                                    for($i = 0 ; $i < count($cart) ; $i++){
                                        $total += $cart[$i]['soluong_sanpham'] * $cart[$i]['gia_sanpham'];
                                        echo '<div class="infor-product-cart">
                                                <!-- class="layout-mobile" chỉ có ở css mobile -->
                                                    <div class="layout-mobile">
                                                        <div class="col1 img-prod-cart"><img src="./public/img/'.$cart[$i]['anh_sanpham'].'" alt="" id=""></div>
                                                        
                                                        <!--  -->
                                                        <div class="layout-mobile-child1">
                                                        <div class="col2 detail-prod-cart" >
                                                            <h3 id="">
                                                                <!-- Tiêu đề sản phẩm -->
                                                                '.$cart[$i]['ten_sanpham'].'
                                                            </h3>
                                                            <p>Size: 
                                                                <span id="">
                                                                    <!-- Giá trị size sản phẩm -->
                                                                    '.$cart[$i]['size_sanpham'].'
                                                                </span>
                                                            </p>
                                                            <!-- Nút xóa sản phẩm -->
                                                            <a href="index.php?page=cart&&id_delete_cart='.$cart[$i]['id_ctgiohang'].'" id="">Xóa</a>
                                                        </div>

                                                        <!-- class="layout-mobile-child" chỉ có ở css mobile -->
                                                        <div class="layout-mobile-child2"> 
                                                            <!-- Tăng giảm số lượng -->
                                                            <div class="col3 count-prod-cart">
                                                                    <button class="btn-cout" id="decrease-cout-cart">-</button>
                                                                    <span class="quantity" id="quantity-cout-cart">'.$cart[$i]['soluong_sanpham'].'</span>
                                                                    <button class="btn-cout" id="increase-cout-cart">+</button>
                                                            </div>
                                                            <div class="col4 price-prod-cart">
                                                                <p><span id="">'.number_format($cart[$i]['gia_sanpham']).'</span> đ</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                        <div class="col5 price-prod-cart totalprice-prod">
                                                            <p><span id="">'.number_format($cart[$i]['soluong_sanpham'] * $cart[$i]['gia_sanpham']).'</span> đ</p>
                                                        </div>
                                            </div>';
                                    }
                                }
                            }else{
                                if(isset($cart) && !empty($cart)){
                                    for($i = 0 ; $i < count($cart) ; $i++){
                                        $total += $cart[$i]['price'] * $cart[$i]['quantity'];
                                        echo '<div class="infor-product-cart">
                                                <!-- class="layout-mobile" chỉ có ở css mobile -->
                                                    <div class="layout-mobile">
                                                        <div class="col1 img-prod-cart"><img src="./public/img/'.$cart[$i]['image'].'" alt="" id=""></div>
                                                        
                                                        <!--  -->
                                                        <div class="layout-mobile-child1">
                                                        <div class="col2 detail-prod-cart" >
                                                            <h3 id="">
                                                                <!-- Tiêu đề sản phẩm -->
                                                                '.$cart[$i]['name'].'
                                                            </h3>
                                                            <p>Size: 
                                                                <span id="">
                                                                    <!-- Giá trị size sản phẩm -->
                                                                    '.$cart[$i]['size'].'
                                                                </span>
                                                            </p>
                                                            <!-- Nút xóa sản phẩm -->
                                                            <a href="index.php?page=cart&&id_delete_cart='.$i.'" id="">Xóa</a>
                                                        </div>

                                                        <!-- class="layout-mobile-child" chỉ có ở css mobile -->
                                                        <div class="layout-mobile-child2"> 
                                                            <!-- Tăng giảm số lượng -->
                                                            <div class="col3 count-prod-cart">
                                                                    <button class="btn-cout" id="decrease-cout-cart">-</button>
                                                                    <span class="quantity" id="quantity-cout-cart">'.$cart[$i]['quantity'].'</span>
                                                                    <button class="btn-cout" id="increase-cout-cart">+</button>
                                                            </div>
                                                            <div class="col4 price-prod-cart">
                                                                <p><span id="">'.number_format($cart[$i]['price']).'</span> đ</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                        <div class="col5 price-prod-cart totalprice-prod">
                                                            <p><span id="">'.number_format($cart[$i]['quantity'] * $cart[$i]['price']).'</span> đ</p>
                                                        </div>
                                            </div>';
                                    }
                                }
                            }

                            ?>
                            <div class="payments-cart">
                                    <div class="custom-note-cart">
                                        <label onclick="shownote()" for="">Chú thích cho chủ cửa hàng:</label>
                                        <div id="form-note">
                                            <form action="" method="post">
                                                <textarea placeholder="" name="" id=""></textarea>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="payment-cart">
                                        <div class="total-price-cart">
                                            <label for="">Tổng Tiền:</label>
                                            <span id=""><?php echo $total ?> đ</span>
                                        </div>
                                        <p>Voucher</p>
                                        <div class="btn-payment">
                                            <a class="btn-pay btn-link" href="index.php?page=payment">Thanh Toán</a>
                                            <a class="btn-update btn-link" href="">Cập Nhật</a>
                                        </div>


                                    </div>
                            </div>
                    </div>
                </div>