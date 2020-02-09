<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php
        include_once("./../includes/mainlink.php");
    ?>
    <title>Post a Ad</title>
</head>
<body>
    <?php
        include_once("./../includes/header.php");
        unset($_POST);
        
    ?>
    <section class="form-content">
        <div class="postad-form">
            <h1 class="cont-head">Post a Ad</h1>
            <form action="./../controller/productAdd.php" method="post" enctype="multipart/form-data">
                <label for ="prdtitle">Product Title</label> <br />
                <input type="text" name="prdtitle" placeholder="Enter Product Title" required> 
                <br />
                <label for="prdprice">Price</label> <br />
                <input type="number" name="prdprice" required>
                <br />
                <label for="prdtype">Product Type</label><br />
                <select name="prdtype" id="">
                    <option value="normal" selected>Normal</option>
                    <option value="featured">Featured</option>
                </select>
                <br />
                <label for="condition">Condition</label><br />
                <select name="condition">
                    <option value="used" selected>Used</option>
                    <option value="brand_new">Brand new</option>
                </select>
                <br />
                <label for="category">Category</label><br />
                <select name="category">
                    <option value="allcatagories" selected>All Catagories</option>
                    <?php
                    $fetch = new Fetch();
                    $results=$fetch->categoryFetch();
                    foreach($results as $result)
                        {
                            if($result["parent_id"]==0)
                            {
                            ?>
                            <ul>
                            <li><option><?php echo($result["category_title"]);?></option></li>
                                <?php
                                foreach($results as $subresult)
                                {
                                if($subresult["parent_id"]==$result["category_id"])
                                    {
                                        ?>
                                    <ul>
                                        <option><?php echo($subresult["category_title"]);?></option>
                                    </ul>
                                    <?php
                                    }
                                }
                                ?>
                            </ul>
                            <?php    
                            }    
                        }
                        ?> 
                </select>
                <br />
                <label for="detail">Detail</label><br/>
                <textarea name="prddetail" cols="30" rows="10">

                </textarea>
                <br />
                <input type="file" name="prdimage[]" multiple>
                <br />
                <label for="location">Location</label><br />
                <input type="text" name="location">
                <br />
                <hr>
                <button name="post">POST</button>
            </form>
        </div>
    </section>
    <div>
    <?php
            include_once("./../includes/footer.php");
        ?>
    </div>
</body>
</html>