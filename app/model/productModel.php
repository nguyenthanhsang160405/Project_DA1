<?php 
    class ProductModel{
        public $db;
        public function __construct(){
            $this->db = new Database();
        }
        public function InsertProduct($param){
            $sql = "INSERT INTO san_pham (ten_sanpham,gia_sanpham,soluong_sanpham,id_loaisp) VALUES (?,?,?,?)";
            $this->db->query($sql,$param);
        }
    }
?>