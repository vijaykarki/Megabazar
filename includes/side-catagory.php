<div class="side-catagory">
    <div class="catagory-list">
        <h2>Categories</h2>
        <ul>
            <?php
                $fetch = new Fetch();
                $results=$fetch->categoryFetch();
                foreach($results as $result)
                {
                    if($result["parent_id"]==0)
                    {
                    ?>
                    <div class="menu">
                    <a href="./../pages/fullproduct.php?id=<?php echo($result["category_title"]); ?>">
                        <li class="item">
                            <?php echo($result["category_title"]);?>
                        </li>
                    </a>
                    <?php
                        foreach($results as $subresult)
                        {
                        ?>
                        <div class="smenu">
                        <?php
                        if($subresult["parent_id"]==$result["category_id"])
                            {
                            ?> 
                                <a href="./../pages/fullproduct.php?id=<?php echo($subresult["category_title"]); ?>">
                                    <li>
                                        &emsp;<?php echo($subresult["category_title"]);?>
                                    </li>
                                </a>
                            <?php 
                            }
                            ?>
                        </div>
                        <?php
                        }
                        ?>
                    </div>
                    <?php
                    }    
                    ?>
                <?php
                }    
                ?> 
        </ul>
    </div>
</div>