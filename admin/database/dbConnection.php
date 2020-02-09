<?php
class DbConnection{
    private $host = "localhost";
    private $dbname = "megabzar";
    private $username = "root";
    private $password = "";
    protected $conn;

    public function __construct(){
        $this -> conn = new mysqli(
            $this -> host,
            $this -> username,
            $this -> password,
            $this -> dbname 
        );

    if(!$this -> conn){
        echo "Problem encountered";
    }
    return $this -> conn;
    }
}
?> 