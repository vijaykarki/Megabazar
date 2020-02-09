<?php
include_once("./../includes/mainlink.php");
    $fetch = new Fetch();
    $results=$fetch->productFetch();
    $imageresults=$fetch->imageFetch();
    foreach($results as $result)
    {
        foreach($imageresults as $imageresult)
        {
            if($result["product_id"]==$imageresult["productid"])
            
            ?> 
                

<?php        

        }
    }
?>   