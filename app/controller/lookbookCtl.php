<?php 
    class LookbookCtl{
        public $blog;
        public $data;
        public function __construct(){
            $this->blog =new BlogModel();
        }
        public function getAllBlog(){
            $this->data['blog']  = $this->blog->getAllBlog();
        }
        public function RenderView($data,$view){
            $seen = 'app/view/'.$view.'.php';
            include_once $seen;
        }
        public function ViewLookBook(){
            $this->getAllBlog();
            $this->RenderView($this->data,'lookbook');
        }
    }
?>