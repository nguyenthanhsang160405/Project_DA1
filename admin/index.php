<?php 
    ob_start();
    session_start();
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
        }
    }else{
        include_once './app/view/catepro.php';
    }
    include_once './app/view/footer.php';

?>