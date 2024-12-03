<?php 
    class EditvoucherCtl{
        public $data;
        public $voucher;
        public function __construct(){
            $this->voucher = new VoucherModel();
        }
        public function getVoucherForIdVoucher(){
            if(isset($_GET['id_edit_voucher']) && !empty($_GET['id_edit_voucher'])){
                $id_voucher = $_GET['id_edit_voucher'];
                $this->data['voucher'] = $this->voucher->getOneVoucher($id_voucher);
            }
        }
        public function EditVoucher(){
            if(isset($_POST['edit_voucher']) && $_POST['edit_voucher']){
                if(isset($_SESSION['admin']) && !empty($_SESSION['admin'])){
                    //variable err
                    $err_ma_giam = '';
                    $err_tien_giam = '';
                    $err_so_lan = '';
                    //variable imformation 
                    $id_voucher = $_POST['id_voucher'];
                    $ma_giam = $_POST['ma_giam'];
                    $tien_giam = $_POST['tien_giam'];
                    $so_lan = $_POST['so_lan'];
                    $flag = 0;
                    if(empty($ma_giam)){
                        $err_ma_giam = 'Mã giảm không được để trống';
                        $flag = 1;
                    }else{
                        $pattern = '/^[A-Z0-9]+$/';
                        if(preg_match($pattern,$ma_giam) == false){
                            $err_ma_giam = 'Mã phải là số và các kí tự viết hoa';
                            $flag = 1;
                        }else{
                            $flag2 = 0;
                            $arr_voucher = $this->voucher->getAllVoucherDifferentIdVoucher($id_voucher);
                            foreach($arr_voucher as $one_voucher){
                                if($one_voucher['code_giamgia']==$ma_giam){
                                    $flag2 = 1;
                                }
                            }
                            if($flag2 == 1){
                                $err_ma_giam = 'Mã giảm giá đã tồn tại';
                                $flag = 1;
                            }
                        }
                    }
                    if(empty($tien_giam)){
                        $err_tien_giam = "Số tiền giảm không được để trống";
                        $flag = 1;
                    }else{
                        if($tien_giam < 0 ){
                            $err_tien_giam = "Số tiền giảm giá là 1 số lớn hơn 0";
                            $flag = 1;
                        }
                    }

                    if(empty($so_lan)){
                        $err_so_lan = 'Số lần giảm không được để trống';
                        $flag = 1;
                    }else{
                        if($so_lan < 1){
                            $err_so_lan = 'Số lần giảm phải là 1 số dương';
                            $flag = 1;
                        }
                    }


                    if($flag==0){
                        $data = [$ma_giam,$tien_giam,$so_lan];
                        if($this->voucher->UpdateVoucher($id_voucher,$data) == true){
                            $this->data['notification'] = 'Cập nhật voucher thành công';
                        }else{
                            $this->data['notification'] = 'Cập nhật voucher không thành công';
                        }
                    }else{
                        $this->data['err'] = ['err_ma_giam'=>$err_ma_giam,'err_tien_giam'=>$err_tien_giam,'err_so_lan'=>$err_so_lan];
                        $this->data['ifm'] = ['ma_giam'=>$ma_giam,'tien_giam'=>$tien_giam,'so_lan'=>$so_lan];
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
        public function ViewEditVoucher(){
            $this->EditVoucher();
            $this->getVoucherForIdVoucher();
            $this->RenderView($this->data,'editvoucher');
        }
    }
?>