<?php
include_once("./../includes/mainlink.php");
$curd = new CrudController();
$curd->delete('watchlist',$_GET['id']);
header('Location: ./../pages/watchlist.php');
?>
