<?php 
    class VoucherCtl{
        public $voucher;
        public $data;
        public function __construct(){
            $this->voucher = new VoucherModel();
        }
        public function getAllVoucher(){
            $this->data['voucher'] =$this->voucher->getAllVoucher();
        }
        public function RenderView($data,$view){
            $page = './app/view/'.$view.'.php';
            include_once $page;
        }
        public function ViewVoucher(){
            $this->getAllVoucher();
            $this->RenderView($this->data,'voucher');
        }

    }
?>