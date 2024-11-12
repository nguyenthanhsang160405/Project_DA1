
<?php
    if(isset($data) && !empty($data)){
        if(isset($data['product']) && !empty($data['product'])){
            $product = $data['product'];
        }
        if(isset($data['notification']) && !empty($data['notification'])){
            $tb = $data['notification'];
        }
        if(isset($data['image']) && !empty($data['image'])){
            $image = $data['image'];
            print_r($image);
        }
    }
?>
<form action="index.php?page_adm=product" method="post">
                        <div class="admin-showdata">
                        <h3>DANH MỤC SẢN PHẨM</h3>
                            <div class="admin-function">
                                <a id="admin-function-add" href="index.php?page_adm=addpro"><i class="fa-solid fa-calendar-plus"></i>Thêm sản phẩm</a>
                                <button type="submit" name="delete_pro_for_id_pro" id="admin-function-delete"><i class="fa-solid fa-trash"></i>Xóa sản phẩm</button>
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
                                        <th>Hình ảnh</th>
                                        <th>Tên</th>
                                        <th>Số lượng</th>
                                        <th>Giá</th>
                                        <th colspan="2">Tính năng</th>
                                    </tr>
                                    <?php
                                    if(isset($product) && !empty($product)){
                                        $stt = 0;
                                        foreach($product as $item){
                                            $image_pro = '';
                                            for($i = 0 ; $i < count($image) ; $i++){
                                                if($image[$i]['id_sanpham'] == $item['id_sanpham']){
                                                    $image_pro = $image[$i]['link_anh'];
                                                }
                                            }
                                            $stt = $stt + 1;
                                            echo '<tr>
                                                    <td><input class="get-id-product-delete"  name="checkid_pro[]" value="'.$item['id_sanpham'].'" type="checkbox"></th>
                                                    <td>'.$stt.'</td>
                                                    <td><img id="image_table" src="../public/img/'.$image_pro.'" alt=""></td>
                                                    <td>'.$item['ten_sanpham'].'</td>
                                                    <td>'.$item['soluong_sanpham'].'</td>
                                                    <td>'.number_format($item['gia_sanpham']).'đ</td>
                                                    <td><a href=""><i class="fa-solid fa-trash"></i></a></i></td>
                                                    <td><a href=""><i class="fa-regular fa-pen-to-square"></i></a></td>
                                                </tr>';
                                        }
                                    }
                                    ?>
                                </table>
                            </div>
                        </div>
                    </form>