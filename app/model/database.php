<?php 
    class Database{
        private $severname = 'localhost';
        private $dbname = 'duan_1';
        private $username = 'root';
        private $password = '';
        private $conn;
        public function __construct(){
            $this->connect();
        }
        public function connect(){
            try{
                $this->conn = new PDO("mysql:host=$this->severname;dbname=$this->dbname;charset=utf8",$this->username,$this->password);
                $this->conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                // echo "Kết nối thành công";
            }catch(PDOException $e){
                echo "Lỗi " . $e->getMessage();
            }
        }
        public function getAll($sql){
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        public function getOne($sql){
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
        public function query($sql,$param){
            try{
                $stmt = $this->conn->prepare($sql);
                $stmt->execute($param);
                return true;
            }catch(PDOException $e){
                echo "Lỗi khi insert SQL =>" . $e->getMessage();
                return false;
            }
        }
        public function query2($sql,$param){
            try{
                $stmt = $this->conn->prepare($sql);
                $stmt->execute($param);
                return [true,$this->conn->lastInsertId()];
            }catch(PDOException $e){
                echo "Lỗi khi insert SQL =>" . $e->getMessage();
                return [false];
            }
        }
        public function delete($sql){
            try{
                $stmt = $this->conn->prepare($sql);
                $stmt->execute();
                return true;
            }catch(PDOException $e){
                echo "Lỗi khi delete =>" . $e->getMessage();
                return false;
            }
        }
        public function InsertGetIdInsert($sql,$param){
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($param);
            return $this->conn->lastInsertId();
        }
        public function getOne2($sql,$param){
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($param);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
    }
?>