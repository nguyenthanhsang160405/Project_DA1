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
    }
?>