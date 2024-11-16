<?php

    if(isset($data) && !empty($data)){
        if(isset($data['image']) && !empty($data['image'])){
            $image = $data['image'];
        }
        if(isset($data['notification']) && !empty($data['notification'])){
            $tb = $data['notification'];
        }
    }
?>
<form action="index.php?page_adm=image&&id_pro_image=<?php if(isset($image) && !empty($image)) echo $image[0]['id_sanpham']?>" method="post">
                        <div class="admin-showdata">
                        <h3>ẢNH CỦA SẢN PHẨM </h3>
                            <div class="admin-function">
                                <a id="admin-function-add" href="index.php?page_adm=addimage&&id_pro_image=<?php if(isset($image) && !empty($image)) echo $image[0]['id_sanpham']?>"><i class="fa-solid fa-calendar-plus"></i>Thêm ảnh sản phẩm</a>
                                <button name="delete_image_for_id_image" type="submit" id="admin-function-delete"><i class="fa-solid fa-trash"></i>Xóa ảnh sản phẩm</button>
                            </div>
                            <br>
                            <span id="ht-tb-da-thanh-cong"><?php  if(isset($tb) && !empty($tb)) echo $tb?></span>
                            <br>
                            <hr>
                            <br>
                            <br>
                            <div class="admin-table-ifm">
                                <table border="1">
                                    <tr>
                                        <th><input onclick="checkAll()" id="box-checkall-delete-pro" type="checkbox"></th>
                                        <th>STT</th>
                                        <th>Ảnh</th>
                                        <th colspan="2">Tính năng</th>
                                    </tr>
                                    <?php
                                    if(isset($image) && !empty($image)){
                                        $stt = 0;
                                        foreach($image as $item){
                                            $stt = $stt + 1;
                                            echo '<tr>
                                                    <td><input class="get-id-product-delete"  name="checkid_pro[]" value="'.$item['id_anh'].'" type="checkbox"></th>
                                                    <td>'.$stt.'</td>
                                                    <td><img id="image_table" src="../public/img/'.$item['link_anh'].'" alt=""></td>
                                                    <td><a href="index.php?page_adm=editimage&&id_edit_image='.$item['id_anh'].'"><i class="fa-regular fa-pen-to-square"></i></a></td>
                                                    <td><a href="index.php?page_adm=image&&id_delete_image='.$item['id_anh'].'&&id_pro_image='.$item['id_sanpham'].'"><i class="fa-solid fa-trash"></i></a></td>
                                                </tr>';
                                        }
                                    }
                                    ?>
                                </table>
                            </div>
                        </div>
                    </form>