<?php
session_start();
require_once("./../includes/mainlink.php");
// $submit = $_POST['login'];
if(isset($_POST['login'])) 
{
    if((empty($_POST['email_id'])) && (empty($_POST['password'])))
    {
        header('Location: ./../pages/login.php?errMessage=Email and Password must required!');
    }
    else
    {
        $crud = new CrudController();
        $email= $_POST["email_id"];
        $query = "select uname from users";
        $results = $crud -> getDatas($query);
        foreach($results as $result)
        {
            $dbemail[] = $result['uname'];
            var_dump($dbemail);
        }
        if(in_array($email, $dbemail) == true)
        {
            $sql = "select full_name, uname, password from users where uname= '$email'";
            $results = $crud -> getDatas($sql);
            foreach($results as $result)
            {
                $dbemail = $result['uname'];
                $dbpasswords = $result['password'];
                $dbName = $result['full_name'];
            }
            if(password_verify($_POST['password'], $result['password']))
            {
                $_SESSION['user'] = $dbName;
                $_SESSION['uname'] = $dbemail;
                header('Location: ./../public/index.php');
            }
            else
            {
                header('Location: ./../pages/login.php?errMessage= Password not correct');
            }
        }
        else
        {
            header('Location: ./../pages/login.php?errMessage=Email does not exist');
        }
    }
}
?>