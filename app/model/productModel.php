<?php 
    class ProductModel{
        public $data;
        public $db;
        public function __construct(){
            $this->db = new Database();
        }
        public function getAllPro(){
            $sql = "SELECT * FROM san_pham";
            return $this->db->getAll($sql);
        }
        public function InsertProduct($param){
            $sql = "INSERT INTO san_pham (ten_sanpham,gia_sanpham,soluong_sanpham,id_loaisp) VALUES (?,?,?,?)";
            return $this->db->query2($sql,$param);
        }
        public function DeleteProForIdPro($id_pro){
            $sql = "DELETE FROM san_pham WHERE id_sanpham = $id_pro";
            return $this->db->delete($sql);
        }
        public function getOneProForIDPro($id_pro){
            $sql = "SELECT * FROM san_pham WHERE id_sanpham = $id_pro";
            return $this->db->getOne($sql);
        }
        public function UpdateProForIdPro($id_pro,$param){
            $sql = "UPDATE san_pham SET ten_sanpham = ? , gia_sanpham = ?  , soluong_sanpham  = ? , id_loaisp = ?  WHERE id_sanpham = $id_pro";
            return $this->db->query($sql,$param);
        }
    }
?>