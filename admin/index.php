<?php 
    ob_start();
    session_start();
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
                $editvoucher = new EditvoucherCtl;
                $editvoucher->ViewEditVoucher();
                break;
        }
    }else{
        include_once './app/view/catepro.php';
    }
    include_once './app/view/footer.php';

?>