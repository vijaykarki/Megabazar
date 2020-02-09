<div>
    <form action="./../pages/searchresult.php" method="post"> 
        <div class="searchsection"> 
            <div class="catagories-drop button">
                <?php  include_once("categorytree.php");?>
            </div>  
        <div class="search-bar">
            <input type="text" placeholder="Enter product to search" name="searchvalue">
        </div>
        <div class="search-button">
            <button class="button" name="search">SEARCH</button>
        </div>
        </div>
    </form>
</div>