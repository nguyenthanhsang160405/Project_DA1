<?php
    if(isset($data) && !empty($data)){
        if(isset($data['product']) && !empty($data['product'])){
            $product = $data['product'];
        }
        if(isset($data['cate']) && !empty($data['cate'])){
            $cate = $data['cate'];
        }
        if(isset($data['product_in_month']) && !empty($data['product_in_month'])){
            $product_in_month = $data['product_in_month'];
        }
        if(isset($data['product_in_day']) && !empty($data['product_in_day'])){
            $product_in_day = $data['product_in_day'];
        }
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
                            <br>
                            <h3 style="text-transform: uppercase;">SẢN PHẨM BÁN CHẠY NHẤT TRONG NGÀY</h3>
                            <hr>
                            <br>
                            <br>
                            <div class="admin-table-ifm">
                                <table border="1">
                                    <tr>
                                        <th>Tên sản phẩm</th>
                                        <th>Ảnh sản phẩm</th>
                                        <th>Giá sản phẩm</th>
                                        <th>Số lượng sản phẩm đã bán</th>
                                    </tr>
                                    <?php
                                    if(isset($product_in_day) && !empty($product_in_day)){
                                            echo '<tr>
                                                    <td>'.$product_in_day[0]['product']['ten_sanpham'].'</td>
                                                    <td><img id="image_table" src="../public/img/'.$product_in_day[0]['product']['anh_sanpham'].'" alt=""></td>
                                                    <td>'.number_format($product_in_day[0]['product']['gia_sanpham']).'đ</td>
                                                    <td>'.$product_in_day[0]['soluong'].'</td>
                                                </tr>';
                                        }
                                    ?>
                                </table>
                            </div>
                            <br>
                            <h3 style="text-transform: uppercase;">SẢN PHẨM BÁN CHẠY NHẤT TRONG THÁNG</h3>
                            <hr>
                            <br>
                            <br>
                            <div class="admin-table-ifm">
                                <table border="1">
                                    <tr>
                                        <th>Tên sản phẩm</th>
                                        <th>Ảnh sản phẩm</th>
                                        <th>Giá sản phẩm</th>
                                        <th>Số lượng sản phẩm đã bán</th>
                                    </tr>
                                    <?php
                                    if(isset($product_in_month) && !empty($product_in_month)){
                                            echo '<tr>
                                                    <td>'.$product_in_month[0]['product']['ten_sanpham'].'</td>
                                                    <td><img id="image_table" src="../public/img/'.$product_in_month[0]['product']['anh_sanpham'].'" alt=""></td>
                                                    <td>'.number_format($product_in_month[0]['product']['gia_sanpham']).'đ</td>
                                                    <td>'.$product_in_month[0]['soluong'].'</td>
                                                </tr>';
                                        }
                                    ?>
                                </table>
                            </div>
                        </div>
                    </form>