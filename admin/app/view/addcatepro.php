<?php 
    if(isset($data) && !empty($data)){
        if(isset($data['err']) && !empty($data['err'])){
            $err = $data['err'];
        }
        if(isset($data['ifm']) && !empty($data['ifm'])){
            $ifm = $data['ifm'];
        }
    }
?>
<div class="admin-showdata">
    <div class="admin-table-ifm">
        <form action="index.php?page_adm=addcatepro" method="post" enctype="multipart/form-data">
            <h3>THÊM DANH MỤC</h3>
            <br>
            <label for="name_cate">Tên loại sản phẩm:</label><span></span><?php if(isset($err['err_name']) && !empty($err['err_name'])) echo $err['err_name'] ?></span><br>
            <input type="text" name="name_cate" value=""><br>
            <label for="mota_cate">Mô tả loại sản phẩm</label>
            <input type="text" name="describe_cate" value="">
            <br>
            <br>
            <hr>
            <br>
            <input type="submit" name="add_cate" value="Thêm sản phẩm">
                                
        </form>
    </div>
</div>                    