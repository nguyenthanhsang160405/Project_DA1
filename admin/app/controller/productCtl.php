<?php 
    class ProductCtl{
        public $data;
        public $product;
        public $cate;
        public $image;
        public function __construct(){
            $this->product = new ProductModel();
            $this->cate = new CategoryModel();
            $this->image = new ImageProModel();
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
        public function deleteBoxCheckedPro(){
            if(isset($_POST['delete_pro_for_id_pro'])){
                if(empty($_POST['checkid_pro'])){
                    $this->data['notification'] ='Không có sản phẩm nào được chọn';
                }else{
                    try{
                        $arr_id_pro = $_POST['checkid_pro'];
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
                    }catch(Exception $e){
                        echo 'Mã lỗi: ' . $e;
                        $this->data['notification'] = 'Xóa không thành công';
                    }
                }
            }
        }
        public function ViewProduct(){
            $this->getAllImage();
            $this->deleteBoxCheckedPro();
            $this->getAllPro();
            $this->RenderView($this->data,'product');
        }
    }
?>