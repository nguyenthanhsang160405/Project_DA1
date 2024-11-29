<?php
    if(isset($data) && !empty($data)){
        if(isset($data['email']) && !empty($data['email'])){
            $email = $data['email'];
        }
        if(isset($data['ifm']) && !empty($data['ifm'])){
            $ifm = $data['ifm'];
        }
        if(isset($data['err']) && !empty($data['err'])){
            $err = $data['err'];
        }
    }
    print_r($data);
?>
<div class="main">
                <div class="danhmuc">
                    <a href="#"><i class="fa-solid fa-house"></i>Trang chủ</a>
                    <span>/</span>
                    <span>Đăng Nhập</span>
                </div>
                <div class="img-title">
                    <div class="overlay"></div>
                    <h2>Cập nhật mật khẩu</h2>
                </div>
                    <!-- Form đăng nhập -->
                    <div class="form-information">
                        <div class="form">
                                <form action="index.php?page=changepass&&email=<?php if(isset($email) && !empty($email)) echo $email?>" method="post">
                                    <div class="title">
                                        <h3>Cập nhật mật khẩu</h3>
                                    </div>

                                    <!-- Lỗi email -->
                                    <span class="error" id="err-email"><?php if(isset($err['otp']) && !empty($err['otp'])) echo $err['otp'] ?></span>
                                    <input type="text" name="otp" placeholder="Nhập mã OTP" value="<?php if(isset($ifm['otp']) && !empty($ifm['otp'])) echo $ifm['otp'] ?>" id="">
                                    <!-- Lỗi pass -->
                                    <span class="error" id="err-password"><?php if(isset($err['new_pass']) && !empty($err['new_pass'])) echo $err['new_pass'] ?></span>
                                    <input type="text" name="new_pass" value="<?php if(isset($ifm['new_pass']) && !empty($ifm['new_pass'])) echo $ifm['new_pass'] ?>" placeholder="Mật khẩu mới" name="password"class="">
                                    <span class="error" id="err-password"><?php if(isset($err['err_xnnew_pass']) && !empty($err['err_xnnew_pass'])) echo $err['err_xnnew_pass'] ?></span>
                                    <input type="text" name="xnnew_pass" value="<?php if(isset($ifm['xnnew_pass']) && !empty($ifm['xnnew_pass'])) echo $ifm['xnnew_pass'] ?>" placeholder="Nhập lại mật khẩu" name="password"class="">
                                    <input type="hidden" name="email" value="<?php if(isset($email) && !empty($email)) echo $email?>" name="password"class="">
                                    <button name="update_user" id="button-sigin">Cập nhật</button>
                                </form>
                                <div class="link-dieuhuong">
                                    <ul>
                                        <li><a href="index.php?page=sigin">Trở về</a></li>
                                        
                                    </ul>
                                </div>
                        </div>
                    </div>
                </div>