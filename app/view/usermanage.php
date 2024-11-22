<?php 
if(isset($_SESSION['user']) && !empty($_SESSION['user'])){
    $user = $_SESSION['user'];
}
    
    
?>
<div class="danhmuc">
    <a href="#"><i class="fa-solid fa-house"></i>Trang chủ</a>
    <span>/</span>
    <span>HỒ SƠ NGƯỜI DÙNG</span>
</div>
<div class="mainpageuser">
    <div class="register">
        <div class="register-menu1">
            <div class="menu-item">
                <span class="icon"><i class="fa-solid fa-circle-info"></i></span>
                <a href="#">Cập nhật thông tin</a>
                <a href="#"><i class="fa-solid fa-paper-plane"></i></a>
            </div>
            <div class="menu-item">
                <span class="icon"><i class="fa-solid fa-clipboard"></i></span>
                <a href="#">Lịch sử mua hàng</a>
                <a href="#"><i class="fa-solid fa-paper-plane"></i></a>
            </div>
            <div class="menu-item">
                <span class="icon"><i class="fa-brands fa-telegram"></i></span>
                <a href="#">Liên hệ</a>
                <a href="#"><i class="fa-solid fa-paper-plane"></i></a>
            </div>
            <div class="menu-item">
                <span class="icon"><i class="fa-solid fa-right-to-bracket"></i></span>
                <a href="index.php?page=sigin&&logout">Đăng xuất</a>
                <a href="index.php?page=sigin&&logout"><i class="fa-solid fa-paper-plane"></i></a>
            </div>
        </div>
        <div class="register-menu2">
            <div class="column1">
                <form action="" method="post">
                    <h2>Hồ sơ của tôi</h2>
                    <div class="form-group">
                        <label for="name">Họ và Tên</label><br>
                        <input name="name" type="text" id="name" value="<?php if(isset($user) && !empty($user)) echo $user['ten_kh'] ?>" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="phone">Số điện thoại</label><br>
                        <input type="tel" id="phone" value="<?php if(isset($user) && !empty($user)) echo $user['sdt_kh'] ?>" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label><br>
                        <input type="email" id="email" value="<?php if(isset($user) && !empty($user)) echo $user['email_kh'] ?>" disabled placeholder="" >
                    </div>
                    <div class="form-group">
                        <label for="address">Địa chỉ</label><br>
                        <input type="text" id="address" value="<?php if(isset($user) && !empty($user)) echo $user['diachi_kh'] ?>" placeholder="">
                    </div>
                    <button>Cập nhật thông tin</button>
                </form>
            </div>
            <div class="column2">
                <form action="" method="post">
                    <h2>Tài khoản người dùng</h2>
                    <div class="form-group">
                        <label for="username">Tài khoản</label><br>
                        <input type="email" value="<?php if(isset($user) && !empty($user)) echo $user['email_kh'] ?>" id="username" disabled placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="password">Mật khẩu</label><br>
                        <input type="password" id="password" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="confirm-password">Nhập lại mật khẩu</label><br>
                        <input type="password" id="confirm-password" placeholder="">
                    </div>
                </form> 
                <button>Cập nhật</button>
            </div>
        </div>
    </div>
</div>