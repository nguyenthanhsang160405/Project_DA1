<?php
    if(isset($data) && !empty($data)){
        if(isset($data['err']) && !empty($data['err'])){
            $err = $data['err'];
        }
        if(isset($data['ifm']) && !empty($data['ifm'])){
            $ifm = $data['ifm'];
        }
        if(isset($data['notification']) && !empty($data['notification'])){
            $notification = $data['notification'];
        }
    }
?>
<div class="admin-showdata">
                        <div class="admin-table-ifm">
                            <form action="index.php?page_adm=addvoucher" method="post" enctype="multipart/form-data">
                                <h3>THÊM VOUCHER GIẢM GIÁ</h3>
                                <?php 
                                    if(isset($notification) && !empty($notification)){
                                        echo '
                                        <span style="color:green">'.$notification.'</span>
                                        <br><br>';
                                    }
                                ?>
                                <label for="">Mã giảm :</label><span><?php if(isset($err['err_ma_giam']) && !empty($err['err_ma_giam'])) echo $err['err_ma_giam'] ?></span><br>
                                <input type="text" name="ma_giam" value="<?php if(isset($ifm['ma_giam']) && !empty($ifm['ma_giam'])) echo $ifm['ma_giam'] ?>"><br>
                                <label for="">Số tiền giảm: </label><span><?php if(isset($err['err_tien_giam']) && !empty($err['err_tien_giam'])) echo $err['err_tien_giam'] ?></span><br>
                                <input type="number" name="tien_giam" value="<?php if(isset($ifm['tien_giam']) && !empty($ifm['tien_giam'])) echo $ifm['tien_giam'] ?>">
                                <br>
                                <br>
                                <hr>
                                <br>
                                <input type="submit" name="add_voucher" value="Thêm sản phẩm">
                                
                            </form>
                        </div>
                    </div> 