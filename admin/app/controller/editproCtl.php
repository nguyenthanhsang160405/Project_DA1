<?php 
    class EditproCtl{
        public $product;
        public $category;
        public $data;
        public $image;
        public function __construct(){
            $this->product = new ProductModel();
            $this->category = new CategoryModel();
            $this->image = new ImageProModel();
        }
        public function RenderView($data,$view){
            $page = './app/view/'.$view.'.php';
            include_once $page;
        }
        public function getProForIdPro(){
            if(isset($_GET['id_pro_edit']) && !empty($_GET['id_pro_edit'])){
                $id_pro = $_GET['id_pro_edit'];
                return $this->data['ifm_product'] = $this->product->getOneProForIDPro($id_pro);
            }
        }
        public function EditPro(){
            if(isset($_POST['edit_pro']) && $_POST['edit_pro']){
                //variable err
                $err_name = '';
                $err_price = '';
                $err_quantity = '';
                $err_image = '';
                //variable imformation
                $id_pro = $_POST['id_pro'];
                $name = $_POST['name_pro'];
                $price = $_POST['price_pro'];
                $quantity = $_POST['quantity_pro'];
                $id_cate = $_POST['id_catepro'];
                $image = $_FILES['image_pro'];
                $flag=0;
                // xl tên
                if(empty($name)){
                    $err_name = 'Tên sản phẩm không được để trống';
                    $flag = 1;
                }
                // xl giá
                if(empty($price)){
                    $err_price = 'Giá sản phẩm không được để trống';
                    $flag = 1;
                }else{
                    if($price < 0){
                        $err_price = 'Giá sản phẩm là 1 số lớn hơn 0';
                        $flag = 1;
                    }
                }
                // xl sl
                if(empty($quantity)){
                    $err_quantity = 'Số lượng sản phẩm không được để trống';
                    $flag = 1;
                }else{
                    if($quantity < 0){
                        $err_quantity = 'Số lượng sản phẩm là 1 số lớn hơn 0';
                        $flag = 1;
                    }
                }
                // xl ảnh
                if(!empty($image['name'][0])){
                    $flag2 = 0;
                    foreach($image['tmp_name'] as $mot_image){
                        if(getimagesize($mot_image) == false){
                            $flag2 = 1;
                        }
                    }
                    if($flag2 == 1){
                        $err_image = 'Các file của bạn có thể không là ảnh';
                        $flag = 1;
                    }else{
                        $flag3 = 0;
                        $target = '../public/img/';
                        foreach($image['name'] as $one_img){
                            if(file_exists($target.$one_img)){
                                $flag3 = 1;
                            }
                        }
                        if($flag3 == 1){
                            $err_image = 'Ảnh của bạn đã tồn tại trong thư mục';
                            $flag = 1;
                        }
                    }
                }
                if($flag == 0){
                    $data = [$name , $price , $quantity , $id_cate ];
                    if($this->product->UpdateProForIdPro($id_pro,$data)==true){
                        if(empty($image['name'][0])){
                            $this->data['notification'] = "Cập nhật sản phẩm thành công";
                        }else{
                            $arr_image_old = $this->image->getImageForIdPro($id_pro);
                            print_r($arr_image_old);
                            $target = "../public/img/";
                            $co = 0;
                            // xóa ảnh cũ sản phẩm
                            $this->image->deleteImage($id_pro);
                            for($i = 0 ; $i < count($arr_image_old); $i++){
                                $target_old = $target.$arr_image_old[$i]['link_anh'];
                                if(file_exists($target_old)){
                                    if(unlink($target_old)==true){
                                        $this->data['notification'] = "Xóa ảnh thành công";
                                    }else{
                                        echo " KO Thành công";
                                        $co = 1;
                                    }
                                }else{
                                    $this->data['notification'] = "File ảnh không tồn tại trong thư mục để xóa";
                                    $co = 1;
                                }
                            }
                            if($co == 0){
                                $target = "../public/img/";
                                $co1 = 0;
                                for($i = 0 ; $i < count($image['name']) ; $i++){
                                    $target_new = $target.$image['name'][$i];
                                    $param = [$image['name'][$i],$id_pro];
                                    if(move_uploaded_file($image['tmp_name'][$i],$target_new)){
                                        if($this->image->InsertImagePro($param)==true){
                                            $this->data['notification'] = "Thêm sản phẩm thành công";
                                        }else{
                                            $this->data['notification'] = "Thêm ảnh sản phẩm vào CSDL không thành công";
                                            $co1 = 1;
                                        }
                                    }else{
                                        $this->data['notification'] = "Thêm ảnh vào thư mục không thành công";
                                        $co1 = 1;
                                    }
                                }
                                if($co1 == 0){
                                    $this->data['notification'] = "Cập nhật sản phẩm thành công";
                                }else{
                                    $this->data['notification'] = "Cập nhật sản phẩm không thành công quá trình thêm ảnh vào CSDL lỗi";
                                }
                            }else{
                                $this->data['notification'] = "Cập nhật sản phẩm không thành công ảnh chưa được xóa";
                            }
                        }
                    }else{
                        $this->data['notification'] = "Cập nhật sản phẩm vào CSDL không thành công";
                    }
                }else{
                    $this->data['err'] = ['err_name'=>$err_name,'err_price'=>$err_price,'err_quantity'=>$err_quantity,'err_image'=>$err_image];
                    $this->data['ifm'] = ['name'=>$name,'price'=>$price,'quantity'=>$quantity,'image'=>$image];
                }




            }
        }
        public function getAllCatePro(){
            $this->data['pro_cate'] = $this->category->getAllCate();
        }
        public function ViewEditPro(){
            $this->getProForIdPro();
            $this->getAllCatePro();
            $this->EditPro();
            $this->RenderView($this->data,'editproduct');
        }
    }
?>