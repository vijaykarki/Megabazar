<?php
session_start();
$user = $_SESSION['useremail'];
include_once("DbController.php");
$password = $_POST["newpassword"];
$repassword = $_POST["renewpassword"];
$hashPassword = password_hash($password, PASSWORD_DEFAULT);
$submit = $_POST["submit"];
if (isset($submit)) {
    if (empty($password) && empty($repassword)) {
        header('Location: ./../../Resource/View/pages/profile.php?empMessage=All field must be filled!');
    } 
    if ($password !== $repassword) {
            header('Location: ./../../Resource/View/pages/profile.php?empMessage=password not matched!');
    } else {
            $crud = new CrudOperation();
            $sql = "update users set password='$hashPassword' where uname='$user'";
                // var_dump($sql);
            $crud->execute($sql);
            header('Location: ./../../Resource/View/pages/profile.php?successMessage=Password Updated succesfully');
    }
}
