<?php 
    class RegisterCtl{
        public $data;
        public $user;
        public function __construct(){
            $this->user =new UserModel();
        }
        public function Register(){
            
            if(isset($_POST['register'])){
                $err_name = '';
                $err_email = '';
                $err_pass = '';
                $err_xnpass = '';

                $name =  $_POST['name'];
                $email = $_POST['email'];
                $pass =$_POST['password'];
                $xnpass = $_POST['xnpassword'];

                $flag = 0;

                if(empty($name)){
                    $err_name = 'Tên khẩu không dược để trống';
                    $flag 
                    = 1;
                }
                if(empty($email)){
                    $err_email = 'Email không được để trống';
                    $flag = 1;
                }else{
                    if(filter_var($email,FILTER_VALIDATE_EMAIL) == false){
                        $err_email = "Không đúng định dạng email";
                        $flag = 1;
                    }else{
                        $arr_user = $this->user->getAllUser();
                        for($i = 0 ; $i < count($arr_user) ; $i++){
                            if($arr_user[$i]['email_kh']==$email){
                                $flag = 1;
                                $err_email = "Email đã tồn tại";
                            }
                        }
                    }
                }

                if(empty($pass)){
                    $err_pass = 'Mật khẩu không dược để trống';
                    $flag = 1;
                }

                if(empty($xnpass)){
                    $err_xnpass = ' Xác nhận mật khẩu không dược để trống';
                    $flag = 1;
                }else{
                    if($xnpass != $pass){
                        $err_xnpass = ' Xác nhận mật khẩu không chính xác';
                        $flag = 1;
                    }
                }

                if($flag == 0){
                    $pass = password_hash($pass,PASSWORD_DEFAULT);
                    $data = [$name,$email,$pass,1];
                    if($this->user->InsertUser_User($data)==true){
                        echo '<script>alert("Bạn đã đăng ký thành công")</script>';
                        header('location:index.php?page=sigin');
                    }else{
                        $this->data['notification'] = 'Insert vào CSDL thất bại';
                    }
                }else{
                    $this->data['err'] = ['name'=>$err_name,'email'=>$err_email,'pass'=>$err_pass,'xnpass'=>$err_xnpass];
                    $this->data['ifm'] = ['name'=>$name,'email'=>$email,'pass'=>$pass,'xnpass'=>$xnpass];
                }

            }
        }
        public function RenderView($data,$view){
            $seen = 'app/view/'.$view.'.php';
            include_once $seen;
        }
        public function ViewRegister(){
            $this->Register();
            $this->RenderView($this->data,'register');
        }
    }
?>
