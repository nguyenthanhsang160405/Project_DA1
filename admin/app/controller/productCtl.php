<?php 
    class ProductCtl{
        public $data;
        public $product;
        public $cate;
        public function __construct(){
            $this->product = new ProductModel();
            $this->cate = new CategoryModel();
        }
        public function RenderView($data,$view){
            $page = './app/view/'.$view.'.php';
            include_once $page;
        }
        public function getAllPro(){
            $this->data['product'] = $this->product->getAllPro();
        }
        public function ViewProduct(){
            $this->getAllPro();
            $this->RenderView($this->data,'product');
        }
    }
?>