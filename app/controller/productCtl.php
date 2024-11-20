<?php 
    class ProductCtl{
        public $data;
        public $product;
        public $cate;
        public $image;
        public function __construct(){
            $this->product = new ProductModel();
            $this->cate = new CategoryModel();
            $this->image = new ImageProModel();
        }
        public function getAllPro(){
            if(isset($_GET['id_cate']) && !empty($_GET['id_cate'])){
                $id_cate = $_GET['id_cate'];
                $this->data['product'] = $this->product->getAllProForIdCate($id_cate);
                $this->data['image'] = [];
                $arr_pro = $this->data['product'];
                for($i = 0 ; $i < count($arr_pro) ; $i++){
                    $one_image = $this->image->getOneImageForIdPro($arr_pro[$i]['id_sanpham']);
                    array_push($this->data['image'],$one_image); 
                }
            }
            else{
                if(isset($_GET['timkiem'])){
                    echo 10;
                    $name_pro  = $_GET['timkiem'];
                    $this->data['product'] = $this->product->SearchNamePro($name_pro);
                    $this->data['image'] = [];
                    $arr_pro = $this->data['product'];
                    for($i = 0 ; $i < count($arr_pro) ; $i++){
                        $one_image = $this->image->getOneImageForIdPro($arr_pro[$i]['id_sanpham']);
                        array_push($this->data['image'],$one_image); 
                    }
                }else{
                    echo 20;
                    $this->data['product'] = $this->product->getAllPro();
                    $this->data['image'] = [];
                    $arr_pro = $this->data['product'];
                    for($i = 0 ; $i < count($arr_pro) ; $i++){
                        $one_image = $this->image->getOneImageForIdPro($arr_pro[$i]['id_sanpham']);
                    array_push($this->data['image'],$one_image); 
                    }
                }
            }
        }
        // function ArrRange(){

        // }
        public function RenderView($data,$view){
            $seen = 'app/view/'.$view.'.php';
            include_once $seen;
        }
        public function ViewProduct(){
            $this->getAllPro();
            $this->RenderView($this->data,'product');
        }
    }