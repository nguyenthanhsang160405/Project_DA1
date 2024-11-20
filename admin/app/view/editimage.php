
<?php
print_r($data);
    if(isset($data) && !empty($data)){
        if(isset($data['image']) && !empty($data['image'])){
            $ifm_image = $data['image'];
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
                            <form action="index.php?page_adm=editimage&&id_edit_image=<?php if(isset($ifm_image['id_anh']) && !empty($ifm_image['id_anh'])) echo $ifm_image['id_anh']?>" method="post" enctype="multipart/form-data">
                                <h3>CẬP NHẬT ẢNH SẢN PHẨM</h3>
                                <?php 
                                    if(isset($notification) && !empty($notification)){
                                        echo '
                                        <span style="color:green">'.$notification.'</span>
                                        <br><br>';
                                    }
                                ?>
                                <label for="">Ảnh sản phẩm:</label><span>
                                <input style="border: none;" type="file" name="image_pro" value=""><br>
                                <input style="border: none;" type="hidden" name="id_image" value="<?php if(isset($ifm_image['id_anh']) && !empty($ifm_image['id_anh'])) echo $ifm_image['id_anh'] ?>"><br>
                                <hr>
                                <br>
                                <input type="submit" name="edit_image" value="Sửa sản phẩm">
                                
                            </form>
                        </div>
                    </div>    