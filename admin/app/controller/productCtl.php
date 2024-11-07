<?php 
    class ProductCtl{
        public $data;
        public $product;
        public function __construct(){
            $this->product = new ProductModel();
        }
        public function RenderView($data,$view){
            $page = './app/view/'.$view.'.php';
            include_once $page;
        }
        public function ViewProduct(){
            $this->RenderView($this->data,'product');
        }
    }
?>