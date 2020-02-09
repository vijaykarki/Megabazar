<?php
    session_start();
    require_once("DbController.php");
    // $submit = $_POST['login'];
    if(isset($_POST['login'])) {
        if((empty($_POST['username'])) && (empty($_POST['password']))){
            header('Location: ./../Resource/View/pages/login.php?empMessage=Email and Password must required!');
        }else{
            $crud = new CrudOperation();
            $email= $_POST["username"];
            $query = "select uname from users";
            $results = $crud -> getData($query);
            foreach($results as $result){
                $dbemail[] = $result['uname'];
                // $dbpassword[] = $result['password'];
            }
            if(in_array($email, $dbemail) == true){
                $sql = "select full_name, uname, password from users where uname= '$email' and type='admin'";
                $results = $crud -> getData($sql);
                foreach($results as $result){
                    $dbemail = $result['uname'];
                    $dbpasswords = $result['password'];
                    $dbName = $result['full_name'];
                }
                if(password_verify($_POST['password'], $result['password'])){
                    $_SESSION['user'] = $dbName;
                    $_SESSION['useremail'] = $dbemail;
                    header('Location: ./../../Resource/View/layout/main.php');
                }else{
                    header('Location: ./../../Resource/View/pages/login.php?errMessage= Password not correct');
                }
            }else{
                header('Location: ./../../Resource/View/pages/login.php?errMessage=Email does not exist');
            }
        }
    }
?>