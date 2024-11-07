<?php 
    class CategoryModel{
        public $db;
        public function __construct(){
            $this->db = new Database();
        }
        public function InsertCategoryPro($param){
            $sql = "INSERT INTO loai_sanpham (ten_loai,mota_loai) VALUES (?,?)";
            return $this->db->query($sql,$param);
        }
        public function getAllCate(){
            $sql = "SELECT * FROM loai_sanpham";
            return $this->db->getAll($sql);
        }
        public function DeleteCateForIdCate($id_loai){
            $sql = "DELETE FROM loai_sanpham WHERE id_loai = $id_loai";
            return $this->db->query($sql,[]);
        }
    }
?>