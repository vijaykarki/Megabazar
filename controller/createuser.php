<?php
include_once("./../includes/mainlink.php");
if ($_SERVER['REQUEST_METHOD'] == 'POST'&& isset($_POST['register']))
    {
        $full_name=$_POST["fullname"];
        $uname=$_POST["uname"];
        // $password=$_POST["password"];
        $hashPassword = password_hash($_POST["password"], PASSWORD_DEFAULT);
        $crud = new CrudController();
        $sqlquery="INSERT INTO users (full_name, uname, password) VALUES ('$full_name','$uname', '$hashPassword');";
        $insert=$crud->execute($sqlquery);
        header("Location: ./../pages/login.php");
    }
?>