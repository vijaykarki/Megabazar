<?php 
    if (!isset($_SESSION)) {
        session_start();
    }
    if ($_SESSION['user'] == "") {
        header("location:./../pages/login.php");
    }
    include("./../../../app/Controller/DbController.php");
    include_once("./../includes/header.php");
    require_once("./../includes/navigation-bar.php");

?>
<div class="body-part">
    <div class="side">
        <?php
        include_once("./../includes/sidebar.php");
        ?>
    </div>
    <div class="form-content">
        
    </div>
</div>
