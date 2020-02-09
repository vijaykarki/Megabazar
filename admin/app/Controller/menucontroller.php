<?php
    @include_once("./DbController.php");
    class Report{
        function returnUserCount(){
            $crud = new CrudOperation();
            $query = "select count(*) from users where type='normal'";
            $results = $crud -> getDatas($query);
            return $results;
        }
    }

?>