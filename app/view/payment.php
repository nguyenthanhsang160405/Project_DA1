<?php
    if(isset($data) && !empty($data)){
        if(isset($data['cart']) && !empty($data['cart'])){
            $cart = $data['cart'];
        }
        
        if(isset($data['voucher']) && !empty($data['voucher'])){
            $voucher = $data['voucher'];
        }

        if(isset($data['notification']) && !empty($data['notification'])){
            $notification = $data['notification'];
        }
        $total = 0;
        if(isset($cart) && !empty($cart)){
            for($i = 0 ; $i < count($cart) ; $i++){
                $total += $cart[$i]['soluong_sanpham'] * $cart[$i]['gia_sanpham'];
            }
        }
    }
   
?>
<div class="img-title">
        <div class="overlay"></div>
        <h2>TÀI KHOẢN</h2>
    </div>
    <main>
        <div class="checkout-form">
            <form action="index.php?page=payment" method="post"></form>
                <h2>Dwin Store - Thương hiệu bán đồ hàng đầu Việt Nam</h2>
                <h3>Thông tin thanh toán</h3>
                <form action="index.php?page=payment" method="post">
                    <input type="text" placeholder="Việt Nam" >
                    <input type="text" name="name" placeholder="Họ và Tên*" required>
                    <input type="text" name="phone" placeholder="Điện thoại*" required>
                    <input type="text" name="address" placeholder="Địa chỉ*"   required>   
                    <input type="text" name="email" placeholder="Email*" required> 
                    <input type="hidden" name="total" value="<?php echo $total - (isset($voucher) && !empty($voucher) ? $voucher['so_tiengiam'] : 0) ?>" id="">
                    <input type="hidden" name="id_voucher" value="<?php if(isset($voucher) && !empty($voucher)) echo $voucher['id_giamgia'] ?>">
                    <h4>Phương thức thanh toán</h4>
                    <label>
                        <input type="radio" name="payment" checked>
                        Thanh toán khi nhận hàng (COD)
                    </label>
                    <div class="cart-checkout">
                        <!-- <input type="submit" name="cart-link" value="Giỏ Hàng"  class="cart-link"> -->
                        <a href="cart.html" name="giohang" class="giohang">Giỏ Hàng</a>
                        <input type="submit" name="checkout_button" value="Đặt Hàng" class="checkout-button">
                    </div>
                </form>
                
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
                <form action="index.php?page=payment" method="post">
                <?php if(isset($notification) && !empty($notification)) echo '<span>'.$notification.'</span>'  ?>
                <input type="text" name="voucher" class="order-summaryinput1" value="<?php if(isset($voucher) && !empty($voucher)) echo $voucher['code_giamgia'] ?>"  placeholder="Mã giảm giá">
                <input type="submit" name = "order_summary" value="Sử Dụng" class="order-summarysubmit">
                </form>
                <div class="total">
                    <span class="total-label">Tổng tiền</span>
                    <span class="total-amount"><?php echo number_format($total - (isset($voucher) && !empty($voucher) ? $voucher['so_tiengiam'] : 0)) ?> VNĐ</span>
                </div>

                <ul>
                    <li>Khách hàng vui lòng thanh toán phí vận chuyển khi nhận hàng.</li>
                    <li>Freeship toàn quốc đối với đơn hàng >1.000.000 chuyển khoản trước.</li>
                </ul>
            </form>    
        </div>
    </main>