<?php 
    class CateBlogModel{
        public $db;
        public function __construct(){
            $this->db = new Database();
        }
        public function getAllCateBlog(){
            $sql = "SELECT * FROM loai_bai_viet";
            $this->db->getAll($sql);
        }
        public function InsertCateBlog($param){
            $sql = "INSERT INTO loai_bai_viet (ten_loaibv , mota_loaibv , id_nhanvien) VALUES (?,?,?)";
            return $this->db->query($sql,$param);
        }
        public function UpdateCateBlog($id_loaibv,$param){
            $sql = "UPDATE loai_bai_viet SET ten_loaibv = ? , mota_loai = ? WHERE id_loaibv = $id_loaibv";
            return $this->db->query($sql,$param);
        }
        

    }
?>