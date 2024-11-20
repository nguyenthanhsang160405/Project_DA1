<?php
    if(isset($data) && !empty($data)){
        if(isset($data['pending_order']) && !empty($data['pending_order'])){
            $order = $data['pending_order'];
        }
        if(isset($data['notification']) && !empty($data['notification'])){
            $tb = $data['notification'];
        }
    }
?>
<form action="index.php?page_adm=pendingorder" method="post">
                        <div class="admin-showdata">
                        <h3>ĐƠN HÀNG CHỜ XÁC NHẬN</h3>
                            <div class="admin-function">
                            <button name="accept_order_for_id_order" type="submit" id="admin-function-delete"><i class="fa-solid fa-circle-check"></i>Chấp nhận tất cả</button>
                                <button name="delete_order_for_id_order" type="submit" id="admin-function-delete"><i class="fa-solid fa-trash"></i>Xóa tất cả đơn hàng</button>
                            </div>
                            <br>
                            <span id="ht-tb-da-thanh-cong"><?php  if(isset($tb) && !empty($tb)) echo $tb?></span>
                            <br>
                            <hr>
                            <br>
                            <br>
                            <div class="admin-table-ifm">
                                <table border="1">
                                    <tr>
                                        <th><input onclick="checkAll()" id="box-checkall-delete-pro" type="checkbox"></th>
                                        <th>STT</th>
                                        <th>Họ tên</th>
                                        <th>Địa chỉ</th>
                                        <th>Số điện thoại</th>
                                        <th>Giá tổng đơn hàng</th>
                                        <th>Chi tiết đơn hàng</th>
                                        <th colspan="2" >Xác nhận</th>
                                    </tr>
                                    <?php
                                    if(isset($order) && !empty($order)){
                                        $stt = 0;
                                        foreach($order as $item){
                                            $stt = $stt + 1;
                                            echo '<tr>
                                                    <td><input class="get-id-product-delete"  name="checkid_pro[]" value="'.$item['id_donhang'].'" type="checkbox"></th>
                                                    <td>'.$stt.'</td>
                                                    <td>'.$item['ten_nguoinhan'].'</td>
                                                    <td>'.$item['diachi_nguoinhan'].'</td>
                                                    <td>'.$item['sdt_nguoinhan'].'</td>
                                                    <td>'.number_format($item['gia_tong_don_hang']).'đ</td>
                                                    <td><a href="index.php?page_adm=pendingorder&&id_order_ct='.$item['id_donhang'].'">Xem chi tiết</a></td>
                                                    <td><a href="index.php?page_adm=pendingorder&&id_order_accept='.$item['id_donhang'].'"><i class="fa-solid fa-circle-check"></i></a></td>
                                                    <td><a href="index.php?page_adm=pendingorder&&id_order_delete='.$item['id_donhang'].'"><i class="fa-solid fa-circle-xmark"></i></a></td>
                                                </tr>';
                                        }
                                    }
                                    ?>
                                </table>
                            </div>
                        </div>
                    </form>