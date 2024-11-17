<?php
    if(isset($data) && !empty($data)){
        if(isset($data['product']) && !empty($data['product'])){
            $product = $data['product'];
        }
        if(isset($data['comment']) && !empty($data['comment'])){
            $comment = $data['comment'];
        }
        if(isset($data['notification']) && !empty($data['notification'])){
            $tb = $data['notification'];
        }
        if(isset($data['user']) && !empty($data['user'])){
            $user = $data['user'];
        }
    }
?>
<form action="index.php?page_adm=allcomment" method="post">
                        <div class="admin-showdata">
                        <h3 style="text-transform: uppercase;">TẤT CẢ BÌNH LUẬN</h3>
                            <div class="admin-function">
                                <button name="delete_comment_for_id_comment" type="submit" id="admin-function-delete"><i class="fa-solid fa-trash"></i>Xóa bình luận</button>
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
                                        <th>Nội dung</th>
                                        <th>Tạo lúc</th>
                                        <th>Người bình luận</th>
                                        <th>Tên sản phẩm</th>
                                        <th colspan="2">Tính năng</th>
                                    </tr>
                                    <?php
                                    if(isset($comment) && !empty($comment) && isset($user) && !empty($user)){
                                        $stt = 0;
                                        foreach($comment as $item){
                                            $stt = $stt + 1;
                                            echo '<tr>
                                                    <td><input class="get-id-product-delete"  name="checkid_pro[]" value="'.$item['id_binhluan'].'" type="checkbox"></th>
                                                    <td>'.$stt.'</td>
                                                    <td>'.$item['noidung_binhluan'].'</td>
                                                    <td>'.$item['ngay_gio_tao'].'</td>
                                                    <td>'.$user[$stt-1]['ten_kh'].'</td>
                                                    <td>'.$product[$stt-1]['ten_sanpham'].'</td>
                                                    <td><a href="index.php?page_adm=editcomment&&id_edit_comment='.$item['id_binhluan'].'"><i class="fa-regular fa-pen-to-square"></i></a></td>
                                                    <td><a href="index.php?page_adm=allcomment&&id_delete_comment='.$item['id_binhluan'].'&&id_comment_pro='.$item['id_sanpham'].'"><i class="fa-solid fa-trash"></i></a></td>
                                                </tr>';
                                        }
                                    }
                                    ?>
                                </table>
                            </div>
                        </div>
                    </form>