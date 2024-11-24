<?php 
    class ViewOrderDetail{
        public $data;
        public $order_detail;
        public $user;
        public $voucher;
        public $order;

        public function __construct(){
            $this->order_detail = new DetailOrderModel();
            $this->user = new UserModel();
            $this->voucher = new VoucherModel();
            $this->order = new OderModel();
        }
        public function RenderView($data,$view){
            $page = './app/view/'.$view.'.php';
            include_once $page;
        }
        public function getDetailOrder(){
            if(isset($_GET['id_order_ct']) && !empty($_GET['id_order_ct'])){
                $id_order = $_GET['id_order_ct'];

                $order = $this->order->getOneOrderByIdOrder($id_order);
                
                $this->data['arr_detaiorder'] = $this->order_detail->getAllDetailOrderByIdOrder($id_order);
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
        public function ViewDetailOrder(){
            $this->getDetailOrder();
            $this->RenderView($this->data,'detailorder');
        }
    }
?>