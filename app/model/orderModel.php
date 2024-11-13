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
    }
?>