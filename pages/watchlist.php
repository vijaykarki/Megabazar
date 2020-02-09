<!DOCTYPE html>
<html lang="en">
<head>
    <?php include_once("./../includes/mainlink.php");?>
    <meta charset="UTF-8">
    <title>Watch Lists</title>
</head>
<body>
<section class="allcontent">
    <?php  
    include_once("./../includes/header.php");
    ?>
     <section class="form-content">
        <div class="postad-form">
            <h1 class="cont-head">Watch Lists</h1>
            <div class="watchlistflex">
                <div class="headinglist">
                <ul>
                <div class="delook">
                     <li>ID</li>
                </div>
                <div class="delook">
                   <li> Product ID</li>
                </div>
                
                <div class="delook">
                    <li>Product Title</li></div>
                <div class="delook">
                    <li>Price</li></div>
                
                <div class="delook">
                <li>Action</li></div>
                </ul>
                </div>
                    <?php
                    $fetch = new Fetch();
                    $uname=$_SESSION['uname'];
                    $results=$fetch->watchListFetch($uname);
                    foreach($results as $result)
                    {
                    ?>
                    <div class="contentwatchlist">
                    <ul>
                    <div class="delook">
                        <li><?php echo($result['id']);?> </li>
                    </div>
                    <div class="delook">
                        <li><?php echo($result['productid']);?> </li>
                    </div>
                    <div class="delook">
                        <li><?php echo($result['product_title']);?> </li>
                    </div>
                    <div>
                        <li><?php echo($result['price']);?> </li>
                    </div>
                    <div class="delook">
                        <li>
                            <form action="./../controller/deletwatchlist.php?id=<?php echo($result['id']);?>" method="post">
                            <button class="dltbutton"name="id">Delete</button>
                            </form>
                        </li>
                    </div>
                    </ul>
                    </div>
                    <?php
                    }
                    ?>
            </div>
    </section>
    <div>
    <?php
            include_once("./../includes/footer.php");
        ?>
    </div>
</body>
</html>