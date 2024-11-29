<?php
    if(isset($data) && !empty($data)){
        if(isset($data['product']) && !empty($data['product'])){
            $product = $data['product'];
        }
        if(isset($data['cate']) && !empty($data['cate'])){
            $cate = $data['cate'];
        }
        // if(isset($data['notification']) && !empty($data['notification'])){
        //     $tb = $data['notification'];
        // }
        // if(isset($data['user']) && !empty($data['user'])){
        //     $user = $data['user'];
        // }
    }
?>
<form action="index.php?page_adm=allcomment" method="post">
                        <div class="admin-showdata">
                        <h3 style="text-transform: uppercase;">THỐNG KÊ HÀNG HÓA TỪNG LOẠI</h3>
                            <hr>
                            <br>
                            <br>
                            <div class="admin-table-ifm">
                                <table border="1">
                                    <tr>
                                        <th>Loại hàng</th>
                                        <th>Số lượng</th>
                                        <th>Giá cao nhất</th>
                                        <th>Giá thấp nhất</th>
                                        <th>Giá trung bình</th>
                                    </tr>
                                    <?php
                                    if(isset($product) && !empty($product) && isset($cate) && !empty($cate)){
                                        $stt = 0;
                                        foreach($cate as $item){
                                            $sl = 0;
                                            $gia_cao_nhat = 0;
                                            $gia_thap_nhat = 0;
                                            $tong_gia = 0;
                                            for($i = 0 ; $i < count($product) ; $i++){
                                                if($item['id_loai'] == $product[$i]['id_loaisp']){
                                                    $tong_gia += $product[$i]['gia_sanpham'];
                                                    $sl += 1;
                                                    if($product[$i]['gia_sanpham'] > $gia_cao_nhat){
                                                        $gia_cao_nhat = $product[$i]['gia_sanpham'];
                                                    }
                                                    if($sl == 1){
                                                        $gia_thap_nhat = $product[$i]['gia_sanpham'];
                                                    }
                                                    if($product[$i]['gia_sanpham'] < $gia_thap_nhat){
                                                        $gia_thap_nhat = $product[$i]['gia_sanpham'];
                                                    }
                                                }
                                            }
                                            echo '<tr>
                                                    <td>'.$item['ten_loai'].'</td>
                                                    <td>'.$sl.'</td>
                                                    <td>'.number_format($gia_cao_nhat).'đ</td>
                                                    <td>'.number_format($gia_thap_nhat).'đ</td>
                                                    <td>'.number_format($tong_gia/$sl).'đ</td>
                                                </tr>';
                                        }
                                    }
                                    ?>
                                </table>
                            </div>
                        </div>
                    </form>