<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php
        include_once("./../includes/mainlink.php");
    ?>    
    <title>Megabazar</title>
</head>
<body>
<section class="allcontent">
    <?php
        include_once("./../includes/header.php");
    ?>
    <div class="index-carousel">
        <?php
            include_once("./../includes/carousel-index.php");
        ?>
    </div>
    <div class="index-content">
        <div class="sidebar">
            <?php    
                include_once("./../includes/side-catagory.php");
            ?>
        </div>
        <div class="main-content">
            <div class="content-head">
                <h1>Feature Ads</h1>
            </div>
            <div class="ad-list">
                <?php
                    $fetch = new Fetch();
                    $type="product_type";
                    $typevalue="featured";
                    $fetch->shFetch($type,$typevalue);
                ?>
            </div>
            <div class="content-head">
                <h1>Popular Ads</h1>
            </div>
            <div class="ad-list">
                <?php
                    $fetch = new Fetch();
                    $type="view";
                    $typevalue="60";
                    $fetch->shFetch($type,$typevalue);
                ?>
            </div>
            <div class="content-head">
                <h1>Recently Listed Ads</h1>
            </div>
            <div class="ad-list">
                <?php
                    $fetch = new Fetch();
                    $type="product_type";
                    $typevalue="normal";
                    $fetch->shFetch($type,$typevalue);
                ?>
            </div>
        </div>
    </div>
</section>
<div>
        <?php
            include_once("./../includes/footer.php");
        ?>
</div>
</body>
</html>