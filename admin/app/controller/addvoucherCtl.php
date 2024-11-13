<?php 
    class AddvoucherCtl{
        public $data;
        public $voucher;
        public function __construct(){
            $this->voucher = new VoucherModel();
        }
        public function AddVoucher(){
            if(isset($_POST['add_voucher']) && $_POST['add_voucher']){
                //variable err
                $err_ma_giam = '';
                $err_tien_giam = '';
                //variable imformation 
                $ma_giam = $_POST['ma_giam'];
                $tien_giam = $_POST['tien_giam'];
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
                        $arr_voucher = $this->voucher->getAllVoucher();
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

                if($flag==0){
                    $data = [$ma_giam,$tien_giam];
                    if($this->voucher->InsertVoucher($data) == true){
                        $this->data['notification'] = 'Thêm voucher thành công';
                    }else{
                        $this->data['notification'] = 'Thêm voucher không thành công';
                    }
                    
                }else{
                    $this->data['err'] = ['err_ma_giam'=>$err_ma_giam,'err_tien_giam'=>$err_tien_giam];
                    $this->data['ifm'] = ['ma_giam'=>$ma_giam,'tien_giam'=>$tien_giam];
                }
            }
        }
        public function RenderView($data,$view){
            $page = './app/view/'.$view.'.php';
            include_once $page;
        }
        public function ViewAddVoucher(){
            $this->AddVoucher();
            $this->RenderView($this->data,'addvoucher');
        }
    }
?>