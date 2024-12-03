<?php
    if(isset($data) && !empty($data)){
        if(isset($data['voucher']) && !empty($data['voucher'])){
            $voucher = $data['voucher'];
        }
        if(isset($data['err']) && !empty($data['err'])){
            $err = $data['err'];
        }
        if(isset($data['notification']) && !empty($data['notification'])){
            $notification = $data['notification'];
        }
    }
?>
<div class="admin-showdata">
                        <div class="admin-table-ifm">
                            <form action="index.php?page_adm=editvoucher&&id_edit_voucher=<?php if(isset($voucher['id_giamgia']) && !empty($voucher['id_giamgia'])) echo $voucher['id_giamgia'] ?>" method="post" enctype="multipart/form-data">
                                <h3>THÊM VOUCHER GIẢM GIÁ</h3>
                                <?php 
                                    if(isset($notification) && !empty($notification)){
                                        echo '
                                        <span style="color:green">'.$notification.'</span>
                                        <br><br>';
                                    }
                                ?>
                                <label for="">Mã giảm :</label><span><?php if(isset($err['err_ma_giam']) && !empty($err['err_ma_giam'])) echo $err['err_ma_giam'] ?></span><br>
                                <input type="text" name="ma_giam" value="<?php if(isset($voucher['code_giamgia']) && !empty($voucher['code_giamgia'])) echo $voucher['code_giamgia'] ?>"><br>
                                <label for="">Số tiền giảm: </label><span><?php if(isset($err['err_tien_giam']) && !empty($err['err_tien_giam'])) echo $err['err_tien_giam'] ?></span><br>
                                <input type="number" name="tien_giam" value="<?php if(isset($voucher['so_tiengiam']) && !empty($voucher['so_tiengiam'])) echo $voucher['so_tiengiam'] ?>">
                                <label for="">Số lần sử dụng: </label><span><?php if(isset($err['err_so_lan']) && !empty($err['err_so_lan'])) echo $err['err_so_lan'] ?></span><br>
                                <input type="number" name="so_lan" value="<?php if(isset($voucher['so_lan']) && !empty($voucher['so_lan'])) echo $voucher['so_lan'] ?>">
                                <input type="hidden" name="id_voucher" value="<?php if(isset($voucher['id_giamgia']) && !empty($voucher['id_giamgia'])) echo $voucher['id_giamgia'] ?>">
                                <br>
                                <br>
                                <hr>
                                <br>
                                <input type="submit" name="edit_voucher" value="Thêm sản phẩm">
                            </form>
                        </div>
                    </div>