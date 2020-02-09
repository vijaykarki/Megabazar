<?php
session_start();
if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
} else {
    header("location:./../pages/login.php");
}
include_once("./../../../app/Controller/menucontroller.php");
include_once("./../includes/header.php");
include_once("./../includes/navigation-bar.php");
?>
<div class="body-part"> 
    <div class="side">
        <?php 
            include_once "./../includes/sidebar.php";
        ?>
    </div>
    <div class="content">
        <div class="card">
            <h2> Total Users</h2>
            <?php
                $userController = new Report();
                // $query = "select count(*) from users where type='normal'";
                // $results = $userController->returnUserCount();
            ?>
        </div>
        <div class="card">
            <h2>Total Products</h2>
        </div>
        <div class="card">
            <h2>Total Page Visit</h2>
        </div>  
        <div class="card">
            <h2>Total Item Sold</h2>
        </div>
    </div>
</div>
<?php include_once "./../includes/footer.php";

?>