<?php 
    class ChangepassCtl{
        public $data;
        public $user;
        public function __construct(){
            $this->user = new UserModel();
        }
        public function RenderView($data,$view){
            $seen = 'app/view/'.$view.'.php';
            include_once $seen;
        }
        public function showEmailUser(){
            if(isset($_GET['email']) && !empty($_GET['email'])){
                $this->data['email'] = $_GET['email'];
            }
        }
        public function ChangePass(){
            if(isset($_POST['update_user'])){
                $email = $_POST['email'];
                if(empty($email)){
                    $this->data['notification'] = 'Email không tồn tại';
                }else{
                    $user = $this->user->getUserByEmailUser([$email]);
                    $err_otp = '';
                    $err_new_pass = '';
                    $err_xnnew_pass = '';

                    $otp = $_POST['otp'];
                    $new_pass = $_POST['new_pass'];
                    $xnnew_pass = $_POST['xnnew_pass'];
                    $flag = 0;
                    if(empty($otp)){
                        $err_otp = 'Mã xác nhận không được để trống';
                        $flag = 1;
                    }else{
                        if($otp != $user['otp_code']){
                            $err_otp = 'Mã xác nhận không chính xác';
                            $flag = 1;
                        }
                    }

                    if(empty($new_pass)){
                        $err_new_pass = 'Mật khẩu mới không được bỏ trống';
                        $flag = 1;
                    }

                    if(empty($xnnew_pass)){
                        $err_xnnew_pass = 'Xác nhận mật khẩu không được bỏ trống';
                        $flag = 1;
                    }else{
                        if($xnnew_pass != $new_pass){
                            $err_xnnew_pass = 'Xác nhận mật khẩu không chính xác';
                            $flag = 1;
                        }
                    }

                    if($flag == 0 ){
                        $pass_new = password_hash($new_pass,PASSWORD_DEFAULT);
                        if($this->user->UpdatePassUser($user['id_kh'],[$pass_new])==true){
                            if($this->user->InsertOTP_Time_User(['','',$email])==true){
                                header('location:index.php?page=sigin&&tb');
                            }else{
                                echo '<script>alert("Thay đổi mật khẩu không thành công")</script>';
                            }                         
                        }
                    }else{
                        $this->data['err'] = ['otp'=>$err_otp,'new_pass'=>$err_new_pass,'err_xnnew_pass'=>$err_xnnew_pass];
                        $this->data['ifm'] = ['otp'=>$otp,'new_pass'=>$new_pass,'xnnew_pass'=>$xnnew_pass];
                    }

                }
            }
        }
        public function ViewChangePass(){
            $this->ChangePass();
            $this->showEmailUser();
            $this->RenderView($this->data,'changepass');
        }
    }
?>