<?php 
    class CateblogCtl{
        public $data;
        public $cateBlog;
        public function __construct(){
            $this->cateBlog = new CateBlogModel();
        }
        public function getAllCateBlog(){
            $this->data['cate_blog'] = $this->cateBlog->getAllCateBlog();
        }
        public function RenderView($data,$view){
            $page = './app/view/'.$view.'.php';
            include_once $page;
        }
        public function deleteOneCateBlog(){
            if(isset($_GET['id_delete_cateblog']) && $_GET['id_delete_cateblog']){
                if(isset($_SESSION['admin']) && !empty($_SESSION['admin'])){
                    $id_cateblog = $_GET['id_delete_cateblog'];
                    if($this->cateBlog->DeleteOneCateBlog($id_cateblog)==true){
                        $this->data['notification'] = 'Xóa thành công';
                    }else{
                        $this->data['notification'] = 'Xóa không thành công';
                    }
                }else{
                    $this->data['notification'] = 'Bạn vui lòng đăng nhập để thực hiện chức năng này';
                }
            }
            
        }
        public function DeleteBoxChecked(){
            if(isset($_POST['delete_cateblog_for_id_cateblog'])){ 
                if(isset($_SESSION['admin']) && !empty($_SESSION['admin'])){
                    if(empty($_POST['checkid_pro'])){
                        $this->data['notification'] ='Không có sản phẩm nào được chọn';
                    }else{
                        try{
                            $flag = 0;
                            $arr_cateblog_delete = $_POST['checkid_pro'];
                            for($i = 0 ; $i < count($arr_cateblog_delete) ; $i++ ){
                                if($this->cateBlog->DeleteOneCateBlog($arr_cateblog_delete[$i])==false){
                                    $flag = 1;
                                }
                            }
                            if($flag == 0){
                                $this->data['notification'] = 'Xóa thành công';
                            }
                        }catch(Exception $e){
                            echo 'Mã lỗi: ' . $e;
                            $this->data['notification'] = 'Xóa không thành công';
                        }
                    }
                }else{
                    $this->data['notification'] = 'Bạn vui lòng đăng nhập để thực hiện chức năng này';
                }
            }
        }
        public function ViewCateBlog(){
            $this->DeleteBoxChecked();
            $this->deleteOneCateBlog();
            $this->getAllCateBlog();
            $this->RenderView($this->data,'cateblog');
        }
        
    }
?>