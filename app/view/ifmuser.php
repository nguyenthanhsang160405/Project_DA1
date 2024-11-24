<?php
if(isset($data) && !empty($data)){
    if(isset($data['notification_pass']) && !empty($data['notification_pass'])){
        $notification_pass = $data['notification_pass'];
    }
    if(isset($data['notification_ifm']) && !empty($data['notification_ifm'])){
        $notification_ifm = $data['notification_ifm'];
        
    }
    if(isset($data['err']) && !empty($data['err'])){
        $err = $data['err'];
    }
    if(isset($data['ifm']) && !empty($data['ifm'])){
        $ifm = $data['ifm'];
    }
} 

if(isset($_SESSION['user']) && !empty($_SESSION['user'])){
    $user = $_SESSION['user'];
}
?>
<div class="register-menu2">
            <div class="column1">
                <form action="index.php?page=usermanage" method="post">
                    <h2>Hồ sơ của tôi</h2>
                    <div class="form-group">
                        <label for="name">Họ và Tên: </label><span><?php if(isset($err['err_name'])&& !empty($err['err_name'])) echo $err['err_name'] ?></span><br>
                        <input name="name" type="text" id="name" value="<?php if(isset($user) && !empty($user)) echo $user['ten_kh'] ?>" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="phone">Số điện thoại: </label><span><?php if(isset($err['err_phone'])&& !empty($err['err_phone'])) echo $err['err_phone'] ?></span><br>
                        <input name="phone" type="tel" id="phone" value="<?php if(isset($user) && !empty($user)) echo $user['sdt_kh'] ?>" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label><br>
                        <input name="email" type="email" id="email" value="<?php if(isset($user) && !empty($user)) echo $user['email_kh'] ?>" disabled placeholder="" >
                    </div>
                    <div class="form-group">
                        <label for="address">Địa chỉ: </label><span><?php if(isset($err['err_address'])&& !empty($err['err_address'])) echo $err['err_address']?></span><br>
                        <input name="address" type="text" id="address" value="<?php if(isset($user) && !empty($user)) echo $user['diachi_kh'] ?>" placeholder="">
                    </div>
                    <button type="submit" name="update_ifm">Cập nhật thông tin</button>
                    <span><?php if(isset($notification_ifm) && !empty($notification_ifm)) echo $notification_ifm ?></span>
                </form>
            </div>
            <div class="column2">
                <form action="index.php?page=usermanage" method="post">
                    <h2>Tài khoản người dùng</h2>
                    <div class="form-group">
                        <label for="username">Tài khoản</label><br>
                        <input type="email" value="<?php if(isset($user) && !empty($user)) echo $user['email_kh'] ?>" id="username" disabled placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="password">Mật khẩu cũ: </label><span><?php if(isset($err['pass_old'])&& !empty($err['pass_old'])) echo $err['pass_old']?></span><br>
                        <input name="pass_old" value="<?php if(isset($ifm['pass_old'])&& !empty($ifm['pass_old'])) echo $ifm['pass_old']?>" type="password" id="password" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="password">Mật khẩu mới: </label><span><?php if(isset($err['pass'])&& !empty($err['pass'])) echo $err['pass']?></span><br>
                        <input name="pass" type="text" value="<?php if(isset($ifm['pass'])&& !empty($ifm['pass'])) echo $ifm['pass']?>" id="password" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="confirm-password">Nhập lại mật khẩu: </label><span><?php if(isset($err['xnpass'])&& !empty($err['xnpass'])) echo $err['xnpass']?></span><br>
                        <input name="xnpass" value="<?php if(isset($ifm['xnpass'])&& !empty($ifm['xnpass'])) echo $ifm['xnpass']?>" type="text" id="confirm-password" placeholder="">
                    </div>
                    <button name="update_pass" type="submit" >Cập nhật</button>
                    <span><?php if(isset($notification_pass) && !empty($notification_pass)) echo $notification_pass ?></span>
                </form> 
                
            </div>
        </div>