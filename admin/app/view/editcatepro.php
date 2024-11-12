
<?php
    if(isset($data) && !empty($data)){
        if(isset($data['ifm_cate']) && !empty($data['ifm_cate'])){
            $ifm_cate = $data['ifm_cate'];
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
                            <form action="index.php?page_adm=editcatepro&&id_edit_cate=<?php if(isset($ifm_cate['id_loai']) && !empty($ifm_cate['id_loai'])) echo $ifm_cate['id_loai']?>" method="post" enctype="multipart/form-data">
                                <h3>THÊM LOẠI SẢN PHẨM</h3>
                                <?php 
                                    if(isset($notification) && !empty($notification)){
                                        echo '
                                        <span style="color:green">'.$notification.'</span>
                                        <br><br>';
                                    }
                                ?>
                                <label for="">Tên loại sản phẩm:</label><span><?php if(isset($err['err_name']) && !empty($err['err_name'])) echo $err['err_name'] ?></span><br>
                                <input type="text" name="name_cate" value="<?php if(isset($ifm_cate['ten_loai']) && !empty($ifm_cate['ten_loai'])) echo $ifm_cate['ten_loai'] ?>"><br>
                                <label for="">Mô tả loại sản phẩm</label>
                                <input type="text" name="describe_cate" value="<?php if(isset($ifm_cate['mota_loai']) && !empty($ifm_cate['mota_loai'])) echo $ifm_cate['mota_loai'] ?>">
                                <input type="hidden" name="id_cate" value="<?php if(isset($ifm_cate['id_loai']) && !empty($ifm_cate['id_loai'])) echo $ifm_cate['id_loai']?>">
                                <br>
                                <br>
                                <hr>
                                <br>
                                <input type="submit" name="edit_cate" value="Sửa sản phẩm">
                                
                            </form>
                        </div>
                    </div>    