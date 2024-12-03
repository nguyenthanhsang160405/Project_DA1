<?php 
    class LoginOutCtl{
        public function CheckLogIn(){
            if(isset($_GET['id_admin']) && !empty($_GET['id_admin'])){
                $id_adm = $_GET['id_admin'];
                $user = new UserModel();
                $arr_admin = $user->getAllAdmin();
                for($i = 0 ; $i < count($arr_admin) ; $i++){
                    if(password_verify($arr_admin[$i]['id_kh'],$id_adm)==true){
                        $_SESSION['admin'] = $arr_admin[$i];
                    }else{
                        // echo 'Không đúng';
                    }
                }
            }
        }
        
        public function checkIssetAdmin(){
            if(empty($_SESSION['admin'])){
                header('location:../index.php?page=sigin');
            }
        }
        public function LogOut(){
            if(isset($_GET['logout_adm'])){
                unset($_SESSION['admin']);
                header('location:index.php');
            }
        }
        public function ViewLogInOut(){
            $this->CheckLogIn();
            $this->checkIssetAdmin();
            $this->LogOut();
        }
    }
?>