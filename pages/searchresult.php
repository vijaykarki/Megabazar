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
            <h1><?php echo($_POST['searchvalue']);?></h1>
        </div>
        <div class="ad-list">
            <?php
                if(isset($_POST['search']))
                {
                    $searchvalue=$_POST['searchvalue'];
                    $cat=$_POST['catagories'];
                    $fetch=new Fetch();
                    $result=$fetch->searchFeatch($searchvalue,$cat);
                    {
                        
                    }
                }
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