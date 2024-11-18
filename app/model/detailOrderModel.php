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
    }
?>