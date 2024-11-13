<?php
print_r($data);
    if(isset($data) && !empty($data)){
        if(isset($data['order']) && !empty($data['order'])){
            $order = $data['order'];
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
                                <button name="delete_voucher_for_id_voucher" type="submit" id="admin-function-delete"><i class="fa-solid fa-trash"></i>Xóa đơn hàng</button>
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
                                                    <td><input class="get-id-product-delete"  name="checkid_pro[]" value="'.$item['id_giamgia'].'" type="checkbox"></th>
                                                    <td>'.$stt.'</td>
                                                    <td>'.$item['ten_nguoinhan'].'</td>
                                                    <td>'.$item['diachi_nguoinhan'].'đ</td>
                                                    <td>'.$item['sdt_nguoinhan'].'</td>
                                                    <td>'.$item['gia_tong_don_hang'].'</td>
                                                    <td><a href="index.php?page_adm=pendingorder&&id_order_ct='.$item['id_giamgia'].'">Xem chi tiết</a></td>
                                                    <td><a href="index.php?page_adm=pendingorder&&id_order_edit='.isset($_SESSION['admin']) && !empty($_SESSION['admin']) ? $_SESSION['admin']['id_kh'] : 0 .'">Xác nhận</i></a></td>
                                                    <td><a href="index.php?page_adm=pendingorder&&id_pro_delete='.$item['id_sanpham'].'">Hủy</i></a></i></td>
                                                </tr>';
                                        }
                                    }
                                    ?>
                                </table>
                            </div>
                        </div>
                    </form>