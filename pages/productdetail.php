<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php
        include_once("./../includes/mainlink.php");
    ?>
    <title>Product Detail</title>
</head>
<body>
    <?php
        include_once("./../includes/header.php");
    ?>
    <div class="featureproductcarasoul">

    </div>
    <?php
        $fetch = new Fetch();
        $pid=$_GET['id'];
        $results=$fetch->productFetch($pid);
        $imageresults=$fetch->imageFetch($pid);
        // var_dump($results);
        foreach($results as $result)
        {
            $producttitle=$result["product_title"];
            $productprice=$result["price"];
            $productdetail=$result['details'];
            $pcondition =$result["condition_prd"];
            $sellermail=$result["uname"];
            // echo($sellermail);
            $prdaddress=$result["p_address"];
        }
    ?>
    <section class="productdetailcontainer">
    <hr>
        <h1><?php echo($producttitle);?></h1>
    <hr>
      <div class="productheading detalcontainer">
        
        
        <div class="image">
            <div class="imagecontainer">
            <?php 

            foreach($imageresults as $imageresult)
            {
                ?>
                <div class="imgdetail">
                    <img src="<?php echo($imageresult['filelocation']);?>">
                </div>
                <?php
            }
            ?>
            </div>
            <hr>
        </div>
    <div class="discriptionsection">
        <div class="userdetail">
            <h2>Product Detail</h2>
            <hr>
            <label for="producttitle"> Product Title: <?php echo($producttitle);?></label>
            <br />
            <label for="price">Price: <?php echo($productprice);?></label>
            <br />
            <label for="condition">Condition: <?php echo($pcondition);?></label>
            <br />
            <label for="address">Address: <?php echo($prdaddress);?></label>
            <br />
            <hr>
            <h2>Description</h2>
            <hr>
            <p><?php echo($productdetail);?></p>
            <br />
            <hr>
        </div>
        <div class="userdetail">
            <h2>User Detail</h2>
            <hr>
            <?php
                $userdetails=$fetch->userFetch($sellermail);
                // echo($sellermail);
                // var_dump($userdetails);
                foreach($userdetails as $userdetail)
                {
                    ?>
                    <label for="sellername">Seller Name: <?php echo($userdetail['full_name']);?></label>
                    <br />
                    <label for="email">Seller mail: <?php echo($userdetail['uname']);?></label>
                    <br />
                    <?php 
                    if(!empty($userdetail['phone']))
                    {
                    ?>
                      <label for="phone">Contact Number: <?php echo($userdetail['phone']);?></label>
                      <br>
                    <?php
                    }
                    ?>
                    <label for="location">Location: <?php echo($userdetail['address']);?></label>
                    <hr>
                <?php
                }         
            ?>
        </div>
    </div>
</div>
<form action="./../controller/addcomment.php?id=<?php echo($pid);?>" method="post">
<div class="productcomment">
    <div class="showcomment">
        <h2>Comments</h2>
        <?php 
            $fetch = new Fetch();
            $fetch->commentFetch($pid);
        ?>
    </div>
    <div class="writecomment">
        <textarea name="productcomment" cols="50%" rows="10">

        </textarea>
        <br />
        <button name="comment">Comment</button>
    </div>   
</div>
</form>

</section>
    <?php
        include_once("./../includes/footer.php");
    ?>  
</body>
</html>