<?php
include_once("./../includes/mainlink.php");
$curd = new CrudController();
$curd->productdelete('products',$_GET['id']);
header('Location: ./../pages/myad.php');
?>