<?php 
    class DetaillookbookCtl{
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
        public function getIfmBlog() {
            if(isset($_GET['id_blog']) && !empty($_GET['id_blog'])){
                $id_blog = $_GET['id_blog'];
                $this->data['blog'] = $this->blog->getOneBlogByIdBlog($id_blog);
            }
        }
        public function RenderView($data,$view){
            $seen = 'app/view/'.$view.'.php';
            include_once $seen;
        }
        public function ViewDetailLookBook(){
            $this->getAllCateBlog();
            $this->getIfmBlog();
            $this->RenderView($this->data,'detaillookbook');
        }
    }
?>