<?php 
    class DetailCtl{
        public $data;
        public $product;
        public $image;
        public $cart;
        public function __construct(){
            $this->product = new ProductModel();
            $this->image = new ImageProModel();
            $this->cart = new CartModel();
        }
        public function getPro(){
            if(isset($_GET['id_pro']) && !empty($_GET['id_pro'])){
                $id_pro = $_GET['id_pro'];
                $this->data['product']  = $this->product->getOneProForIDPro($id_pro);
                $this->data['image'] = $this->image->getImageForIdPro($id_pro);
                //sản phẩm liên quan
                $this->data['all_image'] = [];
                $this->data['all_product'] = $this->product->getAllProByIdCateDifferentIdPro($this->data['product']['id_loaisp'],$id_pro);
                foreach ($this->data['all_product'] as $one){
                    $one_image = $this->image->getOneImageForIdPro($one['id_sanpham']);
                    array_push($this->data['all_image'],$one_image); 
                }
            }
        }
        public function AddCart(){
            if(isset($_POST['add-to-cart']) && $_POST['add-to-cart']){
                $err_size = '';
                
                $name_pro = $_POST['name_pro'];
                $image_pro = $_POST['image_pro'];
                $price_pro = $_POST['price_pro'];
                $quantity_pro = $_POST['amount'];
                $size_pro = $_POST['select_size_product'];
                $id_product = $_POST['id_product'];
                $flag = 0;
                if(empty($size_pro)){
                    $err_size = 'Vui lòng chọn size sản phẩm';
                    $flag = 1;
                }

                if($flag == 0){
                    if(isset($_SESSION['user']) && !empty($_SESSION['user'])){
                        $id_kh = $_SESSION['user']['id_kh'];
                        $flag_add = 0;
                        $arr_pro_cart = $this->cart->getAllCartByIdUser($id_kh);
                        for($i = 0 ; $i < count($arr_pro_cart) ; $i++ ){
                            if($arr_pro_cart[$i]['id_sanpham'] == $id_product && $arr_pro_cart[$i]['size_sanpham'] == $size_pro){
                                $sl = $arr_pro_cart[$i]['soluong_sanpham'] + $quantity_pro;
                                $this->cart->Update($arr_pro_cart[$i]['id_ctgiohang'],[$sl]);
                                $flag_add = 1;
                            }
                        }
                        if($flag_add == 0){
                            $data = [$size_pro,$quantity_pro,$price_pro,$id_product,$id_kh,$name_pro,$image_pro];
                            $this->cart->InsertCart($data);
                            header('location:index.php?page=cart');
                        }else{
                            header('location:index.php?page=cart');
                        }
                    }else{
                        $flag_add = 0;
                        for($i = 0 ; $i < count($_SESSION['cart']) ; $i++){
                            if($_SESSION['cart'][$i]['id_pro'] == $id_product && $_SESSION['cart'][$i]['size'] == $size_pro){
                                $flag_add = 1;
                                $_SESSION['cart'][$i]['quantity'] = $_SESSION['cart'][$i]['quantity'] + $quantity_pro;
                            }
                        }
                        if($flag_add == 0){
                            $data = ['id_pro'=>$id_product,'size'=>$size_pro,'quantity'=>$quantity_pro,'price'=>$price_pro,'name'=>$name_pro,'image'=>$image_pro];
                            array_push($_SESSION['cart'],$data);
                            header('location:index.php?page=cart');
                        }else{
                            header('location:index.php?page=cart');
                        }
                    }
                }else{
                    echo '<script>alert("Vui lòng chọn size để tiếp tục")</script>';
                }
                
            }
        }
        public function BuyProduct(){
            if(isset($_POST['buy-now']) && $_POST['buy-now']){
                if(isset($_SESSION['user']) && !empty($_SESSION['user'])){
                    $name_pro = $_POST['name_pro'];
                    $image_pro = $_POST['image_pro'];
                    $price_pro = $_POST['price_pro'];
                    $quantity_pro = $_POST['amount'];
                    $size_pro = $_POST['select_size_product'];
                    $id_product = $_POST['id_product'];
                    $flag = 0;
                    if(empty($size_pro)){
                        $flag = 1;
                    }
                    if($flag == 0){
                        $id_kh = $_SESSION['user']['id_kh'];
                        $flag_add = 0;
                        $arr_pro_cart = $this->cart->getAllCartByIdUser($id_kh);
                        for($i = 0 ; $i < count($arr_pro_cart) ; $i++ ){
                            if($arr_pro_cart[$i]['id_sanpham'] == $id_product && $arr_pro_cart[$i]['size_sanpham'] == $size_pro){
                                $sl = $arr_pro_cart[$i]['soluong_sanpham'] + $quantity_pro;
                                $this->cart->Update($arr_pro_cart[$i]['id_ctgiohang'],[$sl]);
                                $flag_add = 1;
                            }
                        }
                        if($flag_add == 0){
                            $data = [$size_pro,$quantity_pro,$price_pro,$id_product,$id_kh,$name_pro,$image_pro];
                            $this->cart->InsertCart($data);
                            header('location:index.php?page=payment');
                        }else{
                            header('location:index.php?page=payment');
                        }
                    }else{
                        echo '<script>alert("Vui lòng chọn size để tiếp tục")</script>';
                    }
                }else{
                    header('location:index.php?page=sigin');
                }
            }
        }
        public function RenderView($data,$view){
            $seen = 'app/view/'.$view.'.php';
            include_once $seen;
        }
        public function ViewDetail(){
            $this->BuyProduct();
            $this->getPro();
            $this->AddCart();
            $this->RenderView($this->data,'detail');
        }

    }
?>