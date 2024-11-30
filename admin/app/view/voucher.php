<?php
    if(isset($data) && !empty($data)){
        if(isset($data['voucher']) && !empty($data['voucher'])){
            $voucher = $data['voucher'];
        }
        if(isset($data['notification']) && !empty($data['notification'])){
            $tb = $data['notification'];
        }
    }
?>
<form action="index.php?page_adm=voucher" method="post">
                        <div class="admin-showdata">
                        <h3>VOUCHER GIẢM GIÁ</h3>
                            <div class="admin-function">
                                <a id="admin-function-add" href="index.php?page_adm=addvoucher"><i class="fa-solid fa-calendar-plus"></i>Thêm voucher</a>
                                <button name="delete_voucher_for_id_voucher" type="submit" id="admin-function-delete"><i class="fa-solid fa-trash"></i>Xóa voucher</button>
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
                                        <th>Mã giảm</th>
                                        <th>Số tiền giảm</th>
                                        <th>Số lần sử dụng</th>
                                        <th>Ngày giờ tạo</th>
                                        <th colspan="2">Tính năng</th>
                                    </tr>
                                    <?php
                                    if(isset($voucher) && !empty($voucher)){
                                        $stt = 0;
                                        foreach($voucher as $item){
                                            $stt = $stt + 1;
                                            echo '<tr>
                                                    <td><input class="get-id-product-delete"  name="checkid_pro[]" value="'.$item['id_giamgia'].'" type="checkbox"></th>
                                                    <td>'.$stt.'</td>
                                                    <td>'.$item['code_giamgia'].'</td>
                                                    <td>'.number_format($item['so_tiengiam']).'đ</td>
                                                    <td>'.$item['so_lan'].'</td>
                                                    <td>'.$item['ngay_gio_tao'].'</td>
                                                    <td><a href="index.php?page_adm=editvoucher&&id_edit_voucher='.$item['id_giamgia'].'"><i class="fa-regular fa-pen-to-square"></i></a></td>
                                                    <td><a href="index.php?page_adm=voucher&&id_delete_voucher='.$item['id_giamgia'].'"><i class="fa-solid fa-trash"></i></a></td>
                                                </tr>';
                                        }
                                    }
                                    ?>
                                </table>
                            </div>
                        </div>
                    </form>