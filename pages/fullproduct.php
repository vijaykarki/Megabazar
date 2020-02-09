<!DOCTYPE html>
<html lang="en">
<head>
    <?php include_once("./../includes/mainlink.php");?>
    <meta charset="UTF-8">
    <title>Products</title>
</head>
<body>
<section class="allcontent">
    <?php  
    include_once("./../includes/header.php");

    ?>
    <section class="index-content">
    <div class="sidebar">
        <?php    
            include_once("./../includes/side-catagory.php");
        ?>
    </div>
    <div class="main-content">
        <div class="content-head">
            <h1><?php echo($_GET['id']);?></h1>
        </div>
        <div class="ad-list">
            <?php
                $fetch = new Fetch();
                $type="category";
                $typevalue=$_GET['id'];
                $fetch->shFetch($type,$typevalue);
            ?>
        </div>
    </div>
</section>
<div>
        <?php
            include_once("./../includes/footer.php");
        ?>
</div>
</section>
</body>
</html>