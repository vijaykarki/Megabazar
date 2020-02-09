<?php
    class CrudController extends DbConnection
    {
        public function __construct()
        {
            parent::__construct();
        }

        public function getDatas($query)
        {
            $result = $this->conn->query($query);
            if($result==false)
            {
                return false;
            }
            $datas = [];
            while($data = $result ->fetch_assoc())
            {
                $datas[]= $data;
            }
            return $datas;
        }
        public function execute($query)
        {
            $result=$this->conn->query($query);
            $last_id = mysqli_insert_id($this->conn);
            if(!$result)
            {
                return false;
            }
            else 
            {
                return $last_id;
            }
        }

        public function delete($table,$id) 
        {
            $query="DELETE FROM $table WHERE id=$id";

            $result=$this->conn->query($query);

            if(!$result) 
            {
                echo "Cannot delete id $id from $table";
                return false;
            } 
            else 
            {
                echo "Data deleted succesfully";
            }
        }
        public function productdelete($table,$id) 
        {
            $query="DELETE FROM $table WHERE product_id=$id";

            $result=$this->conn->query($query);

            if(!$result) 
            {
                echo "Cannot delete id $id from $table";
                return false;
            } 
            else 
            {
                echo "Data deleted succesfully";
            }
        }
    }
?>