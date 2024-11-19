<?php
    class homeController{
        private $category;
        private $product;
        private $data;


        public function __construct(){
            $this->category = new CategoryModel();
            $this->product = new ProductModel();
        }
        public function view($data){
            require_once 'app/view/home.php';
        }

        public function homeController(){
            $this->data['dsdm'] = $this->product->getAllPro();
            $this->view($this->data);
        }
    }
?>