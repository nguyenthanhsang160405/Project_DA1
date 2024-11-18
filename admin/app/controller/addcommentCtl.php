<?php 
    class   AddcommentCtl{
        public $data;
        public $comment;
        public $product;
        public function __construct(){
            $this->comment = new CommentModel();
            $this->product = new ProductModel();
        }
        public function RenderView($data,$view){
            $page = './app/view/'.$view.'.php';
            include_once $page;
        }
        public function getPro(){
            if(isset($_GET['id_pro']) && !empty($_GET['id_pro'])){
                $id_pro = $_GET['id_pro'];
                $this->data['product'] = $this->product->getOneProForIDPro($id_pro);
            }
        }
        public function AddComment(){
            if(isset($_POST['add_comment']) && $_POST['add_comment']){
                if(isset($_SESSION['admin']) && !empty($_SESSION['admin'])){
                    $id_adm = $_SESSION['admin']['id_kh'];
                    $id_pro = $_POST['id_pro'];
                    $err_content = '';
                    $content = $_POST['content_cmt'];
                    $flag = 0;
                    if(empty($content)){
                        $err_content = "Nội dung bình luận không được để trống";
                        $flag = 1;
                    }
                    if($flag == 0){
                        $data = [$content,$id_adm,$id_pro];
                        if($this->comment->InSertComment($data) == true ){
                            $this->data['notification'] = 'Thêm bình luận thành công';
                        }else{
                            $this->data['notification'] = 'Thêm bình luận không thành công';
                        }
                    }else{
                        $this->data['err'] = $err_content;
                        $this->data['ifm'] = $content;
                    }
                }else{
                    $this->data['notification'] = 'Bạn vui lòng đăng nhập để thực hiện chức năng này';
                }   
            }
        }
        public function ViewAddCmt(){
            $this->getPro();
            $this->AddComment();
            $this->RenderView($this->data,'addcomment');
        }
    }
?>