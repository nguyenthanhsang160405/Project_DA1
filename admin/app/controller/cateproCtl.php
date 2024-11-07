<?php 
    class CateproCtl{
        public $product;
        public $data;
        public function __construct(){
            $this->product = new ProductModel();
        }
        public function RenderView($data,$view){
            $page = './app/view/'.$view.'.php';
            include_once $page;
        }
        public function ViewCatePro(){
            $this->RenderView($this->data,'catepro');
        }
    }
?>