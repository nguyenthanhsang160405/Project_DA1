<?php
    ob_start();
    session_start();
    
    include_once 'app/model/database.php';
    include_once 'app/model/productModel.php';
    include_once 'app/model/categoryProModel.php';
    include_once 'app/controller/homeController.php';
    include_once 'app/controller/userController.php';
    $db = new Database();


    include_once 'app/view/header.php';
    if(isset($_POST['page']) && $_POST['page']){
        switch($_POST['page']){
            


            default:
            $home = new homeController();
            $home ->homeController();
            break;
        }
    }else{
        require_once('app/view/home.php');
        $home = new homeController();
        $home -> homeController();
    }
        // require_once('app/view/footer.php');
        $footer = new userController();
        $footer->footer();

?>