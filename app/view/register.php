<?php 
    if(isset($data) && !empty($data)){
        if(isset($data['err']) && !empty($data['err'])){
            $err = $data['err'];
        }
        if(isset($data['notification']) && !empty($data['notification'])){
            $notification = $data['notification'];
        }
        if(isset($data['ifm']) && !empty($data['ifm'])){
            $ifm = $data['ifm'];
        }
    }
?>
<div class="main">
                <div class="danhmuc">
                    <a href="#"><i class="fa-solid fa-house"></i>Trang chủ</a>
                    <span>/</span>
                    <span>Tạo Tài Khoản</span>
                </div>
                <div class="img-title">
                    <div class="overlay"></div>
                    <h2>Tạo Tài Khoản</h2>
                </div>
    <!-- //Form đăng ký -->
    <div class="form-information">
        <div class="form">
        <form action="index.php?page=register" method="post">
            <div class="title">
                <h3>TẠO TÀI KHOẢN</h3>
            </div>
            <span><?php if(isset($err['name']) && !empty($err['name'])) echo $err['name']  ?></span>
            <input type="text" placeholder="Tên" value="<?php if(isset($ifm['name']) && !empty($ifm['name'])) echo $ifm['name']?>" name="name" id="">
            <span class="error" id="err-email"><?php if(isset($err['email']) && !empty($err['email'])) echo $err['email']  ?></span>
            <input type="email" placeholder="Email" value="<?php if(isset($ifm['email']) && !empty($ifm['email'])) echo $ifm['email']?>" name="email" id="">
            <span class="error" id="err-password"><?php if(isset($err['pass']) && !empty($err['pass'])) echo $err['pass']  ?></span>
            <input type="password" placeholder="Mật khẩu" name="password" value="<?php if(isset($ifm['pass']) && !empty($ifm['pass'])) echo $ifm['pass']?>" id="">
            <span class="error" id="err-password"><?php if(isset($err['xnpass']) && !empty($err['xnpass'])) echo $err['xnpass']  ?></span>
            <input type="password" placeholder="Xác nhận mật khẩu" value="<?php if(isset($ifm['xnpass']) && !empty($ifm['xnpass'])) echo $ifm['xnpass']?>" name="xnpassword" id="">
            <button type="submit" name=register id="button-sigin">TẠO TÀI KHOẢN</button>
            <button class="button-link google"><div class="pre-btn-login"><i class="fa-brands fa-google-plus-g"></i></div><p>Đăng nhập Google </p></button>
            <button class="button-link facebook"><div class="pre-btn-login"><i class="fa-brands fa-facebook-f"></i></div><p>Đăng nhập FaceBook </p></button>
        </form>
        <div class="link-dieuhuong">
            <ul>
                <li><a href="index.php?page=sigin">Trở về</a></li>
            </ul>
        </div>
        </div>
    </div>
</div>