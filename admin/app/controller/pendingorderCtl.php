<?php 
    class PendingoderCtl{
        public $data;
        public $oder;
        public function __construct(){
            $this->oder = new OderModel();
        }
        public function getAllOrder(){
                $this->data['pending_order'] = $this->oder->getOrderPending();
        }
        public function AcceptOrder(){
            if(isset($_GET['id_order_accept']) && !empty($_GET['id_order_accept'])){
                if(isset($_SESSION['admin']) && !empty($_SESSION['admin'])){
                    $id_donhang = $_GET['id_order_accept'];
                    $id_nv = $_SESSION['admin']['id_kh'];
                    $ten_nv = $_SESSION['admin']['ten_kh'];
                    $data = [$ten_nv,$id_nv];
                    if($this->oder->InsertNvInOrder($id_donhang,$data) == true){
                        $this->data['notification'] = 'Xác nhận đơn hàng thành công';
                    }else{
                        $this->data['notification'] = 'Xác nhận đơn hàng thất bại';
                    }
                }else{
                    $this->data['notification'] = 'Bạn vui lòng đăng nhập để thực hiện chức năng này';
                }
            }
        }
        public function RefuseOrder(){
            if(isset($_GET['id_order_delete']) && !empty($_GET['id_order_delete'])){
                if(isset($_SESSION['admin']) && !empty($_SESSION['admin'])){
                    $id_donhang = $_GET['id_order_delete'];
                    if($this->oder->DeletePendingOrder($id_donhang) == true){
                        $this->data['notification'] = 'Huỷ đơn hàng thành công';
                    }else{
                        $this->data['notification'] = 'Hủy đơn hàng thất bại';
                    }
                }else{
                    $this->data['notification'] = 'Bạn vui lòng đăng nhập để thực hiện chức năng này';
                }
            }
        }
        public function AcceptAllOrder(){
            if(isset($_POST['accept_order_for_id_order'])){
                if(isset($_SESSION['admin']) && !empty($_SESSION['admin'])){
                    $arr_id_order = $_POST['checkid_pro'];
                    if(empty($arr_id_order)){
                        $this->data['notification'] = 'Không có đơn hàng nào được chọn';
                    }else{
                        $id_nv = $_SESSION['admin']['id_kh'];
                        $ten_nv = $_SESSION['admin']['ten_kh'];
                        $data = [$ten_nv,$id_nv];
                        $flag = 0;
                        for($i = 0 ; $i < count($arr_id_order) ; $i++){
                            if($this->oder->InsertNvInOrder($arr_id_order[$i],$data) == false){
                                $flag = 1;
                            }
                        }
                        if($flag==0){
                            $this->data['notification'] = 'Xác nhận đơn hàng thành công';
                        }else{
                            $this->data['notification'] = 'Xác nhận đơn hàng thất bại';
                        }
                    }
                }else{
                    $this->data['notification'] = 'Bạn vui lòng đăng nhập để thực hiện chức năng này';
                }
                
            }
        }
        public function DeleteAllOrder(){
            if(isset($_POST['delete_order_for_id_order'])){
                if(isset($_SESSION['admin']) && !empty($_SESSION['admin'])){
                    $arr_id_order = $_POST['checkid_pro'];
                    if(empty($arr_id_order)){
                        $this->data['notification'] = 'Không có đơn hàng nào được chọn';
                    }else{
                        $flag = 0;
                        for($i = 0 ; $i < count($arr_id_order) ; $i++){
                            if($this->oder->DeletePendingOrder($arr_id_order[$i]) == false) {
                                $flag = 1;
                            }
                        }
                        if($flag==0){
                            $this->data['notification'] = 'Xóa đơn hàng thành công';
                        }else{
                            $this->data['notification'] = 'Xóa đơn hàng thất bại';
                        }
                    }
                }else{
                    $this->data['notification'] = 'Bạn vui lòng đăng nhập để thực hiện chức năng này';
                }
                
            }
        }
        public function RenderView($data,$view){
            $page = './app/view/'.$view.'.php';
            include_once $page;
        }
        public function ViewPendingOrder(){
            $this->DeleteAllOrder();
            $this->AcceptAllOrder();
            $this->RefuseOrder();
            $this->AcceptOrder();
            $this->getAllOrder();
            $this->RenderView($this->data,'pendingorder');
        }
    }
?>