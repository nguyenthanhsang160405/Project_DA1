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
                            <form action="index.php?page_adm=adduser" method="post" enctype="multipart/form-data">
                                <h3>THÊM NGƯỜI DÙNG</h3>
                                <?php 
                                    if(isset($notification) && !empty($notification)){
                                        echo '
                                        <span style="color:green">'.$notification.'</span>
                                        <br><br>';
                                    }
                                ?>
                                <label for="">Tên người dùng:</label><span><?php if(isset($err['err_name']) && !empty($err['err_name'])) echo $err['err_name'] ?></span><br>
                                <input type="text" name="name" value="<?php if(isset($ifm['name']) && !empty($ifm['name'])) echo $ifm['name'] ?>"><br>
                                <label for="">Email:</label><span><?php if(isset($err['err_email']) && !empty($err['err_email'])) echo $err['err_email'] ?></span><br>
                                <input type="email" name="email" value="<?php if(isset($ifm['email']) && !empty($ifm['email'])) echo $ifm['email'] ?>"><br>
                                <label for="">Mật khẩu:</label><span><?php if(isset($err['err_pass']) && !empty($err['err_pass'])) echo $err['err_pass'] ?></span><br>
                                <input type="text" name="pass" value="<?php if(isset($ifm['pass']) && !empty($ifm['pass'])) echo $ifm['pass'] ?>"><br>
                                <label for="">Địa chỉ:</label><span><?php if(isset($err['err_address']) && !empty($err['err_address'])) echo $err['err_address'] ?></span><br>
                                <input type="text" name="address" value="<?php if(isset($ifm['address']) && !empty($ifm['address'])) echo $ifm['address'] ?>"><br>
                                <label for="">Số điện thoại:</label><span><?php if(isset($err['err_phone']) && !empty($err['err_phone'])) echo $err['err_phone'] ?></span><br>
                                <input type="text" name="phone" value="<?php if(isset($ifm['phone']) && !empty($ifm['phone'])) echo $ifm['phone'] ?>"><br>
                                <label for="">Vai trò:</label><br>
                                <select name="role" id="">
                                    <option style="width: 40px;" value="1">KHÁCH HÀNG</option>
                                    <option style="width: 40px;" value="2">ADMIN</option>
                                </select>
                                <br>
                                <br>
                                <input type="submit" name="add_user" value="Thêm người dùng">
                            </form>
                        </div>
                    </div> 