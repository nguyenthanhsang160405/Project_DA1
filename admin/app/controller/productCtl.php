<?php 
    class ProductCtl{
        public $data;
        public $product;
        public $cate;
        public $image;
        public $order_detail;
        public function __construct(){
            $this->product = new ProductModel();
            $this->cate = new CategoryModel();
            $this->image = new ImageProModel();
            $this->order_detail = new DetailOrderModel();
        }
        public function RenderView($data,$view){
            $page = './app/view/'.$view.'.php';
            include_once $page;
        }
        public function getAllPro(){
            $this->data['product'] = $this->product->getAllPro();
        }
        public function getAllImage(){
            $this->data['image'] = $this->image->getAll_Image();
        }
        public function setProSpecial(){
            if(isset($_GET['id_pro_check']) && !empty($_GET['id_pro_check'])){
                $id_pro = $_GET['id_pro_check'];
                $pro = $this->product->getOneProForIDPro($id_pro);
                if($pro['kiemtra_sanpham']==1){
                    $check_pro = 2;
                }else{
                    $check_pro = 1;
                }
                $this->product->UpdateCheckPro($id_pro,[$check_pro]);

            }
        }
        public function deleteProForIdPro(){
            if(isset($_GET['id_pro_delete']) && !empty($_GET['id_pro_delete'])){
                if(isset($_SESSION['admin']) && !empty($_SESSION['admin'])){
                    $id_pro = $_GET['id_pro_delete'];
                    $arr_order_by_id_pro =  $this->order_detail->getAllDetailOrderByIdPro($id_pro);
                    if(count($arr_order_by_id_pro)>0){
                        $this->data['notification'] ='Sản phẩm đã được mua không thể xóa';
                    }else{
                        $arr_image = $this->image->getImageForIdPro($id_pro);
                        if(empty($arr_image)){
                            $this->data['notification'] ='Sản phẩm không tồn tại';
                        }else{
                            if($this->product->DeleteProForIdPro($id_pro) == true){
                                $target = "../public/img/";
                                $flag = 0;
                                foreach ($arr_image as $image){
                                    $target_image = $target.$image['link_anh'];
                                    if(file_exists($target_image)){
                                        unlink($target_image);
                                    }else{
                                        $flag =1;
                                    }
                                }
                                if($flag==0){
                                    $this->data['notification'] ='Xóa sản phẩm thành công';
                                }else{
                                    $this->data['notification'] ='Xóa sản phẩm không thành công';
                                }
                            }else{
                                $this->data['notification'] ='Xóa sản phẩm không thành công';
                            }
                        }
                    }
                }else{
                    $this->data['notification'] = 'Bạn vui lòng đăng nhập để thực hiện chức năng này';
                }
            }
        }
        public function deleteBoxCheckedPro(){
            if(isset($_POST['delete_pro_for_id_pro'])){
                if(isset($_SESSION['admin']) && !empty($_SESSION['admin'])){
                    if(empty($_POST['checkid_pro'])){
                        $this->data['notification'] ='Không có sản phẩm nào được chọn';
                    }else{
                        try{
                            $arr_id_pro = $_POST['checkid_pro'];
                            $flag = 0;
                            for($i = 0 ; $i < count($arr_id_pro) ; $i++){
                                $arr_order_detail = $this->order_detail->getAllDetailOrderByIdPro($arr_id_pro[$i]);
                                if(count($arr_order_detail)>0){
                                    $flag = 1;
                                }
                            }
                            if($flag == 0){
                                for($i = 0 ; $i < count($arr_id_pro) ; $i++ ){
                                    $arr_image_for_id_pro = $this->image->getImageForIdPro($arr_id_pro[$i]);
                                    if($this->product->DeleteProForIdPro($arr_id_pro[$i] )== true){
                                        $target = "../public/img/";
                                        foreach($arr_image_for_id_pro as $image_){
                                            $target_old = $target.$image_['link_anh'];
                                            if(file_exists($target_old)){
                                                unlink($target_old);
                                                $this->data['notification'] = 'Xóa sản phẩm thành công';
                                            }else{
                                                $this->data['notification'] = 'Đường dẫn ảnh không tồn tại';
                                            }
                                        }
                                    }else{
                                        $this->data['notification'] = 'Xóa sản phẩm không thành công';
                                    }
                                }
                            }else{
                                $this->data['notification'] ='Những sản phẩm bạn chọn có sản phẩm đã được mua không thể xóa';
                            }
                            
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
        public function ViewProduct(){
            $this->setProSpecial();
            $this->deleteProForIdPro();
            $this->getAllImage();
            $this->deleteBoxCheckedPro();
            $this->getAllPro();
            $this->RenderView($this->data,'product');
        }
    }
?>