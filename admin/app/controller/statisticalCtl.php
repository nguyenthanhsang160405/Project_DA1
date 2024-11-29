<?php 
    class StatisticalCtl{
        public $data;
        public $catepro;
        public $product;
        public function __construct(){
            $this->catepro = new CategoryModel();
            $this->product = new ProductModel();
        }
        public function getAllPro(){
            $this->data['product'] = $this->product->getAllPro();
        }
        public function getAllCate(){
            $this->data['cate'] = $this->catepro->getAllCate();
        }
        public function RenderView($data,$view){
            $page = './app/view/'.$view.'.php';
            include_once $page;
        }
        public function ViewStatistical(){
            $this->getAllCate();
            $this->getAllPro();
            $this->RenderView($this->data,'statistical');
        }
    }
?>