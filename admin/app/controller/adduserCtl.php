<?php 
    class AdduserCtl{
        public $data;
        public $user;
        public function __construct(){
            $this->user = new UserModel();
        }
        public function RenderView($data,$view){
            $page = './app/view/'.$view.'.php';
            include_once $page;
        }
        public function AddUser(){
            if(isset($_POST['add_user']) && $_POST['add_user']){
                if(isset($_SESSION['admin']) && !empty($_SESSION['admin'])){
                    //variable err
                    $err_name = '';
                    $err_email = '';
                    $err_pass = '';
                    $err_address = '';
                    $err_phone = '';
                    //variable imformation 
                    $name_user = $_POST['name'];
                    $email_user = $_POST['email'];
                    $pass_user = $_POST['pass'];
                    $role_user = $_POST['role'];
                    $flag = 0;
                    // xử lý address
                    if(empty($_POST['address'])){
                        $address_user = '';
                    }else{
                        $address_user = $_POST['address'];
                    }

                    // xử lý phone
                    if(empty($_POST['phone'])){
                        $phone_user = '';
                    }else{
                        $phone_user = $_POST['phone'];
                    }


                    if(empty($name_user)){
                        $err_name = "Tên người dùng không được để trống";
                        $flag = 1;
                    }

                    if(empty($email_user)){
                        $err_email = "Email không được để trống";
                        $flag = 1;
                    }else{
                        if(filter_var($email_user,FILTER_VALIDATE_EMAIL) == false){
                            $err_email = "Email không đúng định dạng";
                            $flag = 1;
                        }else{
                            $flag1 = 0;
                            $arr_user = $this->user->getAllUser();
                            for($i = 0 ; $i < count($arr_user) ; $i++){
                                if($arr_user[$i]['email_kh'] == $email_user){
                                    $flag1 = 1;
                                    break;
                                }
                            }
                            if($flag1 == 1){
                                $err_email = "Email này đã tồn tại";
                                $flag = 1;
                            }
                        }
                    }
                    // xl pass
                    if(empty($pass_user)){
                        $err_pass = "Mật khẩu không được để trống";
                        $flag = 1;
                    }

                    if($flag==0){
                        $pass_user = password_hash($pass_user,PASSWORD_DEFAULT);
                        $data = [$name_user,$email_user,$pass_user,$address_user,$phone_user,$role_user];
                        if($this->user->InsertUser($data) == true){
                            $this->data['notification'] = 'Thêm người dùng thành công';
                        }else{
                            $this->data['notification'] = 'Thêm người dùng không thành công';
                        }
                    }else{
                        $this->data['err'] = ['err_name'=>$err_name,'err_email'=>$err_email,'err_pass'=>$err_pass,'err_address'=>$err_address,'err_phone'=>$err_phone];
                        $this->data['ifm'] = ['name'=>$name_user,'email'=>$email_user,'pass'=>$pass_user,'address'=>$address_user,'phone'=>$phone_user];
                    }

                }else{
                    $this->data['notification'] = 'Bạn vui lòng đăng nhập để thực hiện chức năng này';
                }
            }
        }
        public function ViewAddUser(){
            $this->AddUser();
            $this->RenderView($this->data,'adduser');
        }
    }
?>