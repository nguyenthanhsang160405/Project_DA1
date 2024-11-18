<?php 
    class EditcateblogCtl{
        public $data;
        public $cateBlog;
        public function __construct(){
            $this->cateBlog = new CateBlogModel();
        }
        public function RenderView($data,$view){
            $page = './app/view/'.$view.'.php';
            include_once $page;
        }
        public function getOneCateBlog(){
            if(isset($_GET['id_edit_cateblog']) && !empty($_GET['id_edit_cateblog'])){
                $id_cateblog = $_GET['id_edit_cateblog'];
                $this->data['cate_blog'] = $this->cateBlog->getOneCateBlog($id_cateblog);
            }
        }
        public function EditCateBlog(){
            if(isset($_POST['edit_cate_blog']) && $_POST['edit_cate_blog']){
                if(isset($_SESSION['admin']) && !empty($_SESSION['admin'])){
                    //variable err
                    $err_name = '';
                    //variable imformation 
                    $id_loaibv = $_POST['id_loaibv'];
                    $name_cate = $_POST['name_cate_blog'];
                    if(empty($_POST['describe_cate_blog'])){
                        $describe_cate_blog = '';
                    }else{
                        $describe_cate = $_POST['describe_cate_blog'];
                    }
                    
                    $flag = 0;
                    if(empty($name_cate)){
                        $err_name = "Tên danh mục bài viết không dược để trống";
                        $flag = 1;
                    }

                    if($flag==0){
                        $data = [$name_cate,$describe_cate];
                        if($this->cateBlog->UpdateCateBlog($id_loaibv,$data)==true){
                            $this->data['notification'] = 'Cập nhật loại bài viết thành công';
                        }else{
                            $this->data['notification'] = 'Cập nhật loại bài viết không thành công';
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
        public function ViewEditCateBlog(){
            $this->EditCateBlog();
            $this->getOneCateBlog();
            $this->RenderView($this->data,'editcateblog');
        }
    }
?>