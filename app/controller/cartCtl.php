<?php 
    class CartCtl{
        public $data;
        public $cart;
        public function __construct(){
            $this->cart = new CartModel();
        }
        public function getAllCate(){
            if(isset($_SESSION['user']) && !empty($_SESSION['user'])){
                $id_kh = $_SESSION['user']['id_kh'];
                $this->data['cart'] = $this->cart->getAllCartByIdUser($id_kh);
            }else{
                $this->data['cart'] = $_SESSION['cart'];
            }
        }
        public function DeleteCart(){
            if(isset($_GET['id_delete_cart']) && !empty($_GET['id_delete_cart'])>= 0){
                if(isset($_SESSION['user']) && !empty($_SESSION['user'])){
                    $id  = $_GET['id_delete_cart'];
                    $this->cart->DeleteCartByIdCart($id);
                }else{
                    $vt = $_GET['id_delete_cart'];
                    array_splice($_SESSION['cart'],$vt,1);
                }
            }
            
        }
 
        public function RenderView($data,$view){
            $seen = 'app/view/'.$view.'.php';
            include_once $seen;
        }
        public function ViewCart(){
            $this->DeleteCart();
            $this->getAllCate();
            $this->RenderView($this->data,'cart');
        }
    }
?>