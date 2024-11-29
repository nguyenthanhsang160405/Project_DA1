<?php 
    class OtpCtl{
        public $data;
        public $user;
        public $email;
        public function __construct(){
            $this->user = new UserModel();
            $this->email = new MaillerUser();
        }
        public function RenderView($data,$view){
            $seen = 'app/view/'.$view.'.php';
            include_once $seen;
        }
        public function SendOTP(){
            if(isset($_POST['button-sigin'])){
                $err_email = '';

                $email = $_POST['email'];
                $flag = 0;

                if(empty($email)){
                    $err_email = 'Email không được để trống';
                    $flag = 1;
                }else{
                    if(filter_var($email,FILTER_VALIDATE_EMAIL)==false){
                        $err_email = 'Email không đúng định dạng';
                        $flag = 1;
                    }else{
                        $user = $this->user->getAllUser();
                        $flag_user = 0;
                        foreach ($user as $item){
                            if($email == $item['email_kh']){
                                $flag_user = 1;
                            }
                        }
                        if($flag_user == 0){
                            $err_email = 'Email không tồn tại';
                            $flag = 1;
                        }
                    }
                }
                if($flag==0){
                    $code_otp = random_int(100000,999999);
                    $time_timestamp_after_10minute = strtotime("+10 minutes");
                    if($this->user->InsertOTP_Time_User([$code_otp,$time_timestamp_after_10minute,$email])==true){
                        $this->email->SendOTPUser($email,$code_otp);
                        header('location:index.php?page=changepass&&email='.$email.'');
                    }
                }else{
                    $this->data['err'] = ['email'=>$err_email];
                    $this->data['ifm'] = ['email'=>$email];
                }
            }
        }
        public function ViewOtp(){
            $this->SendOTP();
            $this->RenderView($this->data,'otp');
        }
    }
?>