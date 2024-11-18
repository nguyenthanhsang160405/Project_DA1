<?php
    if(isset($data) && !empty($data)){
        if(isset($data['acceptedorder']) && !empty($data['acceptedorder'])){
            $order = $data['acceptedorder'];
        }
        if(isset($data['notification']) && !empty($data['notification'])){
            $tb = $data['notification'];
        }
    }
?>
<form action="index.php?page_adm=pendingorder" method="post">
                        <div class="admin-showdata">
                        <h3>ĐƠN HÀNG ĐÃ XÁC NHẬN</h3>
                            <br>
                            <hr>
                            <br>
                            <br>
                            <div class="admin-table-ifm">
                                <table border="1">
                                    <tr>
                                        <th>STT</th>
                                        <th>Họ tên</th>
                                        <th>Địa chỉ</th>
                                        <th>Số điện thoại</th>
                                        <th>Giá tổng đơn hàng</th>
                                        <th>Tên nhân viên</th>
                                        <th>Chi tiết đơn hàng</th>
                                    </tr>
                                    <?php
                                    if(isset($order) && !empty($order)){
                                        $stt = 0;
                                        foreach($order as $item){
                                            $stt = $stt + 1;
                                            echo '<tr>
                                                    <td>'.$stt.'</td>
                                                    <td>'.$item['ten_nguoinhan'].'</td>
                                                    <td>'.$item['diachi_nguoinhan'].'đ</td>
                                                    <td>'.$item['sdt_nguoinhan'].'</td>
                                                    <td>'.number_format($item['gia_tong_don_hang']).'đ</td>
                                                    <td>'.$item['ten_nhanvien'].'</td>
                                                    <td><a href="index.php?page_adm=pendingorder&&id_order_ct='.$item['id_donhang'].'">Xem chi tiết</a></td>
                                                </tr>';
                                        }
                                    }
                                    ?>
                                </table>
                            </div>
                        </div>
                    </form>