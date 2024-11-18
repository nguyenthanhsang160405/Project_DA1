<?php
    if(isset($data) && !empty($data)){
        if(isset($data['user']) && !empty($data['user'])){
            $user = $data['user'];
        }
        if(isset($data['notification']) && !empty($data['notification'])){
            $tb = $data['notification'];
        }
    }
?>
<form action="index.php?page_adm=user" method="post">
                        <div class="admin-showdata">
                        <h3>NGƯỜI DÙNG</h3>
                            <div class="admin-function">
                                <a id="admin-function-add" href="index.php?page_adm=adduser"><i class="fa-solid fa-calendar-plus"></i>Thêm người dùng</a>
                                <button name="delete_user_for_id_user" type="submit" id="admin-function-delete"><i class="fa-solid fa-trash"></i>Xóa người dùng</button>
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
                                        <th>Email</th>
                                        <th>Mật khẩu</th>
                                        <th>Địa chỉ</th>
                                        <th>Số điện thoại</th>
                                        <th colspan="2">Tính năng</th>
                                    </tr>
                                    <?php
                                    if(isset($user) && !empty($user)){
                                        $stt = 0;
                                        foreach($user as $item){
                                            $stt = $stt + 1;
                                            echo '<tr>
                                                    <td><input class="get-id-product-delete"  name="checkid_pro[]" value="'.$item['id_kh'].'" type="checkbox"></th>
                                                    <td>'.$stt.'</td>
                                                    <td>'.$item['ten_kh'].'</td>
                                                    <td>'.$item['email_kh'].'</td>
                                                    <td>'.$item['matkhau_kh'].'</td>
                                                    <td>'.$item['diachi_kh'].'</td>
                                                    <td>'.$item['sdt_kh'].'</td>
                                                    <td><a href="index.php?page_adm=edituser&&id_edit_user='.$item['id_kh'].'"><i class="fa-regular fa-pen-to-square"></i></a></td>
                                                    <td><a href="index.php?page_adm=user&&id_delete_user='.$item['id_kh'].'"><i class="fa-solid fa-trash"></i></a></td>
                                                </tr>';
                                        }
                                    }
                                    ?>
                                </table>
                            </div>
                        </div>
                    </form>