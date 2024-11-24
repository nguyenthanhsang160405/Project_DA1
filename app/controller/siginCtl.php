<?php 
    class SiginCtl{
        public $data;
        public $user;
        public $cart;
        public function __construct(){
            $this->user = new UserModel();
            $this->cart = new CartModel();
        }
        public function SigIn(){
            if(isset($_POST['login'])){
                $err_email = '';
                $err_pass = '';


                $email = $_POST['email'];
                
                $pass = $_POST['pass'];
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
                            $user = $arr_user[$i];
                        }
                    }
                    if(!empty($user)){
                        if($user['vai_tro'] == 1){
                            $_SESSION['user'] = $user;
                            if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])){
                                $id_kh =$_SESSION['user']['id_kh'];
                                $arr_pro_cart = $this->cart->getAllCartByIdUser($id_kh);
                                print_r($_SESSION['cart']);
                                for($i = 0 ; $i < count($_SESSION['cart']) ; $i++){
                                    $param = [$_SESSION['cart'][$i]['size'],$_SESSION['cart'][$i]['quantity'],$_SESSION['cart'][$i]['price'],$_SESSION['cart'][$i]['id_pro'],$user['id_kh'],$_SESSION['cart'][$i]['name'],$_SESSION['cart'][$i]['image']];
                                    $flag = 0;
                                    for($j = 0 ; $j < count($arr_pro_cart) ; $j++){
                                        if($_SESSION['cart'][$i]['size'] == $arr_pro_cart[$j]['size_sanpham'] && $_SESSION['cart'][$i]['id_pro'] == $arr_pro_cart[$j]['id_sanpham'] ){
                                            $this->cart->UpdateCart($arr_pro_cart[$j]['id_ctgiohang'],[$arr_pro_cart[$j]['soluong_sanpham'] + $_SESSION['cart'][$i]['quantity']]);
                                            $flag = 1;
                                        }
                                    }
                                    if($flag==0){
                                        $this->cart->InsertCart($param);
                                    }
                                }
                                unset($_SESSION['cart']);
                                header('location:index.php?page=usermanage');
                            }else{
                                header('location:index.php?page=usermanage');
                            }
                        }else{
                            echo $user['id_kh'];
                            $id = password_hash($user['id_kh'],PASSWORD_DEFAULT);
                            header('location:./admin/index.php?id_admin='.$id.'');
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
        public function Logout(){
            if(isset($_GET['logout'])){
                unset($_SESSION['user']);
                header('location:index.php?page=sigin');
            }
        }
        public function RenderView($data,$view){
            $seen = 'app/view/'.$view.'.php';
            include_once $seen;
        }
        public function ViewSigIn(){
            $this->Logout();
            $this->SigIn();
            $this->RenderView($this->data,'sigin');
        }
    }
?>