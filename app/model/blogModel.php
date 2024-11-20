<?php 
    class BlogModel{
        public $db;
        public function __construct(){
            $this->db = new Database();
        }
        public function getAllBlog(){
            $sql = "SELECT * FROM bai_viet";
            return $this->db->getAll($sql);
        }
        public function getAllBlogForIdCateBlog($id_cateblog,){
            $sql = "SELECT * FROM bai_viet WHERE id_loaibv = $id_cateblog";
            return $this->db->getAll($sql);
        }
        public function InSertBlog($param){
            $sql = "INSERT INTO bai_viet (ten_baiviet , noidung_baiviet , id_nhanvien , id_loaibv , anh_baiviet ) VALUES (?,?,?,?,?)";
            return $this->db->query($sql,$param);
        }
        public function getOneBlogByIdBlog($id_blog){
            $sql = "SELECT * FROM bai_viet WHERE id_baiviet = $id_blog ";
            return $this->db->getOne($sql);
        }
        public function DeleteBlogByIdBlog($id_blog){
            $sql = "DELETE FROM bai_viet WHERE id_baiviet = $id_blog ";
            return $this->db->delete($sql);
        }
        public function UpdateBlog($id_blog,$param){
            $sql = "UPDATE bai_viet SET ten_baiviet = ? , noidung_baiviet = ? , id_loaibv = ? , anh_baiviet = ? WHERE id_baiviet = $id_blog";
            return $this->db->query($sql,$param);
        }

    }
?>