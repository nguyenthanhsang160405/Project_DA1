<?php 
    class AddcateblogCtl{
        public $data;
        public $cateBlog;
        public function __construct(){
            $this->cateBlog = new CateBlogModel();
        }
        public function RenderView($data,$view){
            $page = './app/view/'.$view.'.php';
            include_once $page;
        }
        public function AddCateBlog(){
            if(isset($_POST['add_cate_blog']) && $_POST['add_cate_blog']){
                if(isset($_SESSION['admin']) && !empty($_SESSION['admin'])){
                    //variable err
                    $err_name = '';
                    //variable imformation 
                    $name_cate = $_POST['name_cate_blog'];
                    if(empty($_POST['describe_cate_blog'])){
                        $describe_cate = '';
                    }else{
                        $describe_cate = $_POST['describe_cate_blog'];
                    }
                    
                    $flag = 0;
                    if(empty($name_cate)){
                        $err_name = "Tên danh mục bài viết không dược để trống";
                        $flag = 1;
                    }

                    if($flag==0){
                        $id_nhanvien = $_SESSION['admin']['id_kh'];
                        $data = [$name_cate,$describe_cate,$id_nhanvien];
                        if($this->cateBlog->InsertCateBlog($data) == true){
                            $this->data['notification'] = 'Thêm loại bài viết thành công';
                        }else{
                            $this->data['notification'] = 'Thêm loại bài viết không thành công';
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
        public function ViewAddCateBlog(){
            $this->AddCateBlog();
            $this->RenderView($this->data,'addcateblog');
        }
        

    }
?>