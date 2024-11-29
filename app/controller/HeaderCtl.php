<?php 
    class HeaderCtl{
        public $data;
        public $cate;
        public $user;
        public function __construct(){
            $this->cate = new CategoryModel();
            $this->user = new UserModel();
        }
        public function getAllCate(){
            $this->data['cate'] = $this->cate->getAllCate();
        }
        public function DeleteOTP_HetHan(){
            $arr_user = $this->user->getAllUser();
            $date = date('H:i:s');
            $timestamp = strtotime(($date));
            for($i = 0 ; $i < count($arr_user) ; $i++ ){
                if($arr_user[$i]['time_otp'] < $timestamp){
                    $this->user->InsertOTP_Time_User(["","",$arr_user[$i]['email_kh']]);
                }
            }

        }
        public function RenderView($data,$view){
            $seen = 'app/view/'.$view.'.php';
            include_once $seen;
        }
        public function ViewHeader(){
            $this->DeleteOTP_HetHan();
            $this->getAllCate();
            $this->RenderView($this->data,'header');
        }
    }
?>