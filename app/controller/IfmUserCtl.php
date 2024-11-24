<?php 
    class IfmUserCtl{
        public $data;
        public $user;
        public function __construct(){
            $this->user = new UserModel();
        }
        public function RenderView($data,$view){
            $seen = 'app/view/'.$view.'.php';
            include_once $seen;
        }
        public function UpdateIfm(){
            if(isset($_POST['update_ifm'])){
                echo 200;
                $id_kh = $_SESSION['user']['id_kh'];
                $err_name = '';
                $err_phone = '';
                $err_address = '';

                $name = $_POST['name'];
                $phone = $_POST['phone'];
                $address = $_POST['address'];
                $flag = 0;
                if(empty($name)){
                    $err_name = 'Tên không được để trống';
                    $flag = 1;
                }
                if(empty($phone)){
                    $err_phone = 'Số điện thoại không được để trống';
                    $flag = 1;
                }else{
                    $pattern = '/^0[0-9]{9}$/';
                    if(preg_match($pattern,$phone)==false){
                        $err_phone = 'Số điện thoại không đúng định dạng';
                        $flag = 1;
                    }
                }

                if(empty($address)){
                    $err_address = 'Số điện thoại không được để trống';
                    $flag = 1;
                }
                
                if($flag == 0){
                    $data =[$name,$phone,$address];
                    if($this->user->UpdateIfmUser($id_kh,$data)==true){
                        $_SESSION['user'] = $this->user->getOneUser($id_kh);
                        $this->data['notification_ifm'] = 'Cập nhật thông tin thành công';
                    }else{
                        $this->data['notification_ifm'] = 'Insert vào CSDL thất bại';
                    }
                }else{
                    $this->data['err'] = ['err_name'=>$err_name,'err_phone'=>$err_phone,'err_address'=>$err_address];
                }
                
            }
        }
        public function UpdatePassword(){
            if(isset($_POST['update_pass'])){
                $err_pass = '';
                $err_xnpass = 'Xác nhận mật khâu không được để trống';
                $err_passold = '';

                $id_kh = $_SESSION['user']['id_kh'];
                $pass = $_POST['pass'];
                $xnpass = $_POST['xnpass'];
                $pass_old = $_POST['pass_old'];

                $flag = 0;
                if(empty($pass_old)){
                    $err_passold = 'Mật khẩu cũ không được để trống';
                    $flag = 1;
                }else{
                    if(password_verify($pass_old,$_SESSION['user']['matkhau_kh'])==false){
                        $err_passold = 'Mật khẩu cũ không trùng khớp';
                        $flag = 1;
                    }
                }
                if(empty($pass)){
                    $err_pass = 'Mật khẩu mới không được để trống';
                    $flag = 1;
                }
                if(empty($xnpass)){
                    $err_xnpass = 'Xác nhận mật khẩu không được để trống';
                    $flag = 1;
                }else{
                    if($pass != $xnpass){
                        $err_xnpass = 'Xác nhận mật khẩu không đúng';
                        $flag = 1;
                    }else{
                        $err_xnpass = '';
                    }
                }
                
                if($flag == 0){
                    $pass = password_hash($pass,PASSWORD_DEFAULT);
                    if($this->user->UpdatePassUser($id_kh,[$pass])==true){
                        $_SESSION['user'] = $this->user->getOneUser($id_kh);
                        $this->data['notification_pass'] = 'Cập nhật thông tin thành công';
                    }else{
                        $this->data['notification_pass'] = 'Insert vào CSDL thất bại';
                    }
                }else{
                    $this->data['err'] = ['pass'=>$err_pass,'xnpass'=>$err_xnpass,'pass_old'=>$err_passold,];
                    $this->data['ifm'] = ['pass'=>$pass,'xnpass'=>$xnpass,'pass_old'=>$pass_old];
                }
            }
        }
        public function ViewIfmUser(){
            $this->UpdatePassword();
            $this->UpdateIfm();
            $this->RenderView($this->data,'ifmuser');
        }
    }
?>