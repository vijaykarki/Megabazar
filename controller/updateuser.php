<?php
include_once("./../includes/mainlink.php");
if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $email=$_SESSION['uname'];
        $full_name=$_POST["fullname"];
        $uname=$_POST["uname"];
        $phone=$_POST["phone"];
        $address=$_POST["address"];
        $crud = new CrudController();
        if(empty($_POST["uname"]))
        {
            $uname=$email;
        }
        $sqlquery="update users set full_name ='$full_name', uname='$uname',phone='$phone',address='$address' where uname='$email';";
        $crud->execute($sqlquery);
        if($uname == $email)
        {
            header('Location: ./../public/index.php');
        }
        else
        {
            header('Location: ./../controller/logout.php');
        }
    }
?>