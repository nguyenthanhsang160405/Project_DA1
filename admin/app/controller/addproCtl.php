<?php 
    class AddproCtl{
        public $data;
        public $product;
        public $cate;
        public $image_pro;
        public function __construct(){
            $this->product =  new ProductModel();
            $this->cate = new CategoryModel();
            $this->image_pro = new ImageProModel();
        }
        public function RenderView($data,$view){
            $page = './app/view/'.$view.'.php';
            include_once $page;
        }
        public function getAllCatePro(){
            $this->data['cate_pro'] = $this->cate->getAllCate();
        }
        public function AddPro(){
            if(isset($_POST['add_pro']) && $_POST['add_pro']){
                if(isset($_SESSION['admin']) && !empty($_SESSION['admin'])){
                    //variable err
                    $err_name = '';
                    $err_price = '';
                    $err_quantity = '';
                    $err_image = '';
                    //variable imformation
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
                    if(empty($image['name'][0])){
                        $err_image = 'Ảnh sản phẩm không được để trống';
                        $flag = 1;
                    }else{
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
                        $data = [$name,$price,$quantity,$id_cate];
                        $result = $this->product->InsertProduct($data);
                        if($result[0] == true){
                            $id_pro = $result[1];
                            $target = "../public/img/";
                            for($i = 0 ; $i < count($image['name']) ; $i++){
                                $target_one_img = $target.$image['name'][$i];
                                $param = [$image['name'][$i],$id_pro];
                                if(move_uploaded_file($image['tmp_name'][$i],$target_one_img)){
                                    if($this->image_pro->InsertImagePro($param)==true){
                                        $this->data['notification'] = "Thêm sản phẩm thành công";
                                    }else{
                                        $this->data['notification'] = "Thêm sản phẩm không thành công";
                                    }
                                    
                                }else{
                                    $this->data['notification'] = "Thêm ảnh không thành công";
                                }
                            }
                        }
                    }else{
                        $this->data['err'] = ['err_name'=>$err_name,'err_price'=>$err_price,'err_quantity'=>$err_quantity,'err_image'=>$err_image];
                        $this->data['ifm'] = ['name'=>$name,'price'=>$price,'quantity'=>$quantity,'image'=>$image];
                    }
                }else{
                    $this->data['notification'] = 'Bạn vui lòng đăng nhập để thực hiện chức năng này';
                }
            }
        }
        public function ViewAddPro(){
            $this->AddPro();
            $this->getAllCatePro();
            $this->RenderView($this->data,'addpro');
        }
    }
?>