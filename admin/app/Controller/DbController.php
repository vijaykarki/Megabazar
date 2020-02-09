<?php
		require_once('C:\xampp\htdocs\megabazar\admin\database\dbConnection.php');
		// include("./../../database/dbConnection.php");
		class CrudOperation extends DbConnection{

			public function __construct() {
				parent::__construct();
			}
			function getData($query) {
				$results=$this->conn->query($query);
				if(!$results) {
					return false;
				}
				$rows=[];
				while ($row=$results->fetch_assoc()) {
					$rows[]=$row;
				}
				return $rows;
			}

			public function execute($query) {
				$result=$this->conn->query($query);

				if(!$result) {
					return false;
				}else {
					return $result;
				}

			}
			public function search($query) {
				$result=$this->conn->query($query);
				if(!$result) {
					return false;
				}else {
					return true;
				}

			}

			public function deleteUsers($table,$id) {
				$query="DELETE FROM users WHERE uname='$id'";
				$result=$this->conn->query($query);
				if(!$result) {
					echo "Cannot delete id $id from $table";
				} else {
					echo "Data deleted succesfully";
				}
			}

			public function deleteCategory($id) {
				$query="ALTER table category set Status=hide WHERE category_name='$id'";
				// $query = "alter table category set Status = hide where category_name ='$id'";
				$result=$this->conn->query($query);
				if(!$result) {
					return false;
				} else {
					return true;
				}
			}
		}
?>