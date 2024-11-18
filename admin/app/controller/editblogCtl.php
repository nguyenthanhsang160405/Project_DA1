<?php 
    class EditblogCtl{
        public $data;
        public $blog;
        public $cateBlog;
        public function __construct(){
            $this->blog =new BlogModel();
            $this->cateBlog = new CateBlogModel();
        }
        public function getBlogAndCateBlog(){
            if(isset($_GET['id_edit_blog']) && !empty($_GET['id_edit_blog'])){
                $id_blog = $_GET['id_edit_blog'];
                echo $id_blog;
                $this->data['blog'] = $this->blog->getOneBlogByIdBlog($id_blog);
                $this->data['cate_blog'] = $this->cateBlog->getAllCateBlog();
            }
        }
        public function Edit_Blog(){
            if(isset($_POST['edit_blog']) && $_POST['edit_blog']){
                if(isset($_SESSION['admin']) && !empty($_SESSION['admin'])){
                    //variable err
                    $err_name = '';
                    $err_content = '';
                    $err_image = '';
                    $err_idcate = '';
                    //variable imformation
                    $id_blog = $_POST['id_blog'];
                    $name = $_POST['name_blog'];
                    $content = $_POST['content_blog'];
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
                    if(empty($_FILES['image_blog']['name'])){
                        $image_blog['name'] = $_POST['image_old_blog']; 
                    }else{
                        $image_blog = $_FILES['image_blog'];
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
                        $target_old = "../public/img/".$_POST['image_old_blog'];
                    }
                    if($flag == 0){
                        echo 'ok';
                        $target_new = '../public/img/'.$image_blog['name'];
                        $data = [$name,$content,$id_cateblog,$image_blog['name']];
                        if(isset($target_old)){
                            unlink($target_old);
                            if($this->blog->UpdateBlog($id_blog,$data) == true){
                                if(move_uploaded_file($image_blog['tmp_name'],$target_new)==true){
                                    $this->data['notification'] = "Cập nhật bài viết thành công";
                                }else{
                                    $this->data['notification'] = "Upload ảnh vào thư mục không thành công";
                                }
                            }else{
                                $this->data['notification'] = "Thêm bài viết vào CSDL không thành công";
                            }
                            
                        }else{
                            if($this->blog->UpdateBlog($id_blog,$data) == true){
                                $this->data['notification'] = "Cập nhật bài viết thành công";
                            }else{
                                $this->data['notification'] = "Cập nhật bài viết không thành công";
                            }
                        }
                        
                    }else{
                        $this->data['err'] = ['err_name'=>$err_name,'err_content'=>$err_content,'err_image'=>$err_image,'err_idcate'=>$err_idcate];
                        $this->data['ifm'] = ['name'=>$name,'content'=>$content];
                    }
                }
            }
        }
        public function RenderView($data,$view){
            $page = './app/view/'.$view.'.php';
            include_once $page;
        }
        public function ViewEditBlog(){
            $this->Edit_Blog();
            $this->getBlogAndCateBlog();
            $this->RenderView($this->data,'editblog');
        } 
    }
?>