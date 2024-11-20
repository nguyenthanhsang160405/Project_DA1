<?php
    class homeController{
        private $category;
        private $product;
        private $data;


        public function __construct(){
            $this->category = new CategoryModel();
            $this->product = new ProductModel();
        }
        public function getAllCate(){
            $this->data['cate'] = $this->category->getAllCate();
        }
        public function view($data,$view){
            require_once 'app/view/'. $view.'.php';
        }

        public function ViewController(){
            $this->getAllCate();
            $this->view($this->data,'home');
        }
    }
?>