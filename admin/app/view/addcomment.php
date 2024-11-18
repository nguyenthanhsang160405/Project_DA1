<?php
    if(isset($data) && !empty($data)){
        if(isset($data['err']) && !empty($data['err'])){
            $err = $data['err'];
        }
        if(isset($data['product']) && !empty($data['product'])){
            $product = $data['product'];
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
                            <form action="index.php?page_adm=addcomment&&id_pro=<?php if(isset($product) && !empty($product)) echo $product['id_sanpham'] ?>" method="post" enctype="multipart/form-data">
                                <h3>THÊM BÌNH LUẬN</h3>
                                <?php 
                                    if(isset($notification) && !empty($notification)){
                                        echo '
                                        <span style="color:green">'.$notification.'</span>
                                        <br><br>';
                                    }
                                ?>
                                <label for="">Nội dung bình luận:</label><span><?php if(isset($err) && !empty($err)) echo $err ?></span><br>
                                <input type="text" name="content_cmt" value="<?php if(isset($ifm) && !empty($ifm)) echo $ifm ?>"><br>
                                <input type="hidden" name="id_pro" value="<?php if(isset($product) && !empty($product)) echo $product['id_sanpham'] ?>"><br>

                                <hr>
                                <br>
                                <input type="submit" name="add_comment" value="Thêm bình luận">
                                
                            </form>
                        </div>
                    </div>  