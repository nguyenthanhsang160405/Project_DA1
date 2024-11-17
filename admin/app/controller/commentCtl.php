<?php 
    class CommentCtl{
        public $data;
        public $comment;
        public $product;
        public $user;
        public function __construct(){
            $this->comment = new CommentModel();
            $this->product = new ProductModel();
            $this->user = new UserModel();
        }
        public function RenderView($data,$view){
            $page = './app/view/'.$view.'.php';
            include_once $page;
        }
        public function getCommentForIdComment(){
            if(isset($_GET['id_comment_pro']) &&  !empty($_GET['id_comment_pro'])){
                $id_pro = $_GET['id_comment_pro'];
                $this->data['comment'] = $this->comment->getAllCommentForIdPro($id_pro);
                $this->data['product'] = $this->product->getOneProForIDPro($id_pro);
                $this->data['user'] = [];
                $arr_comment = $this->data['comment'];
                for($i = 0 ; $i < count($arr_comment) ; $i++){
                    array_push($this->data['user'],$this->user->getOneUser($arr_comment[$i]['id_kh']));
                }
            }
        }
        public function DeleteOneComment(){
            if(isset($_GET['id_delete_comment']) && !empty($_GET['id_delete_comment'])){
                if(isset($_SESSION['admin']) && !empty($_SESSION['admin'])){
                    $id_comment = $_GET['id_delete_comment'];
                    if($this->comment->DeleteCmtForIdCmt($id_comment) == true){
                        $this->data['notification'] = 'Xóa bình luận thành công';
                    }else{
                        $this->data['notification'] = 'Xóa bình luận không thành công';
                    }
                }else{
                    $this->data['notification'] = 'Bạn vui lòng đăng nhập để thực hiện chức năng này';
                }
            }
        }
        public function DeleteAllCheckedCmt(){
            if(isset($_POST['delete_comment_for_id_comment'])){
                if(empty($_POST['checkid_pro'])){
                    $this->data['notification'] = 'Không có bình luận nào được chọn';
                }else{
                    $arr_id_cmt = $_POST['checkid_pro'];
                    $flag = 0;
                    for($i = 0 ; $i < count($arr_id_cmt) ; $i++ ){
                        if($this->comment->DeleteCmtForIdCmt($arr_id_cmt[$i])== false){
                            $flag = 1;
                        }
                    }
                    if($flag == 0){
                        $this->data['notification'] = 'Xóa bình luận thành công';
                    }else{
                        $this->data['notification'] = 'Xóa bình luận thất bại';
                    }
                }
            }
        }
        public function viewComment(){
            $this->DeleteAllCheckedCmt();
            $this->DeleteOneComment();
            $this->getCommentForIdComment();
            $this->RenderView($this->data,'comment');
        }
    }
?>