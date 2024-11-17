<?php 
    class ImageCtl{
        public $data;
        public $image;
        public $product;
        public function __construct(){
            $this->image = new ImageProModel();
            $this->product = new ProductModel();
        }
        public function RenderView($data,$view){
            $page = './app/view/'.$view.'.php';
            include_once $page;
        }
        public function getImageForIDPro(){
            if(isset($_GET['id_pro_image']) && !empty($_GET['id_pro_image'])){
                $id_pro = $_GET['id_pro_image'];
                $this->data['product'] = $this->product->getOneProForIDPro($id_pro);
                $this->data['image'] = $this->image->getImageForIdPro($id_pro);
            }
        }
        public function DeleteImage(){
            if(isset($_GET['id_delete_image']) && !empty($_GET['id_delete_image']) && isset($_GET['id_pro_image']) && !empty($_GET['id_pro_image'])){
                if(isset($_SESSION['admin']) && !empty($_SESSION['admin'])){
                    $id_product = $_GET['id_pro_image'];
                    $arr_image = $this->image->getImageForIdPro($id_product);
                    if(count($arr_image)-1 < 1){
                        $this->data['notification'] = 'Bạn không thể xóa tất cả ảnh của sản phẩm';
                    }else{
                        $id_image = $_GET['id_delete_image'];
                        $one_image = $this->image->getOneImage($id_image);
                        if(!empty($one_image)){
                            $target_img = "../public/img/".$one_image['link_anh'];
                            if(unlink($target_img)==true){
                                if($this->image->deleteImageForIdImage($id_image) == true){
                                    $this->data['notification'] = 'Xóa ảnh thành công';
                                }else{
                                    $this->data['notification'] = 'Xóa ảnh CSDL không thành công';
                                }
                            }else{
                                $this->data['notification'] = 'Xóa ảnh thư mục không thành công';
                            }
                        }else{
                            $this->data['notification'] = 'Ảnh không tồn tại';
                        }
                    }
                }else{
                    $this->data['notification'] = 'Bạn vui lòng đăng nhập để thực hiện chức năng này';
                }
                

            }
        }
        public function DeleteBoxChecked(){
            if(isset($_POST['delete_image_for_id_image']) && isset($_GET['id_pro_image']) && !empty($_GET['id_pro_image'])){
                if(isset($_SESSION['admin']) && !empty($_SESSION['admin'])){
                    $id_product = $_GET['id_pro_image'];
                    $arr_image = $this->image->getImageForIdPro($id_product);
                    if(empty($_POST['checkid_pro'])){
                        $this->data['notification'] = 'Không có sản phẩm nào được chọn';
                    }else{
                        $arr_id_image_delete = $_POST['checkid_pro'];
                        if(count($arr_image) - count($arr_id_image_delete) < 1 ){
                            $this->data['notification'] = 'Bạn không thể xóa tất cả ảnh của sản phẩm';
                        }else{
                            $flag = 0;
                            $target = "../public/img/";
                            for($i = 0 ; $i < count($arr_id_image_delete) ; $i++ ){
                                $current_image = $this->image->getOneImage($arr_id_image_delete[$i]);
                                $target_old = $target.$current_image['link_anh'];
                                if(unlink($target_old)==false){
                                    $flag = 1;
                                }else{
                                    if($this->image->deleteImageForIdImage($arr_id_image_delete[$i])==false){
                                        $flag = 1;
                                    }
                                }
                            }
                            if($flag == 0){
                                $this->data['notification'] = 'Xóa ảnh thành công';
                            }else{
                                $this->data['notification'] = 'Xóa ảnh không thành công';
                            }
                        }
                    }
                }else{
                    $this->data['notification'] = 'Bạn vui lòng đăng nhập để thực hiện chức năng này';
                }
            }
        }
        public function ViewImage(){
            $this->DeleteBoxChecked();
            $this->DeleteImage();
            $this->getImageForIDPro();
            $this->RenderView($this->data,'image');
        }
    }
?>