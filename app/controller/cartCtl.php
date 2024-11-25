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
        public function Tang(){
            if(isset($_POST['cong'])){
                $position = $_POST['vt_product'];
                echo $position;
                if(isset($_SESSION['user']) && !empty($_SESSION['user'])){
                    $cart = $this->cart->getOneCartByIdCart($position);
                    $quantity = $cart['soluong_sanpham'] + 1;
                    $this->cart->UpdateCart($position,[$quantity]);
                }else{
                    $_SESSION['cart'][$position]['quantity'] = $_SESSION['cart'][$position]['quantity'] + 1;
                }
            }
        }
        public function Giam(){
            if(isset($_POST['tru'])){
                $position = $_POST['vt_product'];
                echo $position;
                if(isset($_SESSION['user']) && !empty($_SESSION['user'])){
                    $cart = $this->cart->getOneCartByIdCart($position);
                    $quantity = $cart['soluong_sanpham'] - 1;
                    if($quantity <= 0){
                        $quantity = 1;
                    }
                    $this->cart->UpdateCart($position,[$quantity]);
                }else{
                    $_SESSION['cart'][$position]['quantity'] = $_SESSION['cart'][$position]['quantity'] - 1;
                    if($_SESSION['cart'][$position]['quantity'] <= 0){
                        $_SESSION['cart'][$position]['quantity'] = 1;
                    }
                }
            }
        }
        public function RenderView($data,$view){
            $seen = 'app/view/'.$view.'.php';
            include_once $seen;
        }
        public function ViewCart(){
            $this->Tang();
            $this->Giam();
            $this->DeleteCart();
            $this->getAllCate();
            $this->RenderView($this->data,'cart');
        }
    }
?>