<?php 
    class EdiuserCtl{
        public $data;
        public $user;
        public function __construct(){
            $this->user = new UserModel();
        }
        public function RenderView($data,$view){
            $page = './app/view/'.$view.'.php';
            include_once $page;
        }
        public function getOneUser(){
            if(isset($_GET['id_edit_user']) && !empty($_GET['id_edit_user'])){
                $id_user = $_GET['id_edit_user'];
                $this->data['ifm'] = $this->user->getOneUser($id_user);
            }
        }
        public function EditUser(){
            if(isset($_POST['edit_user']) && $_POST['edit_user']){
                if(isset($_SESSION['admin']) && !empty($_SESSION['admin'])){
                    //variable err
                    $err_name = '';
                    $err_email = '';
                    $err_pass = '';
                    $err_address = '';
                    $err_phone = '';
                    //variable imformation 
                    $id_kh = $_POST['id_user'];
                    $name_user = $_POST['name'];
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
                    // xl pass
                    if(empty($pass_user)){
                        $user = $this->user->getOneUser($id_kh);
                        $pass_user = $user['matkhau_kh'];
                    }else{
                        $pass_user =  $pass_user = password_hash($pass_user,PASSWORD_DEFAULT);
                    }
                    if($flag==0){
                        
                        $data = [$name_user,$pass_user,$address_user,$phone_user,$role_user];
                        if($this->user->UpdateUser($id_kh,$data)==true){
                            $this->data['notification'] = 'Cập nhật người dùng thành công';
                        }else{
                            $this->data['notification'] = 'Cập nhật người dùng không thành công';
                        }
                    }else{
                        $this->data['err'] = ['err_name'=>$err_name,'err_email'=>$err_email,'err_pass'=>$err_pass,'err_address'=>$err_address,'err_phone'=>$err_phone];
                    }

                }else{
                    $this->data['notification'] = 'Bạn vui lòng đăng nhập để thực hiện chức năng này';
                }
            }
        }
        public function ViewEditUser(){
            $this->getOneUser();
            $this->EditUser();
            $this->RenderView($this->data,'edituser');
        }

    }
?>