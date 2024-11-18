<?php 
    class AddBlogCtl{
        public $data;
        public $blog;
        public $cateBlog;
        public function __construct(){
            $this->blog = new BlogModel();
            $this->cateBlog = new CateBlogModel();
        }
        public function getAllCateBlog(){
            $this->data['cate_blog'] = $this->cateBlog->getAllCateBlog();
        }
        public function AddBlog(){
            if(isset($_POST['add_blog']) && $_POST['add_blog']){
                if(isset($_SESSION['admin']) && !empty($_SESSION['admin'])){
                    //variable err
                    $err_name = '';
                    $err_content = '';
                    $err_image = '';
                    $err_idcate = '';
                    //variable imformation
                    $name = $_POST['name_blog'];
                    $content = $_POST['content_blog'];
                    $image_blog = $_FILES['image_blog'];
                    $flag=0;
                    // xl tên
                    if(empty($name)){
                        $err_name = 'Tên bài viết không được để trống';
                        $flag = 1;
                    }
                    // xl giá
                    if(empty($content)){
                        $err_content = 'Nội dung bài viết không được để trống';
                        $flag = 1;
                    }
                    if(empty($_POST['id_cateblog'])){
                        $err_idcate = 'Vui lòng thêm danh mục trước khi thêm bài viết';
                        $flag = 1;
                    }else{
                        $id_cateblog = $_POST['id_cateblog'];
                    }
                    // xl ảnh
                    if(empty($image_blog['name'])){
                        $err_image = 'Ảnh sản phẩm không được để trống';
                        $flag = 1;
                    }else{
                        if(getimagesize($image_blog['tmp_name']) == false){
                            $err_image = 'File của bạn có thể không là ảnh';
                            $flag = 1;
                        }else{
                            $target_new = '../public/img/'.$image_blog['name'];
                            if(file_exists($target_new) == true){
                                $err_image = 'Ảnh của bạn đã tồn tại trong thư mục';
                                $flag = 1;
                            }
                        }
                    }
                    if($flag == 0){
                        $id_nhanvien = $_SESSION['admin']['id_kh'];
                        $data = [$name,$content,$id_nhanvien,$id_cateblog,$image_blog['name']];
                        if($this->blog->InSertBlog($data) == true){
                            if(move_uploaded_file($image_blog['tmp_name'],$target_new)==true){
                                $this->data['notification'] = "Thêm bài viết thành công";
                            }else{
                                $this->data['notification'] = "Upload ảnh không thành công";
                            }
                        }else{
                            $this->data['notification'] = "Thêm bài viết vào CSDL không thành công";
                        }
                    }else{
                        $this->data['err'] = ['err_name'=>$err_name,'err_content'=>$err_content,'err_image'=>$err_image,'err_idcate'=>$err_idcate];
                        $this->data['ifm'] = ['name'=>$name,'content'=>$content];
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
        public function ViewAddBlog(){
            $this->AddBlog();
            $this->getAllCateBlog();
            $this->RenderView($this->data,'addblog');
        }
    }
?>