<?php 
    class ImageProModel{
        public $db;
        public function __construct(){
            $this->db = new Database();
        }
        public function getAll_Image(){
            $sql = "SELECT * FROM anh_san_pham";
            return $this->db->getAll($sql);
        }
        public function InsertImagePro($param){
            $sql = "INSERT INTO anh_san_pham (link_anh,id_sanpham) VALUES (?,?)";
            return $this->db->query($sql,$param);
        }
        public function getImageForIdPro($id_pro){
            $sql = "SELECT * FROM anh_san_pham WHERE id_sanpham = $id_pro";
            return $this->db->getAll($sql);
        }
        public function deleteImage($id_pro){
            $sql = "DELETE FROM anh_san_pham WHERE id_sanpham = $id_pro";
            return $this->db->delete($sql);
        }
    }
?>