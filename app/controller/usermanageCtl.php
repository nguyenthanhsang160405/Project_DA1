<?php 
    class UsermanageCtl{
        public $data;
        public $user;
        public function __construct(){
            $this->user = new UserModel();
        }
        public function RenderView($data,$view){
            $seen = 'app/view/'.$view.'.php';
            include_once $seen;
        }
        public function ViewUserManage(){
            $this->RenderView($this->data,'usermanage');
        }
    }
?>