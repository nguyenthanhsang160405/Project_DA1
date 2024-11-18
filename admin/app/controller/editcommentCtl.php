<?php 
    class EditcommentCtl{
        public $data;
        public $comment;
        public function __construct(){
            $this->comment = new CommentModel();
        }
        public function ShowComment(){
            if(isset($_GET['id_edit_comment']) && !empty($_GET['id_edit_comment'])){
                $id_cmt = $_GET['id_edit_comment'];
                $this->data['comment'] = $this->comment->getOneCmt($id_cmt);
            }
        }
        public function UpdateCmt(){
            if(isset($_POST['edit_comment']) && $_POST['edit_comment']){
                if(isset($_SESSION['admin']) && !empty($_SESSION['admin'])){
                    $err_content = '';
                    $id_comment = $_POST['id_cmt'];
                    $content = $_POST['content_cmt'];
                    $flag = 0;
                    if(empty($content)){
                        $err_content = 'Nội dung bình luận không được để trống';
                        $flag = 1;
                    }

                    if($flag == 0){
                        if($this->comment->UpdateCmt($id_comment,[$content]) == true){
                            $this->data['notification'] = 'Cập nhật bình luận thành công';
                        }else{
                            $this->data['notification'] = 'Cập nhật bình luận không thành công';
                        }
                    }else{
                        $this->data['err'] = $err_content;
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
        
        public function ViewEditCmt(){
            $this->UpdateCmt();
            $this->ShowComment();
            $this->RenderView($this->data,'editcomment');
        }

    }
?>