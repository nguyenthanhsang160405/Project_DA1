<?php
    if(isset($data) && !empty($data)){
        if(isset($data['blog']) && !empty($data['blog'])){
            $blog = $data['blog'];
        }
        if(isset($data['user']) && !empty($data['user'])){
            $user = $data['user'];
        }
        if(isset($data['notification']) && !empty($data['notification'])){
            $tb = $data['notification'];
        }
    }
?>
<form action="index.php?page_adm=blog" method="post">
                        <div class="admin-showdata">
                        <h3>BÀI VIẾT</h3>
                            <div class="admin-function">
                                <a id="admin-function-add" href="index.php?page_adm=addblog"><i class="fa-solid fa-calendar-plus"></i>Thêm bài viết</a>
                                <button name="delete_blog_for_id_cateblog" type="submit" id="admin-function-delete"><i class="fa-solid fa-trash"></i>Xóa bài viết</button>
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
                                        <th>Tên Bài Viết</th>
                                        <th>Ảnh bài viết</th>
                                        <th>Nội dung bài viết</th>
                                        <th>Ngày tạo</th>
                                        <th>Tên người tạo</th>
                                        <th colspan="2">Tính năng</th>
                                    </tr>
                                    <?php
                                    if(isset($blog) && !empty($blog) && isset($user) && !empty($user)){
                                        $stt = 0;
                                        foreach($blog as $item){
                                            $stt = $stt + 1;
                                            echo '<tr>
                                                    <td><input class="get-id-product-delete"  name="checkid_pro[]" value="'.$item['id_baiviet'].'" type="checkbox"></th>
                                                    <td>'.$stt.'</td>
                                                    <td>'.$item['ten_baiviet'].'</td>
                                                    <td><img id="image_table" src="../public/img/'.$item['anh_baiviet'].'" alt=""></td>
                                                    <td>'.$item['noidung_baiviet'].'</td>
                                                    <td>'.$item['ngay_gio_tao'].'</td>
                                                    <td>'.$user[$stt-1]['ten_kh'].'</td>
                                                    <td><a href="index.php?page_adm=editblog&&id_edit_blog='.$item['id_baiviet'].'"><i class="fa-regular fa-pen-to-square"></i></a></td>
                                                    <td><a href="index.php?page_adm=blog&&id_delete_blog='.$item['id_baiviet'].'"><i class="fa-solid fa-trash"></i></a></td>
                                                </tr>';
                                        }
                                    }
                                    ?>
                                </table>
                            </div>
                        </div>
                    </form>