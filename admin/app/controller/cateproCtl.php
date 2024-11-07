<?php 
    class CateproCtl{
        public $cate;
        public $data;
        public function __construct(){
            $this->cate = new CategoryModel();
        }
        public function RenderView($data,$view){
            $page = './app/view/'.$view.'.php';
            include_once $page;
        }
        public function getALLCate(){
            $this->data['cate'] = $this->cate->getAllCate();
        }
        public function DeleteCateForIDCate(){
            if(isset($_GET['id_delete_cate']) && !empty($_GET['id_delete_cate'])){
                $id_cate = $_GET['id_delete_cate'];
                if($this->cate->DeleteCateForIdCate($id_cate)==true){
                    $this->data['notification'] = 'Xóa thành công';
                }else{
                    $this->data['notification'] = 'Xóa không thành công';
                }
                
            }
        }
        public function ViewCatePro(){
            $this->DeleteCateForIDCate();
            $this->getALLCate();
            $this->RenderView($this->data,'catepro');
        }
    }
?>