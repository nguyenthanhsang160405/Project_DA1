<?php 
    if(isset($data) && !empty($data)){
        if(isset($data['order']) && !empty($data['order'])){
            $order = $data['order'];
        }
    }
?>
<div class="mainpuchase">
                <div class="puchase">
                    <div class="puchase-menu2">
                        <div class="column1">
                            <h2>Lịch sử mua hàng của bạn</h2>
                                <table class="purchase-history-table">
                                <thead>
                                    <tr>
                                        <th>Mã Đơn Hàng</th>
                                        <th>Tên người nhận</th>
                                        <th>Số điện thoại</th>
                                        <th>Email</th>
                                        <th>Địa chỉ</th>
                                        <th>Giá tổng</th>
                                        <th>Chi tiết</th>
                                        <th>Trạng thái</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        if(isset($order) && !empty($order)){
                                            for($i = 0 ; $i < count($order) ; $i++){
                                                echo '<tr>
                                                        <td>#'.$order[$i]['id_donhang'].'</td>
                                                        <td>'.$order[$i]['ten_nguoinhan'].'</td>
                                                        <td>'.$order[$i]['sdt_nguoinhan'].'</td>
                                                        <td>'.$order[$i]['email_nguoinhan'].'</td>
                                                        <td>'.$order[$i]['diachi_nguoinhan'].'</td>
                                                        <td>'.number_format($order[$i]['gia_tong_don_hang']).'đ</td>
                                                        <td><a href="index.php?page=usermanage&&page_usermanage=detailorderUser&&id_order='.$order[$i]['id_donhang'].'">Xem chi tiết</a></td>
                                                        <td>'.($order[$i]['ten_nhanvien']== '' && $order[$i]['id_nhanvien'] == '' ? 'Chờ xác nhận' : 'Đã xác nhận').'</td>
                                                    </tr>';
                                            }
                                        }
                                    ?>
                                    <!-- Thêm các hàng mua hàng khác ở đây -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>