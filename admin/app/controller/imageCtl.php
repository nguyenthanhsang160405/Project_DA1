<?php 
    class ImageCtl{
        public $data;
        public $image;
        public function __construct(){
            $this->image = new ImageProModel();
        }
        public function RenderView($data,$view){
            $page = './app/view/'.$view.'.php';
            include_once $page;
        }
        public function getImageForIDPro(){
            if(isset($_GET['id_pro_image']) && !empty($_GET['id_pro_image'])){
                $id_pro = $_GET['id_pro_image'];
                $this->data['image'] = $this->image->getImageForIdPro($id_pro);
            }
        }
        public function DeleteImage(){
            if(isset($_GET['id_delete_image']) && !empty($_GET['id_delete_image'])){
                if(isset($_SESSION['admin']) && !empty($_SESSION['admin'])){
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
                    
                }else{
                    $this->data['notification'] = 'Bạn vui lòng đăng nhập để thực hiện chức năng này';
                }
                

            }
        }
        public function ViewImage(){
            $this->DeleteImage();
            $this->getImageForIDPro();
            $this->RenderView($this->data,'image');
        }
    }
?>