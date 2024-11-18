<?php
    if(isset($data) && !empty($data)){
        if(isset($data['err']) && !empty($data['err'])){
            $err = $data['err'];
        }
        if(isset($data['ifm']) && !empty($data['ifm'])){
            $ifm = $data['ifm'];
        }
        if(isset($data['notification']) && !empty($data['notification'])){
            $notification = $data['notification'];
        }
        if(isset($data['cate_blog']) && !empty($data['cate_blog'])){
            $cate_blog = $data['cate_blog'];
        }
    }
?>
                    <div class="admin-showdata">
                        <div class="admin-table-ifm">
                            <form action="index.php?page_adm=addblog" method="post" enctype="multipart/form-data">
                                <h3>THÊM BÀI VIẾT</h3>
                                <?php 
                                    if(isset($notification) && !empty($notification)){
                                        echo '
                                        <span style="color:green">'.$notification.'</span>
                                        <br><br>';
                                    }
                                ?>
                                <label for="">Tên bài viết:</label><span><?php if(isset($err['err_name']) && !empty($err['err_name'])) echo $err['err_name'] ?></span><br>
                                <input type="text" name="name_blog" value="<?php if(isset($ifm['name']) && !empty($ifm['name'])) echo $ifm['name'] ?>"><br>
                                <label for="">Nội dung bài viết:</label><span><?php if(isset($err['err_content']) && !empty($err['err_content'])) echo $err['err_content'] ?></span><br>
                                <textarea name="content_blog" id="" rows="10" style="width: 100%;"><?php if(isset($ifm['content']) && !empty($ifm['content'])) echo $ifm['content'] ?></textarea><br>
                                <label for="">Danh mục</label><span><?php if(isset($err['err_idcate']) && !empty($err['err_idcate'])) echo $err['err_idcate'] ?></span><br>
                                <select name="id_cateblog" id=""><br>
                                    <?php 
                                        if(isset($cate_blog) && !empty($cate_blog)){
                                            foreach($cate_blog as $cate){
                                                echo '<option style="width: 40px;" value="'.$cate['id_loaibv'].'">'.$cate['ten_loaibv'].'</option>';
                                            }
                                        } 
                                    ?>
                                </select>
                                <br>
                                <br>
                                <label for="">Ảnh bài viết:</label><span><?php if(isset($err['err_image']) && !empty($err['err_image'])) echo $err['err_image'] ?></span><br>
                                <input style="border: none;" type="file" name="image_blog" value=""><br>
                                <hr>
                                <br>
                                <input type="submit" name="add_blog" value="Thêm bài viết">
                            </form>
                        </div>
                    </div>    
    