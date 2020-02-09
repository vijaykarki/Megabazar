<?php
@session_start();
    include_once("./../includes/mainlink.php");
    $uname = $_SESSION['uname'];
    $productid=$_GET['id'];
    $crud = new CrudController();
    $sql="SELECT product_title,price FROM products WHERE product_id = '$productid'";
    $results= $crud->getDatas($sql);
    foreach($results as $result)
    {
        $product_title=$result['product_title'];
        $price=$result['price'];
    }
    $sqlquery="INSERT INTO watchlist (productid, product_title, price, uname) VALUES ('$productid', '$product_title', $price, '$uname');";
    $insert=$crud->execute($sqlquery);
    var_dump($insert);
        header('Location: ./../public/index.php');
?>