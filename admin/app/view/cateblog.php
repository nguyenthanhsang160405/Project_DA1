<?php
    if(isset($data) && !empty($data)){
        if(isset($data['cate_blog']) && !empty($data['cate_blog'])){
            $cate_blog = $data['cate_blog'];
        }
        if(isset($data['notification']) && !empty($data['notification'])){
            $tb = $data['notification'];
        }
    }
?>
<form action="index.php?page_adm=cateblog" method="post">
                        <div class="admin-showdata">
                        <h3>DANH MỤC BÀI VIẾT</h3>
                            <div class="admin-function">
                                <a id="admin-function-add" href="index.php?page_adm=addcateblog"><i class="fa-solid fa-calendar-plus"></i>Thêm loại bài viết </a>
                                <button name="delete_cateblog_for_id_cateblog" type="submit" id="admin-function-delete"><i class="fa-solid fa-trash"></i>Xóa loại bài viết</button>
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
                                        <th>Tên Loại Bài Viết</th>
                                        <th>Mô tả</th>
                                        <th>Ngày tạo</th>
                                        <th colspan="2">Tính năng</th>
                                    </tr>
                                    <?php
                                    if(isset($cate_blog) && !empty($cate_blog)){
                                        $stt = 0;
                                        foreach($cate_blog as $item){
                                            $stt = $stt + 1;
                                            echo '<tr>
                                                    <td><input class="get-id-product-delete"  name="checkid_pro[]" value="'.$item['id_loaibv'].'" type="checkbox"></th>
                                                    <td>'.$stt.'</td>
                                                    <td>'.$item['ten_loaibv'].'</td>
                                                    <td>'.$item['mota_loaibv'].'</td>
                                                    <td>'.$item['ngay_gio_tao'].'</td>
                                                    <td><a href="index.php?page_adm=editcateblog&&id_edit_cateblog='.$item['id_loaibv'].'"><i class="fa-regular fa-pen-to-square"></i></a></td>
                                                    <td><a href="index.php?page_adm=cateblog&&id_delete_cateblog='.$item['id_loaibv'].'"><i class="fa-solid fa-trash"></i></a></td>
                                                </tr>';
                                        }
                                    }
                                    ?>
                                </table>
                            </div>
                        </div>
                    </form>