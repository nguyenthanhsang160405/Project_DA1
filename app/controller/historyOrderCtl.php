<?php
    class HistoryOrderCtl{
        public $data;
        public $order;
        public function __construct(){
            $this->order = new OderModel();
        }
        public function RenderView($data,$view){
            $seen = 'app/view/'.$view.'.php';
            include_once $seen;
        }
        public function showCart(){
            $id_user = $_SESSION['user']['id_kh'];
            $this->data['order'] = $this->order->getAllOrderByIdKh($id_user);
        }
        public function ViewHistoryOreder(){
            $this->showCart();
            $this->RenderView($this->data,'history_order');
        }
    }
?>