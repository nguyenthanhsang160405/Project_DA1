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
                <a href="index.php?page=usermanage&&page_usermanage=ifmuser">Cập nhật thông tin</a>
                <a href="index.php?page=usermanage&&page_usermanage=ifmuser"><i class="fa-solid fa-paper-plane"></i></a>
            </div>
            <div class="menu-item">
                <span class="icon"><i class="fa-solid fa-clipboard"></i></span>
                <a href="index.php?page=usermanage&&page_usermanage=history_order">Lịch sử mua hàng</a>
                <a href="index.php?page=usermanage&&page_usermanage=history_order"><i class="fa-solid fa-paper-plane"></i></a>
            </div>
            <div class="menu-item">
                <span class="icon"><i class="fa-brands fa-telegram"></i></span>
                <a href="index.php?page=contact">Liên hệ</a>
                <a href="#"><i class="fa-solid fa-paper-plane"></i></a>
            </div>
            <div class="menu-item">
                <span class="icon"><i class="fa-solid fa-right-to-bracket"></i></span>
                <a href="index.php?page=sigin&&logout">Đăng xuất</a>
                <a href="index.php?page=sigin&&logout"><i class="fa-solid fa-paper-plane"></i></a>
            </div>
        </div>
        <?php
        //Nếu người dùng lấy dữ liệu trong page_usermanage Trong URL
            if(isset($_GET['page_usermanage'])){
            // kiểm tra sự tồn tại  kiểm tra sự tồn tại của tham số page_usermanage trong URL
            // thì lấy giá trị của pgae_usemanage
                $page_user = $_GET['page_usermanage'];
                // giá trị của nó được gán cho biến $page_user. sau đó sẽ sử dụng swith để điều hướng
                switch($page_user){
                    //Nếu giá trị của $page_user là 'ifmuser', một đối tượng của lớp IfmUserCtl sẽ được tạo ra và phương thức ViewIfmUser() sẽ được gọi.
                    case 'ifmuser':
                        $ifmuser = new IfmUserCtl();
                        $ifmuser->ViewIfmUser();
                        break;
                    case 'history_order';
                        $history_order = new HistoryOrderCtl();
                        $history_order->ViewHistoryOreder();
                        break;
                    case 'detailorderUser':
                        $detai_order = new DetailorderUserCtl();
                        $detai_order->ViewDetailOrederUser();
                        break;
                }

                //Nếu không có tham số page_usermanage trong URL (hoặc tham số này không hợp lệ), chương trình sẽ thực hiện hành động mặc định.
                // Trong trường hợp này, nó sẽ tạo đối tượng của lớp IfmUserCtl và gọi phương thức ViewIfmUser() để hiển thị trang quản lý người dùng.
            }else{
                $ifmuser = new IfmUserCtl();
                $ifmuser->ViewIfmUser();
            }
        ?>

    </div>
</div>