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
        public function deteleOneVoucher(){
            if(isset($_GET['id_delete_voucher']) && !empty($_GET['id_delete_voucher'])){
                if(isset($_SESSION['admin']) && !empty($_SESSION['admin'])){
                    $id_voucher = $_GET['id_delete_voucher'];
                    if($this->voucher->deleteVoucherforIdVoucher($id_voucher) == true){
                        $this->data['notification'] = 'Xóa thành công';
                    }else{
                        $this->data['notification'] = 'Xóa không thành công';
                    }
                }else{
                    $this->data['notification'] = 'Bạn vui lòng đăng nhập để thực hiện chức năng này';
                }
            }
        }
        public function DeleteVoucherChecked(){
            if(isset($_POST['delete_voucher_for_id_voucher'])){
                if(isset($_SESSION['admin']) && !empty($_SESSION['admin'])){
                    if(empty($_POST['checkid_pro'])){
                        $this->data['notification'] ='Không có sản phẩm nào được chọn';
                    }else{
                        try{
                            $arr_voucher_delete = $_POST['checkid_pro'];
                            for($i = 0 ; $i < count($arr_voucher_delete) ; $i++ ){
                                $this->voucher->deleteVoucherforIdVoucher($arr_voucher_delete[$i]);
                            }
                            $this->data['notification'] = 'Xóa thành công';
                        }catch(Exception $e){
                            echo 'Mã lỗi: ' . $e;
                            $this->data['notification'] = 'Xóa không thành công';
                        }
                    }
                }else{
                    $this->data['notification'] = 'Bạn vui lòng đăng nhập để thực hiện chức năng này';
                }
            }
        }
        public function ViewVoucher(){
            $this->DeleteVoucherChecked();
            $this->deteleOneVoucher();
            $this->getAllVoucher();
            $this->RenderView($this->data,'voucher');
        }

    }
?>