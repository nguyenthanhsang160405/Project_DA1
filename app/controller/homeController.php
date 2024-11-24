<?php
    class homeController{
        private $category;
        private $product;
        private $data;
        private $image;


        public function __construct(){
            $this->category = new CategoryModel();
            $this->product = new ProductModel();
            $this->image = new ImageProModel();
        }
        public function getAllCate(){
            $this->data['cate'] = $this->category->getAllCate();
        }
        public function getSpecialPro(){
            $this->data['pro_special'] = $this->product->getAllSpecialPro();
            $this->data['image'] = [];
            for($i = 0 ; $i < count($this->data['pro_special']) ; $i++){
                array_push($this->data['image'],$this->image->getOneImageForIdPro($this->data['pro_special'][$i]['id_sanpham']));
            }
        }
        public function view($data,$view){
            require_once 'app/view/'. $view.'.php';
        }

        public function ViewController(){
            $this->getSpecialPro();
            $this->getAllCate();
            $this->view($this->data,'home');
        }
    }
?>