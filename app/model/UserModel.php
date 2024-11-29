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
        public function InsertUser_User($param){
            $sql = "INSERT INTO khach_hang (ten_kh,email_kh,matkhau_kh,vai_tro) VALUES (?,?,?,?)";
            return $this->db->query($sql,$param);
        }
        public function getUserByEmailUser($param){
            $sql = "SELECT * FROM khach_hang WHERE email_kh = ?";
            return $this->db->getOne2($sql,$param);
        }
        public function UpdateIfmUser($id_kh,$param){
            $sql = "UPDATE khach_hang SET ten_kh = ? , sdt_kh = ? , diachi_kh = ? WHERE id_kh = $id_kh";
            return $this->db->query($sql,$param);
        }
        public function UpdatePassUser($id_kh,$param){
            $sql = "UPDATE khach_hang SET matkhau_kh = ? WHERE id_kh = $id_kh ";
            return $this->db->query($sql,$param);
        }
        public function getAllAdmin(){
            $sql = "SELECT * FROM khach_hang WHERE vai_tro = 2";
            return $this->db->getAll($sql);
        }
        public function InsertOTP_Time_User($param){
            $sql = "UPDATE khach_hang SET otp_code = ? , time_otp = ? WHERE email_kh = ?";
            return $this->db->query($sql,$param);
        }

    }
?>