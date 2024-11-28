<?php
    ob_start();
    session_start();
    if(!isset($_SESSION['user'])){
        $_SESSION['user'] = [];
    }
    if(!isset($_SESSION['cart'])){
        $_SESSION['cart'] = [];
    }
    // unset($_SESSION['cart']);
    include_once 'app/controller/paymentCtl.php';
    include_once 'app/model/cartModel.php';
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
    include_once 'app/controller/registerCtl.php';
    include_once 'app/controller/cartCtl.php';
    include_once 'app/controller/IfmUserCtl.php';
    include_once 'app/controller/historyOrderCtl.php';
    include_once 'app/controller/detailorderUserCtl.php';
    include_once 'app/controller/lookbookCtl.php';
    include_once 'app/controller/aboutCtl.php';
    include_once 'app/controller/contactCtl.php';
    include_once 'app/model/MaillerUser.php';
    include_once 'app/controller/detaillookbookCtl.php';

    $header = new HeaderCtl();
    $header->ViewHeader();

    if(isset($_GET['page'])){
        $page = $_GET['page'];
        if($page != 'product' && $page != 'sigin' && $page != 'usermanage' && $page != 'detail' && $page != 'register' && $page != 'cart' && $page != 'lookbook' && $page !='about' && $page != 'contact' && $page != 'detaillookbook' &&  $page != 'payment'){
            $alike = new AlikeCtl();
            $alike->ViewAlike();
        }
    }else{
        $alike = new AlikeCtl();
        $alike->ViewAlike();
    }
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
            case 'register':
                $register = new RegisterCtl();
                $register->ViewRegister();
                break;
            case 'cart':
                $cart = new CartCtl();
                $cart->ViewCart();
                break;
            case 'payment':
                $payment = new PaymentCtl();
                $payment->ViewPayment();
                break;
            case 'lookbook':
                $lookbook=  new LookbookCtl();
                $lookbook->ViewLookBook();
                break;
            case 'about';
                $about = new AboutCtl();
                $about->ViewAbout();
                break;
            case 'contact';
                $contact = new ContactCtl();
                $contact->ViewContact();
                break;
            case 'detaillookbook';
                $detail_lookbook = new DetaillookbookCtl();
                $detail_lookbook->ViewDetailLookBook();
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