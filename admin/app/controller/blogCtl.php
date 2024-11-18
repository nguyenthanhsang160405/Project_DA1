<?php 
    class BlogCtl{
        public $data;
        public $blog;
        public $user;
        public function __construct(){
            $this->blog = new BlogModel();
            $this->user = new UserModel();
        }
        public function getBlogAndUser(){
            $this->data['blog'] = $this->blog->getAllBlog();
            $blog = $this->data['blog'];
            $this->data['user'] = [];
            for($i = 0 ; $i < count($blog) ; $i++){
                array_push($this->data['user'],$this->user->getOneUser($blog[$i]['id_nhanvien']));
            }
        }
        public function DeleteCheckedBox(){
            if(isset($_POST['delete_blog_for_id_cateblog'])){
                if(isset($_SESSION['admin']) && !empty($_SESSION['admin'])){
                    if(empty($_POST['checkid_pro'])){
                        $this->data['notification'] = 'Không có bài viết nào được chọn';
                    }else{
                        $arr_id_blog = $_POST['checkid_pro'];
                        $flag = 0;
                        $target = "../public/img/";
                        for($i = 0 ; $i < count($arr_id_blog) ; $i++){
                            $blog = $this->blog->getOneBlogByIdBlog($arr_id_blog[$i]);
                            if(empty($blog)){
                                $this->data['notification'] = 'Bài viết không tồn tại';
                                $flag = 1;
                            }else{
                                $target_old = $target.$blog['anh_baiviet'];
                                if(unlink($target_old)==true){
                                    if($this->blog->DeleteBlogByIdBlog($arr_id_blog[$i])==false){
                                        $flag = 1;
                                    }
                                }else{
                                    $this->data['notification'] = 'Xóa ảnh không thành công';
                                    $flag = 1;
                                }
                            }
                        }
                        if($flag == 0){
                            $this->data['notification'] = 'Xóa bài viết thành công';
                        }
                    }
                }else{
                    $this->data['notification'] = 'Bạn vui lòng đăng nhập để thực hiện chức năng này';
                }
            }
        }
        public function DeleteOneBlog(){
            if(isset($_GET['id_delete_blog']) && !empty($_GET['id_delete_blog'])){
                if(isset($_SESSION['admin']) && !empty($_SESSION['admin'])){
                    $id_blog = $_GET['id_delete_blog'];
                    $blog = $this->blog->getOneBlogByIdBlog($id_blog);
                    if(!empty($blog)){
                        if($this->blog->DeleteBlogByIdBlog($id_blog) == true){
                            $target_old = "../public/img/".$blog['anh_baiviet'];
                            if(unlink($target_old) == true){
                                $this->data['notification'] = 'Xóa bài viết thành công';
                            }else{
                                $this->data['notification'] = 'Xóa ảnh trong thư mục không thành công';
                            }
                        }else{
                            $this->data['notification'] = 'Xóa trong CSDL không thành công';
                        }
                    }else{
                        $this->data['notification'] = 'Bài viết không tồn tại';
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
        public function ViewBlog(){
            $this->DeleteCheckedBox();
            $this->DeleteOneBlog();
            $this->getBlogAndUser();
            $this->RenderView($this->data,'blog');
        }
    }
?>