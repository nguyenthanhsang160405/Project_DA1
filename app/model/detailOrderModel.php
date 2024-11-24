<?php 
    class DetailOrderModel{
        public $db;
        public function __construct(){
            $this->db = new Database();
        }
        public function getAllDetailOrderByIdOrder($id_donhang){
            $sql = "SELECT * FROM chi_tiet_don_hang WHERE id_donhang = $id_donhang";
            return $this->db->getAll($sql);
        }
        public function InsertOrderDetail($param){
            $sql = "INSERT INTO chi_tiet_don_hang (ten_sanpham,gia_sanpham,soluong_sanpham,size_sanpham,id_sanpham,id_donhang,anh_sanpham) VALUES (?,?,?,?,?,?,?)";
            return $this->db->query($sql,$param);
        }
        public function getAllDetailOrderByIdPro($id_sanpham){
            $sql = "SELECT * FROM chi_tiet_don_hang WHERE id_sanpham = $id_sanpham";
            return $this->db->getAll($sql);
        }
        
    }
?>