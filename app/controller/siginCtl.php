<?php 
    class SiginCtl{
        public $data;
        public $user;
        public function __construct(){
            $this->user = new UserModel();
        }
        public function SigIn(){
            if(isset($_POST['login'])){
                $err_email = '';
                $err_pass = '';


                $email = $_POST['email'];
                echo $email;
                
                $pass = $_POST['pass'];
                echo $pass;
                $flag = 0;

                if(empty($email)){
                    $err_email = 'Email không được để trống';
                    $flag = 1;
                }
                if(empty($pass)){
                    $err_pass = 'Mật khẩu không được để trống';
                    $flag = 1;
                }

                if($flag == 0){
                    $arr_user = $this->user->getAllUser();
                    $user = [];
                    for($i = 0 ; $i < count($arr_user) ; $i++){
                        if($email == $arr_user[$i]['email_kh'] &&  password_verify($pass,$arr_user[$i]['matkhau_kh'])==true){
                            
                            array_push($user,$arr_user[$i]);
                        }
                    }
                    if(!empty($user)){
                        print_r($user);
                        if($user[0]['vai_tro'] == 1){
                            header('location:index.php?page=usermanage&&id_user='.$user[0]['id_kh'].'');
                        }else{
                            header('location:./admin/index.php?id_admin='.$user[0]['id_kh'].'');
                        }
                    }else{
                        $this->data['notification'] = 'Tên đăng nhập hoặc mật khẩu không chính xác';
                    }
                }else{
                    $this->data['ifm'] = ['email'=>$email,'pass'=>$pass];
                    $this->data['err'] = ['err_email'=>$err_email,'err_pass'=>$err_pass];
                }
                
            }
        }
        public function RenderView($data,$view){
            $seen = 'app/view/'.$view.'.php';
            include_once $seen;
        }
        public function ViewSigIn(){
            $this->SigIn();
            $this->RenderView($this->data,'sigin');
        }
    }
?>