<?php 
    class DetailorderUserCtl{
        public $data;
        public $detai_order;
        public $user;
        public $voucher;
        public $order;
        public function __construct(){
            $this->detai_order = new DetailOrderModel();
            $this->user = new UserModel();
            $this->voucher = new VoucherModel();
            $this->order = new OderModel();
        }
        public function RenderView($data,$view){
        $seen = 'app/view/'.$view.'.php';
                include_once $seen;
        }
        public function GetIfmOrder(){
            if(isset($_GET['id_order']) && !empty($_GET['id_order']) && isset($_GET['checkOrder'])){
                $id_order = $_GET['id_order'];
                // 1 không cho comment , 2 cho comment
                $checkOrder = $_GET['checkOrder'];
                $this->data['checkOrder'] = $checkOrder;
                $order = $this->order->getOneOrderByIdOrder($id_order);
                
                $this->data['arr_detaiorder'] = $this->detai_order->getAllDetailOrderByIdOrder($id_order);
                if(empty($order['id_nhanvien'])){
                    $this->data['nhanvien'] = '';
                }else{
                    $this->data['nhanvien'] = $this->user->getOneUser($order['id_nhanvien']);
                }

                if(empty($order['id_giamgia'])){
                    $this->data['voucher'] = '';
                }else{
                    $this->data['voucher'] = $this->voucher->getOneVoucher($order['id_giamgia']);
                }
               
                
            }
        }
        // public function GetCheckOrder(){
        //     if(is)
        // }
        public function ViewDetailOrederUser(){
            $this->GetIfmOrder();
            $this->RenderView($this->data,'detailorderUser');
        }
    }
?>