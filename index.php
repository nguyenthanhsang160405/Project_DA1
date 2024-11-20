<?php
    ob_start();
    session_start();
    if(!isset($_SESSION['user'])){
        $_SESSION['user'] = [];
    }
    include_once 'app/model/database.php';
    include_once 'app/model/productModel.php';
    include_once 'app/model/categoryProModel.php';
    include_once 'app/model/blogModel.php';
    include_once 'app/model/cateBlogModel.php';
    include_once 'app/model/commentModel.php';
    include_once 'app/model/detailOrderModel.php';
    include_once 'app/model/imageProModel.php';
    include_once 'app/model/MaillerUser.php';
    include_once 'app/model/orderModel.php';
    include_once 'app/model/UserModel.php';
    include_once 'app/model/voucherModel.php';
    include_once 'app/controller/homeController.php';
    include_once 'app/controller/HeaderCtl.php';
    include_once 'app/controller/productCtl.php';
    include_once 'app/controller/alikeCtl.php';
    include_once 'app/controller/siginCtl.php';
    include_once 'app/controller/usermanageCtl.php';
    include_once 'app/controller/detailCtl.php';

    $header = new HeaderCtl();
    $header->ViewHeader();

    if(isset($_GET['page'])){
        $page = $_GET['page'];
        if($page != 'product' && $page != 'sigin' && $page != 'usermanage' && $page != 'detail'){
            $alike = new AlikeCtl();
            $alike->ViewAlike();
        }
    }else{
        $alike = new AlikeCtl();
        $alike->ViewAlike();
    }
    $header->ViewHeader();
    if(isset($_GET['page']) && $_GET['page']){
        $page = $_GET['page'];
        switch($page){
            case 'product':
                $product = new ProductCtl();
                $product->ViewProduct();
                break;
            case 'usermanage':
                $usermanage = new UsermanageCtl();
                $usermanage->ViewUserManage();
                break;
            case 'sigin':
                $sigin = new SiginCtl();
                $sigin->ViewSigIn();
                break;
            case 'detail':
                $detail = new DetailCtl();
                $detail->ViewDetail();
                break;
            default:
                $home = new homeController();
                $home ->ViewController();
                break;
        }
    }else{
        $home = new homeController();
        $home->ViewController();
    }
        // require_once('app/view/footer.php');
    include_once 'app/view/footer.php';
?>