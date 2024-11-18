<?php 
    class CommentModel{
        public $db;
        public function __construct(){
            $this->db = new Database();
        }
        public function getAllCommentForIdPro($id_sanpham){
            $sql = "SELECT * FROM binh_luan WHERE id_sanpham = $id_sanpham";
            return $this->db->getAll($sql);
        }
        public function DeleteCmtForIdCmt($id_binhluan){
            $sql = "DELETE FROM binh_luan WHERE id_binhluan = $id_binhluan";
            return $this->db->delete($sql);
        }
        public function InSertComment($param){
            $sql = "INSERT INTO binh_luan (noidung_binhluan,id_kh,id_sanpham) VALUES (?,?,?)";
            return $this->db->query($sql,$param);
        }
        public function getOneCmt($id_binhluan){
            $sql = "SELECT * FROM binh_luan WHERE id_binhluan = $id_binhluan";
            return $this->db->getOne($sql);
        }
        public function UpdateCmt($id_binhluan,$param){
            $sql = "UPDATE binh_luan SET noidung_binhluan = ? WHERE id_binhluan = $id_binhluan";
            return $this->db->query($sql,$param);
        }
        public function getAllCmt(){
            $sql = "SELECT * FROM binh_luan";
            return $this->db->getAll($sql);
        }

    }
?>