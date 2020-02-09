<?php
@session_start();
if (isset($_SESSION['user'])) 
{
    $user = $_SESSION['user'];
    ?>
    <div class="postwatchlists">
    <ul>
        <li><a href="./../pages/watchlist.php">Watchlists</a></li>
        <li><a href="./../pages/postad.php">Post your Ad</a></li>
    </ul>
    </div>
    <nav class="navigation-bar">
        <div class="logo"><a href="./../public/index.php"><h1>MegaBazar</h1></a></div>
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
        <div class="nav-menu">
            <ul>
                <li><a href="./../public/index.php">Home</a></li>
                <div class="uname"><li><?php echo($user);?></li>
                    <div class="profilemenu">
                        <ul>
                        <li><a href="./../pages/profile.php">Profile</a></li>
                        <li><a href="./../pages/myad.php">My ad</a></li>
                        <li><a href="./../controller/logout.php">Log out</a></li>
                        </ul>
                    </div>
                </div>
            </ul>
        </div>
    </nav>
    <?php
} 
else 
{
?>
<nav class="navigation-bar">
    <div class="logo">
        <a href="./../public/index.php"><h1>MegaBazar</h1></a>
    </div>
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
    <div class="nav-menu">
        <ul>
            <li><a href="./../public/index.php">Home</a></li>
            <li><a href="./../pages/login.php">Resgister/Login</a></li>
        </ul>
    </div>
</nav>
<?php 
} ?>