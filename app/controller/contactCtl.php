<?php 
    class ContactCtl{
        public $data;
        Public $mailler;
        public function __construct(){
            $this->mailler = new MaillerUser();
        }
        public function RenderView($data,$view){
            $seen = 'app/view/'.$view.'.php';
            include_once $seen;
        }
        public function getIfmUser(){
            if(isset($_POST['submit-btn']) && $_POST['submit-btn']){
                echo 100;
                $err_name = '';
                $err_phone = '';
                $err_email = '';
                $err_content = '';

                $name = $_POST['name'];
                $email = $_POST['email'];
                $phone = $_POST['phone'];
                $content = $_POST['message'];
                $flag =  0;

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

                if(empty($email)){
                    $err_email = 'Email không được để trống';
                    $flag = 1;
                }else{
                    if(filter_var($email,FILTER_VALIDATE_EMAIL)==false){
                        $err_email = 'Không đúng định dạng email';
                        $flag = 1;
                    }
                }
                if(empty($content)){
                    $err_content = 'Nội dung không được để trống';
                    $flag = 1;
                }

                if($flag == 0){
                    $this->mailler->GetIfm($content);
                    $this->mailler->Replace($email,$name,$content);
                    $this->data['notification'] = 'Tên đăng nhập hoặc mật khẩu không chính xác';
                }else{
                    $this->data['err'] = ['name'=>$err_name,'err_email'=>$err_email,'err_phone'=>$err_phone,'err_conten'=>$err_content];
                    $this->data['ifm'] = ['name'=>$name,'email'=>$email,'content'=>$content,'phone'=>$phone];
                }
                
            }
        }
        public function ViewContact(){
            $this->getIfmUser();
            $this->RenderView($this->data,'contact');
        }
    }
?>