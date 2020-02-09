<?php
    class DbConnection{
        private $host = 'localhost';
        private $dbname = 'megabzar';
        private $password = '';
        private $username = 'root';
        protected $conn;
       
        public function __construct()
        {
            if(!isset($this->conn))
            {
                $this->conn = new mysqli($this->host,$this->username,$this->password,$this->dbname);
                if(!$this->conn){
                    echo 'Cannot connect to database';
                    exit;
                }
            }
            return $this->conn;
        }
    }
    $db = new DbConnection();
?>