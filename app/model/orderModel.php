<?php 
    class OderModel{
        public $db;
        public function __construct(){
            $this->db = new Database();
        }
        public function getAllOrder(){
            $sql = "SELECT * FROM don_hang";
            return $this->db->getAll($sql);
        }
        public function getOrderPending(){
            $sql = "SELECT * FROM don_hang WHERE ten_nhanvien IS NULL && id_nhanvien IS NULL";
            return $this->db->getAll($sql);
        }
        public function InsertNvInOrder($id_donhang,$param){
            $sql = "UPDATE don_hang SET ten_nhanvien = ? , id_nhanvien = ?  WHERE id_donhang = $id_donhang";
            return $this->db->query($sql,$param);
        }
        public function DeletePendingOrder($id_donhang){
            $sql = "DELETE FROM don_hang WHERE id_donhang = $id_donhang";
            return $this->db->delete($sql);
        }
        public function getAllAcceptedOrder(){
            $sql = "SELECT * FROM don_hang WHERE ten_nhanvien IS NOT NULL && id_nhanvien IS NOT NULL";
            return $this->db->getAll($sql);
        }
        public function getOneOrderByIdOrder($id_donhang){
            $sql = "SELECT * FROM don_hang WHERE id_donhang = $id_donhang";
            return $this->db->getOne($sql);
        }
        public function InsertOrderUser($param){
            $sql = "INSERT INTO don_hang (ten_nguoinhan,sdt_nguoinhan,diachi_nguoinhan,email_nguoinhan,gia_tong_don_hang,id_kh,id_giamgia) VALUES (?,?,?,?,?,?,?)";
            return $this->db->InsertGetIdInsert($sql,$param);
        }
        public function getAllOrderByIdKh($id_kh){
            $sql = "SELECT * FROM don_hang WHERE id_kh = $id_kh";
            return $this->db->getAll($sql);
        }
    }
?>