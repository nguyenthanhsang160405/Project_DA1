<?php
print_r($data);
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
        if(isset($data['cate_pro']) && !empty($data['cate_pro'])){
            $cate_pro = $data['cate_pro'];
        }
    }
?>
                    <div class="admin-showdata">
                        <div class="admin-table-ifm">
                            <form action="" method="post" enctype="multipart/form-data">
                                <h3>THÊM SẢN PHẨM</h3>
                                <?php 
                                    if(isset($notification) && !empty($notification)){
                                        echo '
                                        <span style="color:green">'.$notification.'</span>
                                        <br><br>';
                                    }
                                ?>
                                <label for="">Tên sản phẩm:</label><span><?php if(isset($err['err_name']) && !empty($err['err_name'])) echo $err['err_name'] ?></span><br>
                                <input type="text" name="name_pro" value="<?php if(isset($ifm['name']) && !empty($ifm['name'])) echo $ifm['name'] ?>"><br>
                                <label for="">Giá sản phẩm</label><span><?php if(isset($err['err_price']) && !empty($err['err_price'])) echo $err['err_price'] ?></span><br>
                                <input type="number" name="price_pro" value="<?php if(isset($ifm['price']) && !empty($ifm['price'])) echo $ifm['price'] ?>"><br>
                                <label for="">Số lượng sản phẩm</label><span><?php if(isset($err['err_quantity']) && !empty($err['err_quantity'])) echo $err['err_quantity'] ?></span><br>
                                <input type="number" name="quantity_pro" value="<?php if(isset($ifm['quantity']) && !empty($ifm['quantity'])) echo $ifm['quantity'] ?>"><br>
                                <label for="">Danh mục</label><br>
                                <select name="id_catepro" id=""><br>
                                    <?php 
                                        if(isset($cate_pro) && !empty($cate_pro)){
                                            foreach($cate_pro as $cate){
                                                echo '<option style="width: 40px;" value="'.$cate['id_loai'].'">'.$cate['ten_loai'].'</option>';
                                            }
                                        } 
                                    ?>
                                </select>
                                <br>
                                <br>
                                <label for="">Ảnh sản phẩm:</label><span><?php if(isset($err['err_image']) && !empty($err['err_image'])) echo $err['err_image'] ?></span><br>
                                <input style="border: none;" type="file" name="image_pro[]" value="" multiple><br>
                                <hr>
                                <br>
                                <input type="submit" name="add_pro" value="Thêm sản phẩm">
                            </form>
                        </div>
                    </div>    
    