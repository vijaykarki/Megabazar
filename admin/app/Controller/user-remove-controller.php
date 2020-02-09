<?php
// session_start();
    require_once("DbController.php");
    class UserRemove{
        function listUser(){
            $crud = new CrudOperation();
            $query = "select full_name, uname from users where type='admin'";
            $results = $crud->getData($query);
            return $results;
        }
        function removeUser($table, $id){
            $crud = new CrudOperation();
            $crud -> deleteUsers($table, $id);
        }
    }

?>
