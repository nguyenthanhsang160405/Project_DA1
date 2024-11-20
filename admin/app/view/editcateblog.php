<?php
    if(isset($data) && !empty($data)){
        if(isset($data['err']) && !empty($data['err'])){
            $err = $data['err'];
        }
        if(isset($data['cate_blog']) && !empty($data['cate_blog'])){
            $cate_blog = $data['cate_blog'];
        }
        if(isset($data['notification']) && !empty($data['notification'])){
            $notification = $data['notification'];
        }
    }
?>
                    <div class="admin-showdata">
                        <div class="admin-table-ifm">
                            <form action="index.php?page_adm=editcateblog&&id_edit_cateblog=<?php if(isset($cate_blog['id_loaibv']) && !empty($cate_blog['id_loaibv'])) echo $cate_blog['id_loaibv'] ?>" method="post" enctype="multipart/form-data">
                                <h3>THÊM LOẠI SẢN PHẨM</h3>
                                <?php 
                                    if(isset($notification) && !empty($notification)){
                                        echo '
                                        <span style="color:green">'.$notification.'</span>
                                        <br><br>';
                                    }
                                ?>
                                <label for="">Tên loại bài viết:</label><span><?php if(isset($err['err_name']) && !empty($err['err_name'])) echo $err['err_name'] ?></span><br>
                                <input type="text" name="name_cate_blog" value="<?php if(isset($cate_blog['ten_loaibv']) && !empty($cate_blog['ten_loaibv'])) echo $cate_blog['ten_loaibv'] ?>"><br>
                                <label for="">Mô tả loại bài viết</label>
                                <input type="text" name="describe_cate_blog" value="<?php if(isset($cate_blog['mota_loaibv']) && !empty($cate_blog['mota_loaibv'])) echo $cate_blog['mota_loaibv'] ?>">
                                <input type="hidden" name="id_loaibv" value="<?php if(isset($cate_blog['id_loaibv']) && !empty($cate_blog['id_loaibv'])) echo $cate_blog['id_loaibv'] ?>">
                                <br>
                                <br>
                                <hr>
                                <br>
                                <input type="submit" name="edit_cate_blog" value="Cập nhật loại bài viết">
                                
                            </form>
                        </div>
                    </div>  