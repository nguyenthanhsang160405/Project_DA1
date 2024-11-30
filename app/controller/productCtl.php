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
        public function getAllPro(){
            if(isset($_GET['id_cate']) && !empty($_GET['id_cate'])){
                $id_cate = $_GET['id_cate'];
                $this->data['product'] = $this->product->getAllProForIdCate($id_cate);
                $this->data['image'] = [];
                if(isset($_POST['sapxep'])){
                    $id_sapxep = $_POST['arrange'];
                    if($id_sapxep == 2){
                        uasort($this->data['product'], function($a,$b){
                            return strcasecmp($a['ten_sanpham'],$b['ten_sanpham']);
                        });
                    }else if($id_sapxep == 3){
                        uasort($this->data['product'], function($a,$b){
                            return strcasecmp($b['ten_sanpham'],$a['ten_sanpham']);
                        });
                    }else if($id_sapxep == 4){
                        uasort($this->data['product'], function($a,$b){
                            return $a['gia_sanpham'] <=> $b['gia_sanpham'];
                        });
                    }else if($id_sapxep == 5){
                        uasort($this->data['product'], function($a,$b){
                            return $b['gia_sanpham'] <=> $a['gia_sanpham'];
                        });
                    }
                    $arr_pro = [];
                        foreach($this->data['product'] as $item){
                            array_push($arr_pro,$item);
                        }
                        $this->data['product'] = $arr_pro;
                    for($i = 0 ; $i < count($arr_pro) ; $i++){
                        $one_image = $this->image->getOneImageForIdPro($arr_pro[$i]['id_sanpham']);
                        array_push($this->data['image'],$one_image); 
                    }





                    //newwww
                    if(isset($_GET['id_page'])&& !empty($_GET['id_page'])){
                        $id_page = $_GET['id_page'];
                        $this->data['product_ht'] = [];
                        $this->data['image_ht'] = [];
                        if(intval(count($this->data['product']) / 12) == $id_page){
                            for($i = ($id_page * 12 - 12); $i < count($this->data['product']) ; $i ++){
                                array_push($this->data['product_ht'],$this->data['product'][$i]);
                                array_push($this->data['image_ht'],$this->data['image'][$i]);
                            }
                        }else{
                            for($i = ($id_page * 12 - 12); $i < count($this->data['product']) ; $i ++){
                                array_push($this->data['product_ht'],$this->data['product'][$i]);
                                array_push($this->data['image_ht'],$this->data['image'][$i]);
                            }
                        }
                    }else{
                        $this->data['product_ht'] = [];
                        $this->data['image_ht'] = [];
                        if(count($this->data['product'])< 12){
                            for($i = 0; $i < count($this->data['product']) ; $i ++){
                                array_push($this->data['product_ht'],$this->data['product'][$i]);
                                array_push($this->data['image_ht'],$this->data['image'][$i]);
                            }
                        }else{
                            for($i = 0; $i < 12 ; $i ++){
                                array_push($this->data['product_ht'],$this->data['product'][$i]);
                                array_push($this->data['image_ht'],$this->data['image'][$i]);
                            }
                        }
                        
                    }
                }else{
                    $arr_pro = [];
                        foreach($this->data['product'] as $item){
                            array_push($arr_pro,$item);
                        }
                        $this->data['product'] = $arr_pro;
                    for($i = 0 ; $i < count($arr_pro) ; $i++){
                        $one_image = $this->image->getOneImageForIdPro($arr_pro[$i]['id_sanpham']);
                        array_push($this->data['image'],$one_image); 
                    }




                    //new 
                    if(isset($_GET['id_page'])&& !empty($_GET['id_page'])){
                        $id_page = $_GET['id_page'];
                        $this->data['product_ht'] = [];
                        $this->data['image_ht'] = [];
                        if(intval(count($this->data['product']) / 12) == $id_page){
                            for($i = ($id_page * 12 - 12); $i < count($this->data['product']) ; $i ++){
                                array_push($this->data['product_ht'],$this->data['product'][$i]);
                                array_push($this->data['image_ht'],$this->data['image'][$i]);
                            }
                        }else{
                            for($i = ($id_page * 12 - 12); $i < count($this->data['product']) ; $i ++){
                                array_push($this->data['product_ht'],$this->data['product'][$i]);
                                array_push($this->data['image_ht'],$this->data['image'][$i]);
                            }
                        }
                    }else{
                        $this->data['product_ht'] = [];
                        $this->data['image_ht'] = [];
                        if(count($this->data['product'])< 12){
                            for($i = 0; $i < count($this->data['product']) ; $i ++){
                                array_push($this->data['product_ht'],$this->data['product'][$i]);
                                array_push($this->data['image_ht'],$this->data['image'][$i]);
                            }
                        }else{
                            for($i = 0; $i < 12 ; $i ++){
                                array_push($this->data['product_ht'],$this->data['product'][$i]);
                                array_push($this->data['image_ht'],$this->data['image'][$i]);
                            }
                        }
                        
                    }
                }
                $this->data['id_cate'] = $id_cate;
            }else{
                if(isset($_GET['timkiem']) && !empty($_GET['timkiem'])){
                    $name_pro  = $_GET['timkiem'];
                    $this->data['product'] = $this->product->SearchNamePro($name_pro);
                    $this->data['image'] = [];
                    if(isset($_POST['sapxep'])){
                        $id_sapxep = $_POST['arrange'];
                        if($id_sapxep == 2){
                            uasort($this->data['product'], function($a,$b){
                                return strcasecmp($a['ten_sanpham'],$b['ten_sanpham']);
                            });
                        }else if($id_sapxep == 3){
                            uasort($this->data['product'], function($a,$b){
                                return strcasecmp($b['ten_sanpham'],$a['ten_sanpham']);
                            });
                        }else if($id_sapxep == 4){
                            uasort($this->data['product'], function($a,$b){
                                return $a['gia_sanpham'] <=> $b['gia_sanpham'];
                            });
                        }else if($id_sapxep == 5){
                            uasort($this->data['product'], function($a,$b){
                                return $b['gia_sanpham'] <=> $a['gia_sanpham'];
                            });
                        }
                        $arr_pro = [];
                        foreach($this->data['product'] as $item){
                            array_push($arr_pro,$item);
                        }
                        $this->data['product'] = $arr_pro;
                        for($i = 0 ; $i < count($arr_pro) ; $i++){
                            $one_image = $this->image->getOneImageForIdPro($arr_pro[$i]['id_sanpham']);
                            array_push($this->data['image'],$one_image); 
                        }






                        //neww
                        if(isset($_GET['id_page'])&& !empty($_GET['id_page'])){
                            $id_page = $_GET['id_page'];
                            $this->data['product_ht'] = [];
                            $this->data['image_ht'] = [];
                            if(intval(count($this->data['product']) / 12) == $id_page){
                                for($i = ($id_page * 12 - 12); $i < count($this->data['product']) ; $i ++){
                                    array_push($this->data['product_ht'],$this->data['product'][$i]);
                                    array_push($this->data['image_ht'],$this->data['image'][$i]);
                                }
                            }else{
                                for($i = ($id_page * 12 - 12); $i < count($this->data['product']) ; $i ++){
                                    array_push($this->data['product_ht'],$this->data['product'][$i]);
                                    array_push($this->data['image_ht'],$this->data['image'][$i]);
                                }
                            }
                        }else{
                            $this->data['product_ht'] = [];
                            $this->data['image_ht'] = [];
                            if(count($this->data['product'])< 12){
                                for($i = 0; $i < count($this->data['product']) ; $i ++){
                                    array_push($this->data['product_ht'],$this->data['product'][$i]);
                                    array_push($this->data['image_ht'],$this->data['image'][$i]);
                                }
                            }else{
                                for($i = 0; $i < 12 ; $i ++){
                                    array_push($this->data['product_ht'],$this->data['product'][$i]);
                                    array_push($this->data['image_ht'],$this->data['image'][$i]);
                                }
                            }
                            
                        }
                    }else{
                        $arr_pro = [];
                        foreach($this->data['product'] as $item){
                            array_push($arr_pro,$item);
                        }
                        $this->data['product'] = $arr_pro;
                        for($i = 0 ; $i < count($arr_pro) ; $i++){
                            $one_image = $this->image->getOneImageForIdPro($arr_pro[$i]['id_sanpham']);
                            array_push($this->data['image'],$one_image); 
                        }






                        //new
                        if(isset($_GET['id_page'])&& !empty($_GET['id_page'])){
                            $id_page = $_GET['id_page'];
                            $this->data['product_ht'] = [];
                            $this->data['image_ht'] = [];
                            if(intval(count($this->data['product']) / 12) == $id_page){
                                for($i = ($id_page * 12 - 12); $i < count($this->data['product']) ; $i ++){
                                    array_push($this->data['product_ht'],$this->data['product'][$i]);
                                    array_push($this->data['image_ht'],$this->data['image'][$i]);
                                }
                            }else{
                                for($i = ($id_page * 12 - 12); $i < count($this->data['product']) ; $i ++){
                                    array_push($this->data['product_ht'],$this->data['product'][$i]);
                                    array_push($this->data['image_ht'],$this->data['image'][$i]);
                                }
                            }
                        }else{
                            $this->data['product_ht'] = [];
                            $this->data['image_ht'] = [];
                            if(count($this->data['product'])< 12){
                                for($i = 0; $i < count($this->data['product']) ; $i ++){
                                    array_push($this->data['product_ht'],$this->data['product'][$i]);
                                    array_push($this->data['image_ht'],$this->data['image'][$i]);
                                }
                            }else{
                                for($i = 0; $i < 12 ; $i ++){
                                    array_push($this->data['product_ht'],$this->data['product'][$i]);
                                    array_push($this->data['image_ht'],$this->data['image'][$i]);
                                }
                            }
                            
                        }
                    }
                    $this->data['name_timkiem'] = $name_pro;
                }else{
                    $this->data['product'] = $this->product->getAllPro();
                    $this->data['image'] = [];
                    if(isset($_POST['sapxep'])){
                        $id_sapxep = $_POST['arrange'];
                        if($id_sapxep == 2){
                            echo 20;
                            uasort($this->data['product'], function($a,$b){
                                return strcasecmp($a['ten_sanpham'],$b['ten_sanpham']);
                            });
                        }else if($id_sapxep == 3){
                            uasort($this->data['product'], function($a,$b){
                                return strcasecmp($b['ten_sanpham'],$a['ten_sanpham']);
                            });
                        }else if($id_sapxep == 4){
                            uasort($this->data['product'], function($a,$b){
                                return $a['gia_sanpham'] <=> $b['gia_sanpham'];
                            });
                        }else if($id_sapxep == 5){
                            uasort($this->data['product'], function($a,$b){
                                return $b['gia_sanpham'] <=> $a['gia_sanpham'];
                            });
                        }
                        $arr_pro = [];
                        foreach($this->data['product'] as $item){
                            array_push($arr_pro,$item);
                        }
                        $this->data['product'] = $arr_pro;
                        for($i = 0 ; $i < count($arr_pro) ; $i++){
                            $one_image = $this->image->getOneImageForIdPro($arr_pro[$i]['id_sanpham']);
                            array_push($this->data['image'],$one_image); 
                        }






                        //newwww
                        if(isset($_GET['id_page'])&& !empty($_GET['id_page'])){
                            $id_page = $_GET['id_page'];
                            $this->data['product_ht'] = [];
                            $this->data['image_ht'] = [];
                            if(intval(count($this->data['product']) / 12) == $id_page){
                                for($i = ($id_page * 12 - 12); $i < count($this->data['product']) ; $i ++){
                                    array_push($this->data['product_ht'],$this->data['product'][$i]);
                                    array_push($this->data['image_ht'],$this->data['image'][$i]);
                                }
                            }else{
                                for($i = ($id_page * 12 - 12); $i < count($this->data['product']) ; $i ++){
                                    array_push($this->data['product_ht'],$this->data['product'][$i]);
                                    array_push($this->data['image_ht'],$this->data['image'][$i]);
                                }
                            }
                        }else{
                            $this->data['product_ht'] = [];
                            $this->data['image_ht'] = [];
                            if(count($this->data['product'])< 12){
                                for($i = 0; $i < count($this->data['product']) ; $i ++){
                                    array_push($this->data['product_ht'],$this->data['product'][$i]);
                                    array_push($this->data['image_ht'],$this->data['image'][$i]);
                                }
                            }else{
                                for($i = 0; $i < 12 ; $i ++){
                                    array_push($this->data['product_ht'],$this->data['product'][$i]);
                                    array_push($this->data['image_ht'],$this->data['image'][$i]);
                                }
                            }
                            
                        }
                    }else{
                        $arr_pro = [];
                        foreach($this->data['product'] as $item){
                            array_push($arr_pro,$item);
                        }
                        $this->data['product'] = $arr_pro;
                        for($i = 0 ; $i < count($arr_pro) ; $i++){
                            $one_image = $this->image->getOneImageForIdPro($arr_pro[$i]['id_sanpham']);
                            array_push($this->data['image'],$one_image); 
                        }









                        //newww
                        if(isset($_GET['id_page'])&& !empty($_GET['id_page'])){
                            $id_page = $_GET['id_page'];
                            $this->data['product_ht'] = [];
                            $this->data['image_ht'] = [];
                            if(intval(count($this->data['product']) / 12) == $id_page){
                                for($i = ($id_page * 12 - 12); $i < count($this->data['product']) ; $i ++){
                                    array_push($this->data['product_ht'],$this->data['product'][$i]);
                                    array_push($this->data['image_ht'],$this->data['image'][$i]);
                                }
                            }else{
                                for($i = ($id_page * 12 - 12); $i < count($this->data['product']) ; $i ++){
                                    array_push($this->data['product_ht'],$this->data['product'][$i]);
                                    array_push($this->data['image_ht'],$this->data['image'][$i]);
                                }
                            }
                        }else{
                            $this->data['product_ht'] = [];
                            $this->data['image_ht'] = [];
                            if(count($this->data['product'])< 12){
                                for($i = 0; $i < count($this->data['product']) ; $i ++){
                                    array_push($this->data['product_ht'],$this->data['product'][$i]);
                                    array_push($this->data['image_ht'],$this->data['image'][$i]);
                                }
                            }else{
                                for($i = 0; $i < 12 ; $i ++){
                                    array_push($this->data['product_ht'],$this->data['product'][$i]);
                                    array_push($this->data['image_ht'],$this->data['image'][$i]);
                                }
                            }
                            
                        }
                    }
                }
            }
        }
        public function RenderView($data,$view){
            $seen = 'app/view/'.$view.'.php';
            include_once $seen;
        }
        public function ViewProduct(){
            $this->getAllPro();
            $this->RenderView($this->data,'product');
        }
    }