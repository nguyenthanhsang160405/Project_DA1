<?php 
    class DetailCtl{
        public $data;
        public $product;
        public $image;
        public function __construct(){
            $this->product = new ProductModel();
            $this->image = new ImageProModel();
        }
        public function getPro(){
            if(isset($_GET['id_pro']) && !empty($_GET['id_pro'])){
                $id_pro = $_GET['id_pro'];
                $this->data['product']  = $this->product->getOneProForIDPro($id_pro);
                $this->data['image'] = $this->image->getImageForIdPro($id_pro);
            }
        }
        public function RenderView($data,$view){
            $seen = 'app/view/'.$view.'.php';
            include_once $seen;
        }
        public function ViewDetail(){
            $this->getPro();
            $this->RenderView($this->data,'detail');
        }

    }
?>