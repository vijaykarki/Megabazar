<?php
    include_once("./../includes/mainlink.php");
    $curd = new CrudController();
    $pid=$_GET['id'];
    $sql="update products set p_status='sold' where product_id = '$pid';";
    $curd->execute($sql);
    header('Location: ./../pages/myad.php');

?>