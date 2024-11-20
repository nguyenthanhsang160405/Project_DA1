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
    }
?>
                    <div class="admin-showdata">
                        <div class="admin-table-ifm">
                            <form action="index.php?page_adm=addcateblog" method="post" enctype="multipart/form-data">
                                <h3>THÊM LOẠI SẢN PHẨM</h3>
                                <?php 
                                    if(isset($notification) && !empty($notification)){
                                        echo '
                                        <span style="color:green">'.$notification.'</span>
                                        <br><br>';
                                    }
                                ?>
                                <label for="">Tên loại bài viết:</label><span><?php if(isset($err['err_name']) && !empty($err['err_name'])) echo $err['err_name'] ?></span><br>
                                <input type="text" name="name_cate_blog" value="<?php if(isset($ifm['name']) && !empty($ifm['name'])) echo $ifm['name'] ?>"><br>
                                <label for="">Mô tả loại bài viết</label>
                                <input type="text" name="describe_cate_blog" value="<?php if(isset($ifm['describe']) && !empty($ifm['describe'])) echo $ifm['describe'] ?>">
                                <br>
                                <br>
                                <hr>
                                <br>
                                <input type="submit" name="add_cate_blog" value="Thêm loại bài viết">
                                
                            </form>
                        </div>
                    </div>  