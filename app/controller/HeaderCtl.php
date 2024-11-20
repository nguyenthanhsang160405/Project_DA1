<?php 
    class HeaderCtl{
        public $data;
        public $cate;
        public function __construct(){
            $this->cate = new CategoryModel();
        }
        public function getAllCate(){
            $this->data['cate'] = $this->cate->getAllCate();
        } 
        public function RenderView($data,$view){
            $seen = 'app/view/'.$view.'.php';
            include_once $seen;
        }
        public function ViewHeader(){
            $this->getAllCate();
            $this->RenderView($this->data,'header');
        }
    }
?>