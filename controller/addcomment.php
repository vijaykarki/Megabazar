<?php
@session_start();
    include_once("./../includes/mainlink.php");
    $uname = $_SESSION['uname'];
    if(isset($_POST['comment']))
    {
    echo($uname);
    $productid=$_GET['id'];
    $comment = $_POST['productcomment'];
    $crud = new CrudController();
    $sql="SELECT product_title,price FROM products WHERE product_id = '$productid'";
    $results= $crud->getDatas($sql);
    foreach($results as $result)
    {
        $product_title=$result['product_title'];
        $price=$result['price'];
    }
    $sqlquery="INSERT INTO comment (productid, uname, comment) VALUES ('$productid','$uname','$comment');";
    $insert=$crud->execute($sqlquery);
}
header("Location: ./../pages/productdetail.php?id=$productid");


?>