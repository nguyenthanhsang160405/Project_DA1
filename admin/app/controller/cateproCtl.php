<?php 
    class CateproCtl{
        public $cate;
        public $data;
        public function __construct(){
            $this->cate = new CategoryModel();
        }
        public function getALLCate(){
            $this->data['cate'] = $this->cate->getAllCate();
        }
        public function DeleteCateForIDCate(){
            if(isset($_GET['id_delete_cate']) && !empty($_GET['id_delete_cate'])){
                if(isset($_SESSION['admin']) && !empty($_SESSION['admin'])){
                    $id_cate = $_GET['id_delete_cate'];
                    if($this->cate->DeleteCateForIdCate($id_cate)==true){
                        $this->data['notification'] = 'Xóa thành công';
                    }else{
                        $this->data['notification'] = 'Xóa không thành công';
                    } 
                }else{
                    $this->data['notification'] = 'Bạn vui lòng đăng nhập để thực hiện chức năng này';
                }
            }
        }
        public function DeleteBoxChecked(){
            if(isset($_POST['delete_cate_for_id_cate'])){ 
                if(isset($_SESSION['admin']) && !empty($_SESSION['admin'])){
                    if(empty($_POST['checkid_pro'])){
                        $this->data['notification'] ='Không có sản phẩm nào được chọn';
                    }else{
                        try{
                            $arr_pro_delete = $_POST['checkid_pro'];
                            for($i = 0 ; $i < count($arr_pro_delete) ; $i++ ){
                                $this->cate->DeleteCateForIdCate($arr_pro_delete[$i]);
                            }
                            $this->data['notification'] = 'Xóa thành công';
                        }catch(Exception $e){
                            echo 'Mã lỗi: ' . $e;
                            $this->data['notification'] = 'Xóa không thành công';
                        }
                    }
                }else{
                    $this->data['notification'] = 'Bạn vui lòng đăng nhập để thực hiện chức năng này';
                }
            }
        }
        public function RenderView($data,$view){
            $page = './app/view/'.$view.'.php';
            include_once $page;
        }
        public function ViewCatePro(){
            $this->DeleteBoxChecked();
            $this->DeleteCateForIDCate();
            $this->getALLCate();
            $this->RenderView($this->data,'catepro');
        }
    }
?>