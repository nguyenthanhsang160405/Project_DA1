<?php 
    class StatisticalCtl{
        public $data;
        public $catepro;
        public $product;
        public $order;
        public $detail_order;
        public function __construct(){
            $this->catepro = new CategoryModel();
            $this->product = new ProductModel();
            $this->order = new OderModel();
            $this->detail_order = new DetailOrderModel();
        }
        public function getAllPro(){
            $this->data['product'] = $this->product->getAllPro();
        }
        public function getAllCate(){
            $this->data['cate'] = $this->catepro->getAllCate();
        }
        public function getProBuyOnMonth(){
            $year_current = date('Y');
            $month_current = date('m');
            //
            $arr_order_in_month = [];
            $arr_order = $this->order->getAllOrder();
            for($i = 0 ; $i < count($arr_order) ; $i++){
                if(substr($arr_order[$i]['ngay_gio_tao'],0,4) == $year_current && substr($arr_order[$i]['ngay_gio_tao'],5,2) == $month_current){
                    array_push($arr_order_in_month,$arr_order[$i]);
                }
            }
            //
            $arr_order_product_in_month = [];
            for($i = 0 ; $i < count($arr_order_in_month) ; $i++){
                $arr_order_detail = $this->detail_order->getAllDetailOrderByIdOrder($arr_order_in_month[$i]['id_donhang']);
                $arr_order_product_in_month = array_merge($arr_order_product_in_month,$arr_order_detail);
            }
            // print_r($arr_order_product_in_month);
            //
            $arr_id_pro = [];
            foreach ($arr_order_product_in_month as $item){
                if(!in_array($item['id_sanpham'],$arr_id_pro)){
                    array_push($arr_id_pro,$item['id_sanpham']);
                }
            }
            // dữ liệu trả ra;
            $arr_pro_and_quantity = [];
            for($i = 0 ; $i < count($arr_id_pro) ; $i++ ){
                $product = [];
                $sl = 0;
                for($j = 0 ; $j < count($arr_order_product_in_month) ; $j++ ){
                    if($arr_order_product_in_month[$j]['id_sanpham'] == $arr_id_pro[$i]){
                        $sl += $arr_order_product_in_month[$j]['soluong_sanpham'];
                        $product = $arr_order_product_in_month[$j];
                    }
                }
                $one_pro_in_month = ['product'=>$product,'soluong'=>$sl];
                array_push( $arr_pro_and_quantity,$one_pro_in_month);

                //sap xep
                uasort( $arr_pro_and_quantity,function($a,$b){
                    return $b['soluong'] <=> $a['soluong'];
                });
                // dữ liệu trả ra
                $this->data['product_in_month'] = [];
                foreach( $arr_pro_and_quantity as $item){
                    array_push($this->data['product_in_month'],$item);
                }
            }
            
        }
        public function getProBuyOnDay(){
            $year_current = date('Y');
            $month_current = date('m');
            $day_current = date('d');
            
            $arr_order_in_day = [];
            $arr_order = $this->order->getAllOrder();
            for($i = 0 ; $i < count($arr_order) ; $i++){
                if(substr($arr_order[$i]['ngay_gio_tao'],0,4) == $year_current && substr($arr_order[$i]['ngay_gio_tao'],5,2) == $month_current && substr($arr_order[$i]['ngay_gio_tao'],8,2) == $day_current ){
                    array_push($arr_order_in_day,$arr_order[$i]);
                }
            }
            //
            $arr_order_product_in_day = [];
            for($i = 0 ; $i < count($arr_order_in_day) ; $i++){
                $arr_order_detail = $this->detail_order->getAllDetailOrderByIdOrder($arr_order_in_day[$i]['id_donhang']);
                $arr_order_product_in_day = array_merge($arr_order_product_in_day,$arr_order_detail);
            }
            // print_r($arr_order_product_in_month);
            //
            $arr_id_pro = [];
            foreach ($arr_order_product_in_day as $item){
                if(!in_array($item['id_sanpham'],$arr_id_pro)){
                    array_push($arr_id_pro,$item['id_sanpham']);
                }
            }
            // dữ liệu trả ra;
            $arr_pro_and_quantity = [];
            for($i = 0 ; $i < count($arr_id_pro) ; $i++ ){
                $product = [];
                $sl = 0;
                for($j = 0 ; $j < count($arr_order_product_in_day) ; $j++ ){
                    if($arr_order_product_in_day[$j]['id_sanpham'] == $arr_id_pro[$i]){
                        $sl += $arr_order_product_in_day[$j]['soluong_sanpham'];
                        $product = $arr_order_product_in_day[$j];
                    }
                }
                $one_pro_in_month = ['product'=>$product,'soluong'=>$sl];
                array_push( $arr_pro_and_quantity,$one_pro_in_month);

                //sap xep
                uasort( $arr_pro_and_quantity,function($a,$b){
                    return $b['soluong'] <=> $a['soluong'];
                });
                // dữ liệu trả ra
                $this->data['product_in_day'] = [];
                foreach( $arr_pro_and_quantity as $item){
                    array_push($this->data['product_in_day'],$item);
                }
            }
            
        }
        public function RenderView($data,$view){
            $page = './app/view/'.$view.'.php';
            include_once $page;
        }
        public function ViewStatistical(){
            $this->getProBuyOnDay();
            $this->getProBuyOnMonth();
            $this->getAllCate();
            $this->getAllPro();
            $this->RenderView($this->data,'statistical');
        }
    }
?>