<?php
    if(isset($data) && !empty($data)){
        if(isset($data['ifm']) && !empty($data['ifm'])){
            $ifm = $data['ifm'];
        }
        if(isset($data['err']) && !empty($data['err'])){
            $err = $data['err'];
        }
       print_r($data);
    }
?>
<div class="main">
                <div class="danhmuc">
                    <a href="#"><i class="fa-solid fa-house"></i>Trang chủ</a>
                    <span>/</span>
                    <span>Cài đặt lại mật khẩu</span>
                </div>
                <div class="img-title">
                    <div class="overlay"></div>
                    <h2>Cài đặt lại mật khẩu</h2>
                </div>
                    <!-- Form đăng nhập -->
                    <div class="form-information">
                        <div class="form">
                                <form action="index.php?page=otp" method="post">
                                    <div class="title">
                                        <h3>Cài đặt lại mật khẩu</h3>
                                    </div>

                                    <!-- Lỗi email -->
                                    <span class="error" id="err-email"><?php if(isset($err['email'])&& !empty($err['email'])) echo $err['email'] ?></span>
                                    <input type="email" placeholder="Email" name="email" id="" value="<?php if(isset($ifm['email'])&& !empty($ifm['email'])) echo $ifm['email'] ?>">
                                    <button name="button-sigin" id="button-sigin">Gửi</button>
                                </form>
                                <div class="link-dieuhuong">
                                    <ul>
                                        <li><a href="">Bỏ qua</a></li>
                                    </ul>
                                </div>
                        </div>
                    </div>
                </div>