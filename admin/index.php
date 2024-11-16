<?php 
    ob_start();
    session_start();
    if(!isset($_SESSION['admin'])){
        $_SESSION['admin'] = [];
    }
    $_SESSION['admin'] = ['id_kh' => 7 ,'ten_kh' => 'Nguyễn Thanh Sang','email_kh' => 'nguyenthanhsang160405@gmail.com','matkhau_kh' => '$2y$10$LVscOsO1oiYW7' ,'diachi_kh' => '66/76 đường số 21 Nguyễn Văn Khối Gò Vấp','sdt_kh' => '0963004872','vai_tro'=>1];
    // $_SESSION['admin'] = [];
    include_once './app/controller/addimageCtl.php';
    include_once './app/controller/editimageCtl.php';
    include_once './app/controller/imageCtl.php';
    include_once './app/controller/editcateblogCtl.php';
    include_once './app/controller/addcateblogCtl.php';
    include_once '../app/model/cateBlogModel.php';
    include_once './app/controller/cateblogCtl.php';
    include_once './app/controller/acceptedorderCtl.php';
    include_once './app/controller/ediuserCtl.php';
    include_once './app/controller/adduserCtl.php';
    include_once '../app/model/UserModel.php';
    include_once './app/controller/userCtl.php';
    include_once './app/controller/pendingorderCtl.php';
    include_once '../app/model/orderModel.php';
    include_once './app/controller/editvoucherCtl.php';
    include_once './app/controller/addvoucherCtl.php';
    include_once './app/controller/voucherCtl.php';
    include_once '../app/model/voucherModel.php';
    include_once './app/controller/editproCtl.php';
    include_once '../app/model/imageProModel.php';
    include_once './app/controller/editcateCtl.php';
    include_once './app/controller/addproCtl.php';
    include_once './app/controller/productCtl.php';
    include_once '../app/model/database.php';
    include_once '../app/model/productModel.php';
    include_once '../app/model/categoryProModel.php';
    include_once './app/controller/addcateCtl.php';
    include_once './app/controller/cateproCtl.php';
    include_once './app/view/header.php';
    if(isset($_GET['page_adm']) && !empty($_GET['page_adm'])){
        $page = $_GET['page_adm'];
        switch($page){
            case 'addcatepro':
                $addcate = new AddcateCtl();
                $addcate->ViewAddCate();
                break;
            case 'catepro':
                $catepro = new CateproCtl();
                $catepro->ViewCatePro();
                break;
            case 'product':
                $catepro = new ProductCtl();
                $catepro->ViewProduct();
                break;
            case 'addpro':
                $addpro = new AddproCtl();
                $addpro->ViewAddPro();
                break;
            case 'editcatepro':
                $addpro = new EditcateCtl();
                $addpro->ViewEditCatePro();
                break;
            case 'editproduct':
                $editpro = new EditproCtl();
                $editpro->ViewEditPro();
                break;
            case 'voucher':
                $voucher = new VoucherCtl();
                $voucher->ViewVoucher();
                break;
            case 'addvoucher':
                $addvoucher = new AddvoucherCtl();
                $addvoucher->ViewAddVoucher();
                break;
            case 'editvoucher':
                $editvoucher = new EditvoucherCtl();
                $editvoucher->ViewEditVoucher();
                break;
            case 'user':
                $user = new UserCtl();
                $user->ViewUser();
                break;
            case 'adduser':
                $adduser = new AdduserCtl();
                $adduser->ViewAddUser();
                break;
            case 'pendingorder':
                $pendingorder = new PendingoderCtl();
                $pendingorder->ViewPendingOrder();
                break;
            case 'edituser':
                $edituser = new EdiuserCtl();
                $edituser->ViewEditUser();
                break;
            case 'acceptedorder':
                $acceptedordedr = new AcceptedorderCtl();
                $acceptedordedr->ViewAcceptedOrder();
                break;
            case 'cateblog':
                $cateblog = new CateblogCtl();
                $cateblog->ViewCateBlog();
                break;
            case 'addcateblog':
                $addcateblog = new AddcateblogCtl();
                $addcateblog->ViewAddCateBlog();
                break;
            case 'editcateblog':
                $editcateblog = new EditcateblogCtl();
                $editcateblog->ViewEditCateBlog();
                break;
            case 'image':
                $image = new ImageCtl();
                $image->ViewImage();
                break;
            case 'editimage':
                $editimage = new EditimageCtl();
                $editimage->ViewEditImage();
                break;
            case 'addimage':
                $addimage = new AddimageCtl();
                $addimage->ViewAddImage();
                break;
        }
    }else{
        include_once './app/view/catepro.php';
    }
    include_once './app/view/footer.php';

?>