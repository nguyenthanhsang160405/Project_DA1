<?php

    if(isset($data) && !empty($data)){
        if(isset($data['cate']) && !empty($data['cate'])){
            $cate = $data['cate'];
        }
        if(isset($data['notification']) && !empty($data['notification'])){
            $tb = $data['notification'];
        }
    }
?>
<form action="index.php?page_adm=catepro" method="post">
                        <div class="admin-showdata">
                        <h3>DANH MỤC SẢN PHẨM</h3>
                            <div class="admin-function">
                                <a id="admin-function-add" href="index.php?page_adm=addcatepro"><i class="fa-solid fa-calendar-plus"></i>Thêm danh mục</a>
                                <button name="delete_cate_for_id_cate" type="submit" id="admin-function-delete"><i class="fa-solid fa-trash"></i>Xóa danh mục</button>
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
                                        <th>Tên</th>
                                        <th>Mô tả</th>
                                        <th colspan="2">Tính năng</th>
                                    </tr>
                                    <?php
                                    if(isset($cate) && !empty($cate)){
                                        $stt = 0;
                                        foreach($cate as $item){
                                            $stt = $stt + 1;
                                            echo '<tr>
                                                    <td><input class="get-id-product-delete"  name="checkid_pro[]" value="'.$item['id_loai'].'" type="checkbox"></th>
                                                    <td>'.$stt.'</td>
                                                    <td>'.$item['ten_loai'].'</td>
                                                    <td>'.$item['mota_loai'].'</td>
                                                    <td><a href="index.php?page_adm=editcatepro&&id_edit_cate='.$item['id_loai'].'"><i class="fa-regular fa-pen-to-square"></i></a></td>
                                                    <td><a href="index.php?page_adm=catepro&&id_delete_cate='.$item['id_loai'].'"><i class="fa-solid fa-trash"></i></a></td>
                                                </tr>';
                                        }
                                    }
                                    ?>
                                </table>
                            </div>
                        </div>
                    </form>