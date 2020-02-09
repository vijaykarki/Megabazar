<!DOCTYPE html>
<html lang="en">
<head>
    <?php include_once("./../includes/mainlink.php");?>
    <meta charset="UTF-8">
    <title>Ad Lists</title>
</head>
<body>
<section class="allcontent">
    <?php  
    include_once("./../includes/header.php");
    ?>
     <section class="form-content">
        <div class="postad-form">
            <h1 class="cont-head">My Ad Lists</h1>
            <div class="watchlistflex">
                <div class="headinglist">
                <ul>
                <div class="delook">
                    <li>Product ID</li>
                </div>
                <div class="delook">
                    <li>Product Title</li>
                </div>
                
                <div class="delook">
                    <li>Price</li>
                </div>
                <div class="delook">
                    <li>Detail</li>
                </div>
                <div class="delook">
                    <li>Date</li>
                </div>
                <div class="delook">
                    <li>Delete</li>
                </div>
                <div class="delook">
                    <li>Mark</li>
                </div>
                </ul>
                </div>
                    <?php
                    $fetch = new Fetch();
                    $uname=$_SESSION['uname'];
                    $results=$fetch->myadFetch('uname',$uname);
                    foreach($results as $result)
                    {
                    ?>
                    <div class="contentwatchlist">
                    <ul>
                    <div class="delook">
                        <li><?php echo($result['product_id']);?> </li>
                    </div>
                    <div class="delook">
                        <li><?php echo($result['product_title']);?> </li>
                    </div>
                    <div class="delook">
                        <li><?php echo($result['price']);?> </li>
                    </div>
                    <div class="delook">
                        <li><?php echo($result['details']);?> </li>
                    </div>
                    <div class="delook">
                        <li><?php echo($result['upload_date']);?> </li>
                    </div>
                    <div class="delook">
                        <li>
                            <form action="./../controller/deletead.php?id=<?php echo($result['product_id']);?>" method="post">
                            <button class="dltbutton" name="id">Delete</button>
                            </form>
                        </li>
                    </div>
                    <div class="delook">
                        <li>
                            <?php
                            if($result['p_status']=="available")
                            {
                            ?>
                            <form action="./../controller/marksold.php?id=<?php echo($result['product_id']);?>" method="post">
                            <button name="id">Sold</button>
                            </form>
                            <?php
                            }
                            else
                            {
                             ?>
                             <button class="greybutton" name="id"><?php echo($result['p_status'])?></button>
                            <?php
                            }
                            ?>
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