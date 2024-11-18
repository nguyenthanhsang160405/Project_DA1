<?php 
    if(isset($data) && !empty($data)){
        if(isset($data['ifm_product']) && !empty($data['ifm_product'])){
            $ifm_product = $data['ifm_product'];
        }
        if(isset($data['err']) && !empty($data['err'])){
            $err = $data['err'];
        }
        if(isset($data['notification']) && !empty($data['notification'])){
            $notification = $data['notification'];
        }
        if(isset($data['pro_cate']) && !empty($data['pro_cate'])){
            $cate_pro = $data['pro_cate'];
        }
    }
?>
<div class="admin-showdata">
                        <div class="admin-table-ifm">
                            <form action="index.php?page_adm=editproduct&&id_pro_edit=<?php if(isset($ifm_product['id_sanpham']) && !empty($ifm_product['id_sanpham'])) echo $ifm_product['id_sanpham'] ?>" method="post" enctype="multipart/form-data">
                                <h3>CẬP NHẬT SẢN PHẨM</h3>
                                <?php 
                                    if(isset($notification) && !empty($notification)){
                                        echo '
                                        <span style="color:green">'.$notification.'</span>
                                        <br><br>';
                                    }
                                ?>
                                <label for="">Tên sản phẩm:</label><span><?php if(isset($err['err_name']) && !empty($err['err_name'])) echo $err['err_name'] ?></span><br>
                                <input type="text" name="name_pro" value="<?php if(isset($ifm_product['ten_sanpham']) && !empty($ifm_product['ten_sanpham'])) echo $ifm_product['ten_sanpham'] ?>"><br>
                                <label for="">Giá sản phẩm</label><span><?php if(isset($err['err_price']) && !empty($err['err_price'])) echo $err['err_price'] ?></span><br>
                                <input type="number" name="price_pro" value="<?php if(isset($ifm_product['gia_sanpham']) && !empty($ifm_product['gia_sanpham'])) echo $ifm_product['gia_sanpham'] ?>"><br>
                                <label for="">Số lượng sản phẩm</label><span><?php if(isset($err['err_quantity']) && !empty($err['err_quantity'])) echo $err['err_quantity'] ?></span><br>
                                <input type="number" name="quantity_pro" value="<?php if(isset($ifm_product['soluong_sanpham']) && !empty($ifm_product['soluong_sanpham'])) echo $ifm_product['soluong_sanpham'] ?>"><br>
                                <input type="hidden" name="id_pro" value="<?php if(isset($ifm_product['id_sanpham']) && !empty($ifm_product['id_sanpham'])) echo $ifm_product['id_sanpham'] ?>"><br>
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
                                <input type="submit" name="edit_pro" value="Thêm sản phẩm">
                            </form>
                        </div>
                    </div>    