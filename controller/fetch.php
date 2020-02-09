<?php
include_once("./../includes/mainlink.php");
  class Fetch
  {
    function searchFeatch($words,$cat)
    {
      $fetch=new Fetch();
      $crud = new CrudController();
      if($cat=='allcatagories')
      {
        $sql="SELECT * FROM products WHERE product_title like '%$words%';";
      }
      else
      {
        $sql="SELECT * FROM products WHERE product_title like '%$words%' AND category = '$cat';";
      }
        $results=$crud->getDatas($sql);
        if(empty($result))
        {
          echo ("No Data Available..");
        }
        $imageresults=$fetch->imageonFetch();
      foreach($results as $result)
      {
        foreach($imageresults as $imageresult)
        {
            
            if($result["product_id"]==$imageresult["productid"])
            {
            ?> 
            <div class="adcontent">
                <div class="productname">
                  <h1><?php echo($result["product_title"]);?></h1>
                </div>
                <div class="productimg">
                <img class="imgprd" src="<?php echo($imageresult["filelocation"]);?>" ></a>
                </div>
                <div class="productdetail">
                <a href="./../pages/productdetail.php?id=<?php echo($result['product_id']);?>"><label for="price">Price: Rs 
                    <?php
                      echo($result["price"]);
                      ?>
                    </label>
                    <?php
                      if (isset($_SESSION['user'])) 
                      {
                        $user = $_SESSION['user'];
                      ?>
                      <div>
                          <a href="./../controller/addtolist.php?id=<?php echo($result["product_id"]);?>" class="addtowatch">Watch later</a>
                      </div>
                      <?php 
                      }
                      ?>
                </div>
            </div>
            <?php
            break;  
            }
          } 
      }         

      return $results;
    }
    function userFetch($uname)
    {
      $crud = new CrudController();
      $sql="SELECT * FROM users WHERE uname='$uname'";
      $results=$crud->getDatas($sql);
      return $results;
    }
    function categoryFetch()
    {
      $crud = new CrudController();
      $sql="SELECT * FROM catagories ORDER BY category_title ASC;";
      $results=$crud->getDatas($sql);
      return $results;
    }
    function productFetch($pid)
    {
      $crud = new CrudController();
      $sql="SELECT * FROM products WHERE product_id='$pid';";
      $results=$crud->getDatas($sql);
      return $results;
    }
    function imageonFetch()
    {
      $crud = new CrudController();
      $sql="SELECT * FROM prd_image;";
      $results=$crud->getDatas($sql);
      return $results;
    }
    function imageFetch($pid)
    {
      $crud = new CrudController();
      $sql="SELECT filelocation FROM prd_image WHERE productid='$pid';";
      $results=$crud->getDatas($sql);
      return $results;
    }
    function typeFetch($type,$typevalue)
    {
      $crud = new CrudController();
      $sql="SELECT * FROM products where $type = '$typevalue' AND p_status= 'available' order by upload_date;";
      $results=$crud->getDatas($sql);
      return $results;
    }
    function myadFetch($type,$typevalue)
    {
      $crud = new CrudController();
      $sql="SELECT * FROM products where $type = '$typevalue';";
      $results=$crud->getDatas($sql);
      return $results;
    }
    function shFetch($ptype,$ptypevalue)
    {
      $fetch = new Fetch();
      $type=$ptype;
      $typevalue=$ptypevalue;
      $results=$fetch->typeFetch($type,$typevalue);
      $imageresults=$fetch->imageonFetch();
      $count= 0;
      foreach($results as $result)
      {
          foreach($imageresults as $imageresult)
          {
              
              if($result["product_id"]==$imageresult["productid"])
              {
                  $count ++;
              ?> 
              <div class="adcontent">
                  <div class="productname">
                    <h1><?php echo($result["product_title"]);?></h1>
                  </div>
                  <div class="productimg">
                  <img class="imgprd" src="<?php echo($imageresult["filelocation"]);?>" ></a>
                  </div>
                  <div class="productdetail">
                  <a href="./../pages/productdetail.php?id=<?php echo($result['product_id']);?>"><label for="price">Price: Rs 
                      <?php
                        echo($result["price"]);
                        ?>
                      </label>
                  </a>
                      <?php
                        if (isset($_SESSION['user'])) 
                        {
                          $user = $_SESSION['user'];
                        ?>
                        <div>
                            <a href="./../controller/addtolist.php?id=<?php echo($result["product_id"]);?>" class="addtowatch">Watch later</a>
                        </div>
                        <?php 
                        }
                        ?>
                  </div>
              </div>
              <?php
              break;  
              } 
              if ($count == 4)
              {
                  break;
              }  
          }
      }
    }
    function allFetch($p_type,$p_typevalue)
    {
      $tfetch = new Fetch();
      $type=$p_type;
      $typevalue=$p_typevalue;
      $results=$tfetch->typeFetch($type,$typevalue);
      $imageresults=$tfetch->imageonFetch();
      foreach($results as $result)
      {
          foreach($imageresults as $imageresult)
          {
              
            if($result["product_id"]==$imageresult["productid"])
            {
            ?> 
            <div class="adcontent">
                <div class="productimg">
                    <img class="imgprd" src="<?php echo($imageresult["filelocation"]);?>" >
                </div>
                <div class="productdetail">
                    <label for="price">Price:</label>
                    <?php
                        echo($result["price"]);
                    ?>
                </div>
            </div>
            <?php
            break;  
            } 
          }
      }         
    }
    function watchListFetch($uname)
    {
      $crud = new CrudController();
      $sql="SELECT * FROM watchlist where uname = '$uname' ORDER BY id";
      $results=$crud->getDatas($sql);
      return $results;
    }
    function commentFetch($id)
    {
      $crud = new CrudController();
      $sql="SELECT * FROM comment where productid = '$id' ORDER BY up_date";
      $results=$crud->getDatas($sql);
      foreach ($results as $result)
      {
        echo($result['uname']." : ".$result['comment']);
        echo('<br />');
      }
      return $results;
    }
  }
?>