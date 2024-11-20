<?php 
    class AddimageCtl{
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
        public function getPro(){
            if(isset($_GET['id_pro_image'])&& !empty($_GET['id_pro_image'])){
                $id_pro = $_GET['id_pro_image'];
                $this->data['pro'] = $this->product->getOneProForIDPro($id_pro);
            }
        }
        public function AddImageForIdPro(){
            if(isset($_POST['add_image']) && $_POST['add_image'] && isset($_GET['id_pro_image']) && !empty($_GET['id_pro_image'])){
                if(isset($_SESSION['admin']) && !empty($_SESSION['admin'])){
                    $id_product = $_GET['id_pro_image'];
                    $target = "../public/img/";
                    $image = $_FILES['image_pro'];
                    $flag = 0;
                    $err_image = "";
                    if(empty($image['name'])){
                        $err_image = "Ảnh không được để trống";
                        $flag = 1;
                    }else{
                        if(getimagesize($image['tmp_name'])==false){
                            $err_image = "File không phải là ảnh";
                            $flag = 1;
                        }else{
                            $target_new = $target.$image['name'];
                            if(file_exists($target_new)==true){
                                $err_image = "File ảnh đã tồn tại trong thư mục";
                                $flag = 1;
                            }
                        }
                    }
                    if($flag == 0){
                        $target_new = $target.$image['name'];
                        $link_img = $image['name'];
                        if(move_uploaded_file($image['tmp_name'],$target_new) == true){
                            $data = [$link_img,$id_product];
                            if($this->image->InsertImagePro($data) == true){
                                $this->data['notification'] = 'Thêm ảnh thành công';
                            }else{
                                $this->data['notification'] = 'Thêm ảnh vào CSDL không thành công';
                            }
                        }else{
                            $this->data['notification'] = 'Upload ảnh vào thư mục không thành công';
                        }
                    }else{
                        $this->data['err'] = $err_image;
                    }
                }else{
                    $this->data['notification'] = 'Bạn vui lòng đăng nhập để thực hiện chức năng này';
                }
            }
        }
        public function ViewAddImage(){
            $this->getPro();
            $this->AddImageForIdPro();
            $this->RenderView($this->data,'addimage');
        }
    }
?>