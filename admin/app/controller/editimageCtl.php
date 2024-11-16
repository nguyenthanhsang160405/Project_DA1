<?php 
    class EditimageCtl{
        public $data;
        public $image;
        public function __construct(){
            $this->image = new ImageProModel();
        }
        public function RenderView($data,$view){
            $page = './app/view/'.$view.'.php';
            include_once $page;
        }
        public function getOneImage(){
            if(isset($_GET['id_edit_image']) && !empty($_GET['id_edit_image'])){
                $id_image = $_GET['id_edit_image'];
                $this->data['image'] = $this->image->getOneImage($id_image);
            }
        }
        public function EditImage(){
            if(isset($_POST['edit_image']) && $_POST['edit_image']){
                if(isset($_SESSION['admin']) && !empty($_SESSION['admin'])){
                    $target = "../public/img/";
                    $id_image = $_POST['id_image'];
                    $ifm_image = $this->image->getOneImage($id_image);
                    if(empty($_FILES['image_pro']['name'])){
                        $link_image = $ifm_image['link_anh'];
                        if($this->image->UpdateImage($id_image,[$link_image]) == true){
                            $this->data['notification'] = 'Cập nhật ảnh thành công';
                        }else{
                            $this->data['notification'] = 'Cập nhật ảnh không thành công';
                        }
                    }else{
                        $image = $_FILES['image_pro'];
                        $flag = 0;
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
                        if($flag == 0){
                            $target_old = $target.$ifm_image['link_anh'];
                            $target_new = $target.$image['name'];
                            $link_img = $image['name'];
                            if(unlink($target_old)==true){
                                if($this->image->UpdateImage($id_image,[$link_img])==true){
                                    if(move_uploaded_file($image['tmp_name'],$target_new)){
                                        $this->data['notification'] = 'Cập nhật ảnh thành công';
                                    }else{
                                        $this->data['notification'] = 'Cập nhật ảnh trong thư mục thành công';
                                    }
                                }else{
                                    $this->data['notification'] = 'Cập nhật ảnh trong CSDL thành công';
                                }
                            }else{
                                $this->data['notification'] = 'Xóa ảnh trong thư mục không thành công';
                            }
                        }else{
                            $this->data['err'] = $err_image;
                        }
                        
                    }
                }else{
                    $this->data['notification'] = 'Bạn vui lòng đăng nhập để thực hiện chức năng này';
                }
            }
        }
        public function ViewEditImage(){
            $this->EditImage();
            $this->getOneImage();
            $this->RenderView($this->data,'editimage');
        }

    }
?>