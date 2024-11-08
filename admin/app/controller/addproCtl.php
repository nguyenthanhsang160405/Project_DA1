<?php 
    class AddproCtl{
        public $data;
        public $product;
        public $cate;
        public function __construct(){
            $this->product =  new ProductCtl();
            $this->cate = new CateproCtl();
        }
        public function RenderView($data,$view){
            $page = './app/view/'.$view.'.php';
            include_once $page;
        }
        public function ViewAddPro(){
            $this->RenderView($this->data,'addpro');
        }
    }
?>