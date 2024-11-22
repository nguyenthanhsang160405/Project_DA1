<?php 
    class CartModel{
        public $db;
        public function __construct(){
            $this->db = new Database();
        }
        public function InsertCart($param){
            $sql = "INSERT INTO gio_hang (size_sanpham,soluong_sanpham,gia_sanpham,id_sanpham,id_kh,ten_sanpham,anh_sanpham) VALUES (?,?,?,?,?,?,?)";
            return $this->db->query($sql,$param);
        }
        public function Update($id_giohang,$param){
            $sql = "UPDATE gio_hang SET soluong_sanpham = ? WHERE $id_giohang = id_ctgiohang";
            $this->db->query($sql,$param);
        }
        public function getAllCartByIdUser($id_user){
            $sql = "SELECT * FROM gio_hang WHERE id_kh = $id_user";
            return $this->db->getAll($sql);
        }
        public function DeleteCartByIdCart($id_ctgiohang){
            $sql = "DELETE FROM gio_hang WHERE id_ctgiohang = $id_ctgiohang";
            return $this->db->delete($sql);
        }
    }
?>