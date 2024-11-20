<?php 
    class UserModel{
        public $db;
        public function __construct(){
            $this->db = new Database();
        }
        public function InsertUser($param){
            $sql = "INSERT INTO khach_hang (ten_kh,email_kh,matkhau_kh,diachi_kh,sdt_kh,vai_tro) VALUES (?,?,?,?,?,?)";
            return $this->db->query($sql,$param);
        }
        public function getAllUser(){
            $sql = "SELECT * FROM khach_hang";
            return $this->db->getAll($sql);
        }
        public function DeleteUserForIdUser($id_user){
            $sql = "DELETE FROM khach_hang WHERE id_kh = $id_user";
            return $this->db->delete($sql);
        }
        public function getOneUser($id_user){
            $sql = "SELECT * FROM khach_hang WHERE id_kh = $id_user";
            return $this->db->getOne($sql);
        }
        public function UpdateUser($id_user,$param){
            $sql = "UPDATE khach_hang SET ten_kh = ? , matkhau_kh = ? , diachi_kh = ? , sdt_kh = ? , vai_tro = ? WHERE id_kh = $id_user";
            return $this->db->query($sql,$param);
        }
    }
?>