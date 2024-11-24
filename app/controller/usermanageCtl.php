<?php 
    class UsermanageCtl{
        public $data;
        public function __construct(){    
        }
        public function RenderView($data,$view){
            $seen = 'app/view/'.$view.'.php';
            include_once $seen;
        }
        public function CheckLogin(){
            if(empty($_SESSION['user'])){
                header('location:index.php?page=sigin');
            }
        }
        public function ViewUserManage(){
            $this->CheckLogin();
            $this->RenderView($this->data,'usermanage');
        }
    }
?>