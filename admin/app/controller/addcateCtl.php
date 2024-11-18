<?php 
    class AddcateCtl{
        public $data;
        public $cate;
        public function __construct(){
            $this->cate = new CategoryModel();
        }
        public function AddCate(){
            if(isset($_POST['add_cate']) && $_POST['add_cate']){
                if(isset($_SESSION['admin']) && !empty($_SESSION['admin'])){
                    //variable err
                    $err_name = '';
                    //variable imformation 
                    $name_cate = $_POST['name_cate'];
                    if(empty($_POST['describe_cate'])){
                        $describe_cate = '';
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
                        if($this->cate->InsertCategoryPro($data) == true){
                            $this->data['notification'] = 'Thêm danh mục thành công';
                        }else{
                            $this->data['notification'] = 'Thêm danh mục không thành công';
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
        public function ViewAddCate(){
            $this->AddCate();
            $this->RenderView($this->data,'addcatepro');
        }
    }
?>