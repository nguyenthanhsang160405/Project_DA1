<?php
    print_r($data);
    if(isset($data) && !empty($data)){
        if(isset($data['err']) && !empty($data['err'])){
            $err = $data['err'];
        }
        if(isset($data['pro']) && !empty($data['pro'])){
            $pro = $data['pro'];
        }
        if(isset($data['notification']) && !empty($data['notification'])){
            $notification = $data['notification'];
        }
    }
?>
<div class="admin-showdata">
                        <div class="admin-table-ifm">
                            <form action="index.php?page_adm=addimage&&id_pro_image=<?php if(isset($pro['id_sanpham']) && !empty($pro['id_sanpham'])) echo $pro['id_sanpham']?>" method="post" enctype="multipart/form-data">
                                <h3>THÊM ẢNH SẢN PHẨM</h3>
                                <?php 
                                    if(isset($notification) && !empty($notification)){
                                        echo '
                                        <span style="color:green">'.$notification.'</span>
                                        <br><br>';
                                    }
                                ?>
                                <label for="">Ảnh sản phẩm:</label><span><?php if(isset($err) && !empty($err)) echo $err ?></span>
                                <input style="border: none;" type="file" name="image_pro" value=""><br>
                                <hr>
                                <br>
                                <input type="submit" name="add_image" value="Thêm ảnh">
                            </form>
                        </div>
                    </div>