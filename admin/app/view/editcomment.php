<?php 
    print_r($data);
    if(isset($data) && !empty($data)){
        if(isset($data['comment']) && !empty($data['comment'])){
            $comment = $data['comment'];
        }
        if(isset($data['err']) && !empty($data['err'])){
            $err = $data['err'];
        }
        if(isset($data['notification']) && !empty($data['notification'])){
            $notification = $data['notification'];
        }
    }
?>
<div class="admin-showdata">
                        <div class="admin-table-ifm">
                            <form action="index.php?page_adm=editcomment&&id_edit_comment=<?php if(isset($comment) && !empty($comment)) echo $comment['id_binhluan'] ?>" method="post" enctype="multipart/form-data">
                                <h3>THÊM BÌNH LUẬN</h3>
                                <?php 
                                    if(isset($notification) && !empty($notification)){
                                        echo '
                                        <span style="color:green">'.$notification.'</span>
                                        <br><br>';
                                    }
                                ?>
                                <label for="">Nội dung bình luận:</label><span><?php if(isset($err) && !empty($err)) echo $err ?></span><br>
                                <input type="text" name="content_cmt" value="<?php if(isset($comment) && !empty($comment)) echo $comment['noidung_binhluan'] ?>"><br>
                                <input type="hidden" name="id_cmt" value="<?php if(isset($comment) && !empty($comment)) echo $comment['id_binhluan'] ?>"><br>
                                <hr>
                                <br>
                                <input type="submit" name="edit_comment" value="Cập nhật bình luận">
                                
                            </form>
                        </div>
                    </div>