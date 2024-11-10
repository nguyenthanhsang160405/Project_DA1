<?php 
    class ImageProModel{
        public $db;
        public function __construct(){
            $this->db = new Database();
        }
        public function InsertImagePro($param){
            $sql = "INSERT INTO anh_san_pham (link_anh,id_sanpham) VALUES (?,?)";
            return $this->db->query($sql,$param);
        }
    }
?>