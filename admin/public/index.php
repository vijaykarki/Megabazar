<?php
session_start();
if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
} else {
    header("location:./../pages/login.php");
}
include_once "./../Resource/View/includes/header.php";
?>
<link rel="stylesheet" href="./css/navigation-bar.css">
<link rel="stylesheet" href="./css/sidebar.css">
<link rel="stylesheet" href="./css/footer-css.css">
<link rel="stylesheet" href="./css/main.css"> 
<?php
include_once ("./../Resource/View/includes/navigation-bar.php");
?>
<div class="body-part">
    <div class="side">
        <?php
        include_once "./../Resource/View/includes/sidebar.php";
        ?>
    </div>
    <div class="content">
        <div class="card">
        </div>
        <div class="card">

        </div>
        <div class="card">
        </div>
        <div class="card">

        </div>
    </div>
</div>
<?php include_once "./../Resource/View/includes/footer.php";
?>