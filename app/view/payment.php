<?php
    if(isset($data) && !empty($data)){
        if(isset($data['cart']) && !empty($data['cart'])){
            $cart = $data['cart'];
        }
    }
?>
<div class="img-title">
        <div class="overlay"></div>
        <h2>TÀI KHOẢN</h2>
    </div>
    <div class="container">
        <div class="checkout-form">
            <form action="" method="post"></form>
                <h2>Dwin Store - Thương hiệu bán đồ hàng đầu Việt Nam</h2>
                <h3>Thông tin thanh toán</h3>
                <form>
                    <input type="text" placeholder="Việt Nam" required>
                    <input type="text" placeholder="Họ và Tên*" required>
                    <input type="text" placeholder="Điện thoại*" required>
                    <input type="text" placeholder="Địa chỉ*"  required>   
                    <input type="text" placeholder="Email*" required> 
                    
                    <h4>Phương thức thanh toán</h4>
                    <label>
                        <input type="radio" name="payment" checked>
                        Thanh toán khi nhận hàng (COD)
                    </label>
                </form>
                <div class="cart-checkout">
                    <input type="submit" name="cart-link" value="Giỏ Hàng"  class="cart-link">
                    <input type="submit" name="checkout-button" value="Đặt Hàng" class="checkout-button">
            
         
                </div>
            </form>      
        </div>
        
        <div class="order-summary">
            <form action="" method="post"></form>
                <table>
                    <tr>
                        <th></th>
                        <th>SIZE</th>
                        <th>SỐ LƯỢNG</th>
                        <th>TÊN SẢN PHẨM</th>
                        <th>GIÁ</th>
                    </tr>
                    <?php 
                         if(isset($cart) && !empty($cart)){
                            for($i = 0 ; $i < count($cart) ; $i++){
                                echo '<tr>
                                        <td><img src="./public/img/'.$cart[$i]['anh_sanpham'].'" alt=""></td>
                                        <td>'.$cart[$i]['size_sanpham'].'</td>
                                        <td>'.$cart[$i]['soluong_sanpham'].'</td>
                                        <td>'.$cart[$i]['ten_sanpham'].'</td>
                                        <td>'.number_format($cart[$i]['gia_sanpham']).'VNĐ</td>
                                    </tr>';
                            }
                         }
                    ?>
                </table>
                <input type="text" class="order-summaryinput1"  placeholder="Mã giảm giá">
                <input type="submit" name = "order-summary submit" value="Sử Dụng" class="order-summarysubmit">
                <div class="total">
                    <span class="total-label">Tổng tiền</span>
                    <span class="total-amount">7,000,000 VNĐ</span>
                </div>

                <ul>
                    <li>Khách hàng vui lòng thanh toán phí vận chuyển khi nhận hàng.</li>
                    <li>Freeship toàn quốc đối với đơn hàng >1.000.000 chuyển khoản trước.</li>
                </ul>
            </form>    
        </div>
    </div>