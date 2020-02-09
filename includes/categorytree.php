<select name="catagories">
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
                        &emsp;<ul>
                        <option value="<?php $subresult["category_title"]?>"><?php echo($subresult["category_title"]);?></option>
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