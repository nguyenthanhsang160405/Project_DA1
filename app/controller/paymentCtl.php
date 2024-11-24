<?php 
    class PaymentCtl{
        public $data;
        public $cart;
        public $voucher;
        public $order;
        public $detailOrder;
        public function __construct(){
            $this->cart = new CartModel();
            $this->voucher = new VoucherModel();
            $this->order = new OderModel();
            $this->detailOrder = new DetailOrderModel();
        }
        public function getCart(){
            if(isset($_SESSION['user']) && !empty($_SESSION['user'])){
                $id_user = $_SESSION['user']['id_kh'];
                $this->data['cart'] = $this->cart->getAllCartByIdUser($id_user);
            }else{
                header('location:index.php?page=sigin');
            }
        }
        public function ImportVoucher(){
            if(isset($_POST['order_summary']) && $_POST['order_summary']){
                if(empty($_POST['voucher'])){
                    $this->data['notification'] = 'Bạn chưa nhập mã giảm giá';
                }else{
                    $voucher = $_POST['voucher'];
                    $flag = 0;
                    $arr_voucher = $this->voucher->getAllVoucher();
                    for($i = 0 ; $i < count($arr_voucher) ; $i++ ){
                        if($voucher == $arr_voucher[$i]['code_giamgia']){
                            $this->data['voucher'] = $arr_voucher[$i];
                            $flag = 1;
                        }
                    }
                    if($flag == 0){
                        $this->data['notification'] = 'Mã giảm giá không tồn tại';
                    }
                }

            }
        }
        public function Pay(){
            if(isset($_POST['checkout_button']) && $_POST['checkout_button']){
                $id_kh = $_SESSION['user']['id_kh'];
                $arr_cart = $this->cart->getAllCartByIdUser($id_kh);

                $err_name = '';
                $err_phone = '';
                $err_address = '';
                $err_email = '';

                
                $name = $_POST['name'];
                $phone = $_POST['phone'];
                $address = $_POST['address'];
                $email = $_POST['email'];
                $total = $_POST['total'];
                echo $total;
                $id_voucher = $_POST['id_voucher'];
                $flag = 0;

                if(empty($_POST['id_voucher'])){
                    $id_voucher = null;
                }

                if(empty($name)){
                    $err_name = 'Tên không được để trống';
                    $flag = 1;
                }

                if(empty($phone)){
                    $err_phone = 'Số điện thoại không được để trống';
                    $flag = 1;
                }else{
                    $patter = '/^0[0-9]{9}$/';
                    if(preg_match($patter,$phone) == false){
                        $err_phone = 'Vui lòng nhập đúng số điện thoại';
                        $flag = 1;
                    }
                }

                if(empty($address)){
                    $err_address = 'Địa chỉ không được để trống';
                    $flag = 1;
                }

                if(empty($email)){
                    $err_email = 'Email không được để trống';
                    $flag = 1;
                }else{
                    if(filter_var($email,FILTER_VALIDATE_EMAIL) == false){
                        $err_email = 'Vui lòng nhập đúng định dạng email';
                    }
                }

                if($flag == 0){
                    $data = [$name,$phone,$address,$email,$total,$id_kh,$id_voucher];
                    $id_order = $this->order->InsertOrderUser($data);
                    $flag_addcart = 0;
                    foreach ($arr_cart as $cart){
                        $data = [$cart['ten_sanpham'],$cart['gia_sanpham'],$cart['soluong_sanpham'],$cart['size_sanpham'],$cart['id_sanpham'],$id_order,$cart['anh_sanpham']];
                        if($this->detailOrder->InsertOrderDetail($data)==false){
                            $flag_addcart = 1;
                           
                        }else{
                            $this->cart->DeleteCartByIdCart($cart['id_ctgiohang']);
                        }
                    }
                    if($flag_addcart == 0){
                        header('location:index.php');
                    }
                }else{
                    $this->data['err'] = ['name'=>$err_name,'err_email'=>$err_email,'err_phone'=>$err_phone,'err_address'=>$err_address];
                    $this->data['ifm'] = ['name'=>$name,'email'=>$email,'address'=>$address,'phone'=>$phone];
                }

            }
        }
        public function RenderView($data,$view){
            $seen = 'app/view/'.$view.'.php';
            include_once $seen;
        }
        public function ViewPayment(){
            $this->Pay();
            $this->ImportVoucher();
            $this->getCart();
            $this->RenderView($this->data,'payment');
        }
    }
?>