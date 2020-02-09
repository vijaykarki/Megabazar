<?php require_once("./../../../app/Controller/DbController.php");

	$query="update products set p_status='available' where uname='" . $_GET["eid"] . "'";
    $crud = new CrudOperation();
    $crud -> execute($query);
    header("location:productVerify.php");
?>