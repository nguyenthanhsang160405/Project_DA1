<?php
    if(isset($data) && !empty($data)){

        if($data['arr_detaiorder'] && !empty($data['arr_detaiorder'])){
            $arr_detaiorder = $data['arr_detaiorder'];
        }
        if($data['nhanvien'] && !empty($data['nhanvien'])){
            $nhanvien = $data['nhanvien'];
        }
        if($data['voucher'] && !empty($data['voucher'])){
            $voucher = $data['voucher'];
        }
        if($data['checkOrder'] && !empty($data['checkOrder'])){
            $checkOrder = $data['checkOrder'];
        }
    }
?>
<div class="mainpuchase">
                <div class="puchase">
                    <div class="puchase-menu2">
                        <div class="column1">
                            <h2>Chi tiết đơn hàng</h2>
                                <table class="purchase-history-table">
                                <br>
                                <h3>Các sản phẩm</h3>
                                <thead>
                                        <th>Tên sản phẩm</th>
                                        <th>Ảnh sản phẩm</th>
                                        <th>Giá sản phẩm</th>
                                        <th>Số lượng</th>
                                        <th>Size</th>
                                        <?php 
                                            if(isset($checkOrder) && !empty($checkOrder) && $checkOrder == 2){
                                                echo '<th>Bình luận</th>';
                                            }
                                        ?>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        if(isset($arr_detaiorder) && !empty($arr_detaiorder)){
                                            for($i = 0 ; $i < count($arr_detaiorder) ; $i++){
                                                echo '<tr>
                                                        <td>'.$arr_detaiorder[$i]['ten_sanpham'].'</td>
                                                        <td><img style="width: 20px;" src="./public/img/'.$arr_detaiorder[$i]['anh_sanpham'].'" alt=""></td>
                                                        <td>'.number_format($arr_detaiorder[$i]['gia_sanpham']).'đ</td>
                                                        <td>'.$arr_detaiorder[$i]['soluong_sanpham'].'</td>
                                                        <td>'.$arr_detaiorder[$i]['size_sanpham'].'</td>';
                                                        if(isset($checkOrder) && !empty($checkOrder) && $checkOrder == 2){
                                                            echo '<td>'.($arr_detaiorder[$i]['kiemtra_comment'] == 1 ? '<a href="index.php?page=detail&&id_pro='.$arr_detaiorder[$i]['id_sanpham'].'&&id_detail_order='.$arr_detaiorder[$i]['id_ctdonhang'].'">Bình luận</a>' : 'Đã bình luận').'</td>';
                                                        }
                                                        
                                                   echo '</tr>';
                                            }
                                        }
                                    ?>
                                    <!-- Thêm các hàng mua hàng khác ở đây -->
                                </tbody>
                            </table>
                            <br>
                            <h3>Nhân viên</h3>
                            <?php 
                                if(isset($nhanvien) && !empty($nhanvien)){
                                    echo '<div style="display:flex" ><h4>Mã nhân viên : </h4><span>#'.$nhanvien['id_kh'].'</span></div>';
                                    echo '<div style="display:flex"><h4>Tên nhân viên : </h4><span>'.$nhanvien['ten_kh'].'</span></div>';
                                }else{
                                    echo '<p>Không</p>';
                                }
                            ?>
                            <br>
                            <h3>Mã giảm giá</h3>
                            <?php 
                                if(isset($voucher) && !empty($voucher)){
                                    echo '<div style="display:flex"><h4>Mã giảm : </h4><p>#'.$voucher['code_giamgia'].'</p></div>';
                                    echo '<div style="display:flex"><h4>Số tiền giảm : </h4><p>'.number_format($voucher['so_tiengiam']).'đ</p></div>';
                                }else{
                                    echo '<p>Không</p>';
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>