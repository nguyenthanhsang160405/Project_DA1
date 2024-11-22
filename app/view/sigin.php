<?php
    if(isset($data) && !empty($data)){
        if(isset($data['ifm']) && !empty($data['ifm'])){
            $ifm = $data['ifm'];
        }
        if(isset($data['err']) && !empty($data['err'])){
            $err = $data['err'];
        }
        if(isset($data['notification']) && !empty($data['notification'])){
            $notification = $data['notification'];
        }
    }
?>
              
    
                <div class="main">
                <div class="danhmuc">
                    <a href="#"><i class="fa-solid fa-house"></i>Trang chủ</a>
                    <span>/</span>
                    <span>Đăng Nhập</span>
                </div>
                <div class="img-title">
                    <div class="overlay"></div>
                    <h2>Đăng Nhập</h2>
                </div>
                    <!-- Form đăng nhập -->
                    <div class="form-information">
                        <div class="form">
                            <form action="index.php?page=sigin" method="post">
                                <div class="title">
                                    <h3>ĐĂNG NHẬP</h3>
                                </div>
                                <span><?php if(isset($err['err_email']) && !empty($err['err_email'])) echo $err['err_email'] ?></span>
                                <input name = "email" type="email" placeholder="Email" name="email" id="">
                                <span><?php if(isset($err['err_pass']) && !empty($err['err_pass'])) echo $err['err_pass'] ?></span>
                                <input name="pass" type="text" placeholder="Mật khẩu" name="password" id="">
                                <button type="submit" name="login" id="button-sigin">ĐĂNG NHẬP</button>
                                <span><?php if(isset($notification) && !empty($notification)) echo $notification ?></span>
                                <button class="button-link google"><div class="pre-btn-login"><i class="fa-brands fa-google-plus-g"></i></div><p>Đăng nhập Google </p></button>
                                <button class="button-link facebook"><div class="pre-btn-login"><i class="fa-brands fa-facebook-f"></i></div><p>Đăng nhập FaceBook </p></button>
                            </form>
                                <div class="link-dieuhuong">
                                    <ul>
                                        <li><a href="">Trở về</a></li>
                                        <li><a href="index.php?page=register">Đăng kí</a></li>
                                        <li><a href="">Quên mật khẩu</a></li>
                                    </ul>
                                </div>
                        </div>
                    </div>
                </div>