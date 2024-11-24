<?php
    if(isset($data) && !empty($data)){

        if($data['arr_detaiorder'] && !empty($data['arr_detaiorder'])){
            $arr_detaiorder = $data['arr_detaiorder'];
        }
        if($data['nhanvien'] && !empty($data['nhanvien'])){
            $nhanvien = $data['nhanvien'];
        }
        if($data['voucher'] && !empty($data['voucher'])){
            $voucher = $data['voucher'];
        }
    }    
?>
<form action="index.php?page_adm=comment&&id_comment_pro=<?php if(isset($product) && !empty($product)) echo $product['id_sanpham']?>" method="post">
                        <div class="admin-showdata">
                        <h3 style="text-transform: uppercase;">CHI TIẾT ĐƠN HÀNG <?php if(isset($product) && !empty($product)) echo $product['ten_sanpham'] ?></h3>
                            <div class="admin-function">
                            </div>
                            <span id="ht-tb-da-thanh-cong"><?php  if(isset($tb) && !empty($tb)) echo $tb?></span>
                            <br>
                            <hr>
                            <br>
                            <br>
                            <div class="admin-table-ifm">

                                <h3 style="">Thông tin chi tiết các sản phẩm</h3>
                                <table border="1">
                                    <tr>
                                        <th>Tên sản phẩm</th>
                                        <th>Ảnh sản phẩm</th>
                                        <th>Giá sản phẩm</th>
                                        <th>Số lượng</th>
                                        <th>Size</th>
                                    </tr>
                                    <?php
                                    if(isset($arr_detaiorder) && !empty($arr_detaiorder)){
                                        $stt = 0;
                                        foreach($arr_detaiorder as $item){
                                            echo '<tr>
                                                    <td>'.$item['ten_sanpham'].'</td>
                                                    <td><img style="width: 20px;" src="../public/img/'.$item['anh_sanpham'].'" alt=""></td>
                                                    <td>'.number_format($item['gia_sanpham']).'đ</td>
                                                    <td>'.$item['soluong_sanpham'].'</td>
                                                    <td>'.$item['size_sanpham'].'</td>
                                                </tr>';
                                        }
                                    }
                                    ?>
                                </table>
                                <br>
                                <h3>Nhân viên</h3>
                            <?php 
                                if(isset($nhanvien) && !empty($nhanvien)){
                                    echo '<div style="display:flex" ><h4>Mã nhân viên : </h4><span>#'.$nhanvien['id_kh'].'</span></div>';
                                    echo '<div style="display:flex"><h4>Tên nhân viên : </h4><span>'.$nhanvien['ten_kh'].'</span></div>';
                                }else{
                                    echo '<p>Không</p>';
                                }
                            ?>
                            <br>
                            <h3>Mã giảm giá</h3>
                            <?php 
                                if(isset($voucher) && !empty($voucher)){
                                    echo '<div style="display:flex"><h4>Mã giảm : </h4><p>#'.$voucher['code_giamgia'].'</p></div>';
                                    echo '<div style="display:flex"><h4>Số tiền giảm : </h4><p>'.number_format($voucher['so_tiengiam']).'đ</p></div>';
                                }else{
                                    echo '<p>Không</p>';
                                }
                            ?>
                            </div>
                        </div>
                    </form>