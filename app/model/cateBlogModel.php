<?php 
    class CateBlogModel{
        public $db;
        public function __construct(){
            $this->db = new Database();
        }
        public function getAllCateBlog(){
            $sql = "SELECT * FROM loai_bai_viet";
            return $this->db->getAll($sql);
        }
        public function InsertCateBlog($param){
            $sql = "INSERT INTO loai_bai_viet (ten_loaibv , mota_loaibv , id_nhanvien) VALUES (?,?,?)";
            return $this->db->query($sql,$param);
        }
        public function UpdateCateBlog($id_loaibv,$param){
            $sql = "UPDATE loai_bai_viet SET ten_loaibv = ? , mota_loaibv = ? WHERE id_loaibv = $id_loaibv";
            return $this->db->query($sql,$param);
        }
        public function DeleteOneCateBlog($id_cateblog){
            $sql = "DELETE FROM loai_bai_viet WHERE id_loaibv = $id_cateblog";
            return $this->db->delete($sql);
        }
        public function getOneCateBlog($id_cateblog){
            $sql = "SELECT * FROM loai_bai_viet WHERE id_loaibv = $id_cateblog";
            return $this->db->getOne($sql);
        }
        

    }
?>