<?php 
class UserCtl{
    public $data;
    public $user;
    public function __construct(){
        $this->user = new UserModel();
    }
    public function getAllUser(){
        $this->data['user'] = $this->user->getAllUser();
    }
    public function DeleteOneUser(){
        if(isset($_GET['id_delete_user']) && !empty($_GET['id_delete_user'])){
            if(isset($_SESSION['admin']) && !empty($_SESSION['admin'])){
                $id_user = $_GET['id_delete_user'];
                $id_myseft = $_SESSION['admin']['id_kh'];
                if($id_user == $id_myseft){
                    $this->data['notification'] = 'Bạn không thể xóa chính mình';
                }else{
                    if($this->user->DeleteUserForIdUser($id_user)==true){
                        $this->data['notification'] = 'Xóa thành công';
                    }else{
                        $this->data['notification'] = 'Xóa thất bại';
                    }
                }
                
            }else{
                $this->data['notification'] = 'Vui lòng đăng nhập để thực hiện chức năng';   
            }
        }
    }
    public function DeleteBoxCheckedUser(){
        if(isset($_SESSION['admin']) && !empty($_SESSION['admin'])){
            if(isset($_POST['delete_user_for_id_user'])){
                if(empty($_POST['checkid_pro'])){
                    $this->data['notification'] ='Không có người dùng nào được chọn';
                }else{
                    try{
                        $arr_user_delete = $_POST['checkid_pro'];
                        $id_myself = $_SESSION['admin']['id_kh'];
                        $flag = 0;
                        for($i = 0 ; $i < count($arr_user_delete) ; $i++ ){
                            if($id_myself == $arr_user_delete[$i]){
                                $flag = 1;
                            }
                        }
                        if($flag == 0){
                            $flag1 = 0;
                            for($i = 0 ; $i < count($arr_user_delete) ; $i++ ){
                               if($this->user->DeleteUserForIdUser($arr_user_delete[$i]) == false){
                                $flag1 = 1;
                               }
                            }
                            if($flag1 == 0){
                                $this->data['notification'] = 'Xóa thành công';
                            }else{
                                $this->data['notification'] = 'Xóa không thành công';
                            }
                            
                        }else{
                            $this->data['notification'] = 'Không thể xóa chính mình';
                        }
                    }catch(Exception $e){
                        echo 'Mã lỗi: ' . $e;
                        $this->data['notification'] = 'Xóa không thành công';
                    }
                }
            }
        }else{
            $this->data['notification'] = 'Vui lòng đăng nhập để thực hiện chức năng';  
        }
    }
    public function RenderView($data,$view){
        $page = './app/view/'.$view.'.php';
        include_once $page;
    }
    public function ViewUser(){
        $this->DeleteBoxCheckedUser();
        $this->DeleteOneUser();
        $this->getAllUser();
        $this->RenderView($this->data,'user');
    }
}
?>