<?php 
    class LookbookCtl{
        public $blog;
        public $cateBlog;
        public $data;
        public function __construct(){
            $this->blog =new BlogModel();
            $this->cateBlog = new CateBlogModel();
        }
        // chỗ này
        public function getAllCateBlog(){
            $this->data['cate_blog'] = $this->cateBlog->getAllCateBlog();
        }
        public function getAllBlog(){
            if(isset($_GET['id_cate']) && !empty($_GET['id_cate'])){
                $id_cateblog = $_GET['id_cate'];
                $this->data['blog'] = $this->blog->getAllBlogForIdCateBlog($id_cateblog);
            }else{
                $this->data['blog']  = $this->blog->getAllBlog();
            }
            
        }
        public function RenderView($data,$view){
            $seen = 'app/view/'.$view.'.php';
            include_once $seen;
        }
        public function ViewLookBook(){
            $this->getAllCateBlog();
            $this->getAllBlog();
            $this->RenderView($this->data,'lookbook');
        }
    }
?>