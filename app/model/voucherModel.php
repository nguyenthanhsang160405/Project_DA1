<?php 
    class VoucherModel{
        public $db;
        public function __construct(){
            $this->db= new Database();
        }
        public function getAllVoucher(){
            $sql = "SELECT * FROM ma_giam_gia";
            return $this->db->getAll($sql);
        }
        public function InsertVoucher($param){
            $sql = "INSERT INTO ma_giam_gia (code_giamgia,so_tiengiam) VALUES (?,?)";
            return $this->db->query($sql,$param);
        }
        public function deleteVoucherforIdVoucher($id_voucher){
            $sql = "DELETE FROM ma_giam_gia WHERE id_giamgia = $id_voucher";
            $this->db->delete($sql);
        }
        public function getOneVoucher($id_voucher){
            $sql = "SELECT * FROM ma_giam_gia WHERE id_giamgia = $id_voucher";
            return $this->db->getOne($sql);
        }
        public function UpdateVoucher($id_voucher,$param){
            $sql = "UPDATE ma_giam_gia SET code_giamgia = ? , so_tiengiam = ? WHERE id_giamgia = $id_voucher";
            return $this->db->query($sql,$param);
            
        }
    }
?>