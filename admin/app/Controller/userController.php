<?php
include_once("DbController.php");

$fullname = $_POST["fullname"];
$email = $_POST["email"];
$position = $_POST["position"];
$submit = $_POST["submit"];
$hashPassword = password_hash($_POST["password"], PASSWORD_DEFAULT);

// for add user
if (isset($submit)) {
    if (empty($fullname) && empty($email) && empty($password) && empty($position)) {
        header('Location: ./../../Resource/View/pages/adduser.php?empMessage=All field must be filled!');
    } else {
        $crud = new CrudOperation();
        $query = "select * from users";
        $results = $crud->getData($query);
        foreach ($results as $result) {
            $dbemail[] = $result['uname'];
        }
        if (in_array($email, $dbemail) == true) {
            header('Location: ./../../Resource/View/pages/adduser.php?empMessage=Oops! It looks like email already exist');
        } else {
            $sql = "INSERT INTO users(full_name, uname, password, type) VALUES('$fullname','$email','$hashPassword','$position')";
            // var_dump($sql);
            $crud->execute($sql);
            header('Location: ./../../Resource/View/pages/adduser.php?successMessage=User added succesfully');
        }
    }
}
