<?php 
    class CategoryModel{
        public $db;
        public function __construct(){
            $this->db = new Database();
        }
        public function InsertCategoryPro($param){
            $sql = "INSERT INTO loai_sanpham (ten_loai,mota_loai) VALUES (?,?)";
            $this->db->query($sql,$param);
        }
    }
?>