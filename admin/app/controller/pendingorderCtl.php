<?php 
    class PendingoderCtl{
        public $data;
        public $oder;
        public function __construct(){
            $this->oder = new OderModel();
        }
        public function getAllOrder(){
                $this->data['order'] = $this->oder->getAllOrder();
        }
        public function RenderView($data,$view){
            $page = './app/view/'.$view.'.php';
            include_once $page;
        }
        public function ViewPendingOrder(){
            $this->getAllOrder();
            $this->RenderView($this->data,'pendingorder');
        }
    }
?>