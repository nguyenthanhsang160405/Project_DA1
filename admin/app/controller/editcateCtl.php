<?php 
    class EditcateCtl{
        public $data;
        public $cate;
        public function __construct(){
            $this->cate = new CategoryModel();
        }
        public function showCatePro(){
            if(isset($_GET['id_edit_cate']) && !empty($_GET['id_edit_cate'])){
                $id_loai = $_GET['id_edit_cate'];
                $this->data['ifm_cate'] = $this->cate->getCateProForIdCate($id_loai);
            }
        }
        public function EditCatePro(){
            if(isset($_POST['edit_cate']) && $_POST['edit_cate']){
                if(isset($_SESSION['admin']) && !empty($_SESSION['admin'])){
                    //variable err
                    $err_name = '';
                    //variable imformation
                    $id_cate = $_POST['id_cate'];
                    $name_cate = $_POST['name_cate'];
                    if(empty($_POST['describe_cate'])){
                        $describe_cate = '';
                        echo 1;
                    }else{
                        $describe_cate = $_POST['describe_cate'];
                    }
                    
                    $flag = 0;
                    if(empty($name_cate)){
                        $err_name = "Tên danh mục không dược để trống";
                        $flag = 1;
                    }
    
                    if($flag==0){
                        $data = [$name_cate,$describe_cate];
                        if($this->cate->UpdateCateForIdCate($id_cate,$data)===true){
                            $this->data['notification'] = 'Cập nhật danh mục thành công';
                        }else{
                            $this->data['notification'] = 'Cập nhật danh mục không thành công ';
                        }
                        
                    }else{
                        $this->data['err'] = ['err_name'=>$err_name];
                        $this->data['ifm'] = ['name'=>$name_cate,'describe'=>$describe_cate];
                    }
                }else{
                    $this->data['notification'] = 'Bạn vui lòng đăng nhập để thực hiện chức năng này';
                }
            }
        }
        public function RenderView($data,$view){
            $page = './app/view/'.$view.'.php';
            include_once $page;
        }
        public function ViewEditCatePro(){
            $this->EditCatePro();
            $this->showCatePro();
            $this->RenderView($this->data,'editcatepro');
        }
    }
?>