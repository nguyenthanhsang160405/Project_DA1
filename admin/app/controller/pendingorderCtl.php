<?php 
    class PendingoderCtl{
        public $data;
        public $oder;
        public $email;
        public $order_detail;
        public function __construct(){
            $this->oder = new OderModel();
            $this->email = new Mailler();
            $this->order_detail = new DetailOrderModel();
        }
        public function getAllOrder(){
                $this->data['pending_order'] = $this->oder->getOrderPending();
        }
        public function AcceptOrder(){
            if(isset($_GET['id_order_accept']) && !empty($_GET['id_order_accept'])){
                if(isset($_SESSION['admin']) && !empty($_SESSION['admin'])){
                    $id_donhang = $_GET['id_order_accept'];
                    $arr_order_detail = $this->order_detail->getAllDetailOrderByIdOrder($id_donhang);
                    $order = $this->oder->getOneOrderByIdOrder($id_donhang);
                    $id_nv = $_SESSION['admin']['id_kh'];
                    $ten_nv = $_SESSION['admin']['ten_kh'];
                    $data = [$ten_nv,$id_nv];
                    $ct_order = '';
                    for($i = 0 ; $i < count($arr_order_detail) ; $i++){
                        $ct_order .= '<tr>
                                        <td style="padding:7px;">'.$arr_order_detail[$i]['ten_sanpham'].'</td>
                                        <td style="padding:7px;"><img style="width: 40px;height:auto;" src="cid:'.$arr_order_detail[$i]['anh_sanpham'].'" alt=""></td>
                                        <td style="padding:7px;">'.number_format($arr_order_detail[$i]['gia_sanpham']).'đ</td>
                                        <td style="padding:7px;">'.$arr_order_detail[$i]['soluong_sanpham'].'</td>
                                        <td style="padding:7px;">'.$arr_order_detail[$i]['size_sanpham'].'</td>
                                     </tr>';
                    }
                    $content = '<div style="font-family: sans-serif;"> 
                                    <p><span style="font-weight: 600;" >Tên người nhận:</span> '.$order['ten_nguoinhan'].'</p>
                                    <p><span style="font-weight: 600;" >Số điện thoại:</span> '.$order['sdt_nguoinhan'].'</p>
                                    <p><span style="font-weight: 600;" >Địa chỉ:</span> '.$order['diachi_nguoinhan'].'</p>
                                    <p><span style="font-weight: 600;" >Chi tiết đơn hàng</span></p>
                                    <table border="1" style="border-collapse: collapse;text-align:center">
                                        <tr>
                                            <th style="padding:7px;">Tên sản phẩm</th>
                                            <th style="padding:7px;">Ảnh sản phẩm</th>
                                            <th style="padding:7px;">Giá sản phẩm</th>
                                            <th style="padding:7px;">Số lượng sản phẩm</th>
                                            <th style="padding:7px;">Kích cỡ sản phẩm</th>
                                        </tr>
                                        '.$ct_order.'
                                    </table>
                                    <p><span style="font-weight: 600;" >Giá đơn hàng:</span> '.number_format($order['gia_tong_don_hang']).'đ</p>
                                    <p>Đơn hàng sẽ được giao đến bạn trong thời gian sớm nhất </p>
                                    <p>Trân trọng cảm ơn!</p>
                                </div>';
                    if($this->oder->InsertNvInOrder($id_donhang,$data) == true){
                        $this->email->Order($order['email_nguoinhan'],$order['ten_nguoinhan'],$content,$arr_order_detail);
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
                    if(empty($_POST['checkid_pro'])){
                        $this->data['notification'] = 'Không có đơn hàng nào được chọn';
                    }else{
                        $arr_id_order = $_POST['checkid_pro'];
                        $id_nv = $_SESSION['admin']['id_kh'];
                        $ten_nv = $_SESSION['admin']['ten_kh'];
                        $data = [$ten_nv,$id_nv];
                        $flag = 0;
                        for($i = 0 ; $i < count($arr_id_order) ; $i++){
                            if($this->oder->InsertNvInOrder($arr_id_order[$i],$data) == false){
                                $flag = 1;
                            }else{
                                $arr_order_detail_by_id_order = $this->order_detail->getAllDetailOrderByIdOrder($arr_id_order[$i]);
                                $order = $this->oder->getOneOrderByIdOrder($arr_id_order[$i]);
                                $ct_order = '';
                                for($i = 0 ; $i < count($arr_order_detail_by_id_order) ; $i++){
                                    $ct_order .= '<tr>
                                                    <td style="padding:7px;">'.$arr_order_detail_by_id_order[$i]['ten_sanpham'].'</td>
                                                    <td style="padding:7px;"><img style="width: 40px;height:auto;" src="cid:'.$arr_order_detail_by_id_order[$i]['anh_sanpham'].'" alt=""></td>
                                                    <td style="padding:7px;">'.number_format($arr_order_detail_by_id_order[$i]['gia_sanpham']).'đ</td>
                                                    <td style="padding:7px;">'.$arr_order_detail_by_id_order[$i]['soluong_sanpham'].'</td>
                                                    <td style="padding:7px;">'.$arr_order_detail_by_id_order[$i]['size_sanpham'].'</td>
                                                 </tr>';
                                }
                                $content = '<div style="font-family: sans-serif;"> 
                                    <p><span style="font-weight: 600;" >Tên người nhận:</span> '.$order['ten_nguoinhan'].'</p>
                                    <p><span style="font-weight: 600;" >Số điện thoại:</span> '.$order['sdt_nguoinhan'].'</p>
                                    <p><span style="font-weight: 600;" >Địa chỉ:</span> '.$order['diachi_nguoinhan'].'</p>
                                    <p><span style="font-weight: 600;" >Chi tiết đơn hàng</span></p>
                                    <table border="1" style="border-collapse: collapse;text-align:center">
                                        <tr>
                                            <th style="padding:7px;">Tên sản phẩm</th>
                                            <th style="padding:7px;">Ảnh sản phẩm</th>
                                            <th style="padding:7px;">Giá sản phẩm</th>
                                            <th style="padding:7px;">Số lượng sản phẩm</th>
                                            <th style="padding:7px;">Kích cỡ sản phẩm</th>
                                        </tr>
                                        '.$ct_order.'
                                    </table>
                                    <p><span style="font-weight: 600;" >Giá đơn hàng:</span> '.number_format($order['gia_tong_don_hang']).'đ</p>
                                    <p>Đơn hàng sẽ được giao đến bạn trong thời gian sớm nhất </p>
                                    <p>Trân trọng cảm ơn!</p>
                                </div>';
                                $this->email->Order($order['email_nguoinhan'],$order['ten_nguoinhan'],$content,$arr_order_detail_by_id_order);
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
                    if(empty($_POST['checkid_pro'])){
                        $this->data['notification'] = 'Không có đơn hàng nào được chọn';
                    }else{
                        $arr_id_order = $_POST['checkid_pro'];
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