<?php 
    class AcceptedorderCtl{
        public $data;
        public $order;

        public function __construct(){
            $this->order =  new OderModel();
        }
        public function RenderView($data,$view){
            $page = './app/view/'.$view.'.php';
            include_once $page;
        }
        public function getAcceptedOrder(){
            $this->data['acceptedorder'] = $this->order->getAllAcceptedOrder();
        }
        public function ViewAcceptedOrder(){
            $this->getAcceptedOrder();
            $this->RenderView($this->data,'acceptedorder');
        }
    }
?>