
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
                <a href="#">Liên hệ</a>
                <a href="#"><i class="fa-solid fa-paper-plane"></i></a>
            </div>
            <div class="menu-item">
                <span class="icon"><i class="fa-solid fa-right-to-bracket"></i></span>
                <a href="index.php?page=sigin&&logout">Đăng xuất</a>
                <a href="index.php?page=sigin&&logout"><i class="fa-solid fa-paper-plane"></i></a>
            </div>
        </div>
        <?php 
            if(isset($_GET['page_usermanage'])){
                $page_user = $_GET['page_usermanage'];
                switch($page_user){
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
            }else{
                $ifmuser = new IfmUserCtl();
                $ifmuser->ViewIfmUser();
            }
        ?>
        
    </div>
</div>