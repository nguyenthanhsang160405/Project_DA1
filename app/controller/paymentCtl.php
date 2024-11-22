<?php 
    class PaymentCtl{
        public $data;
        public $cart;
        public function __construct(){
            $this->cart = new CartModel();
        }
        public function getCart(){
            if(isset($_SESSION['user']) && !empty($_SESSION['user'])){
                $id_user = $_SESSION['user']['id_kh'];
                $this->data['cart'] = $this->cart->getAllCartByIdUser($id_user);
            }
        }
        public function RenderView($data,$view){
            $seen = 'app/view/'.$view.'.php';
            include_once $seen;
        }
        public function ViewPayment(){
            $this->getCart();
            $this->RenderView($this->data,'payment');
        }
    }
?>