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
<link rel="stylesheet" href="./../../../public/css/profile.css">
<div class="body-part">
    <div class="side">
        <?php
        include_once("./../includes/sidebar.php");
        ?>
    </div>
    <div class="profile-content">
        <?php
            $user = $_SESSION['user'];            
        ?>
        <h2>Welcome <?php echo $user; ?></h2>
        <div class="changepasswd">
            <h2>Change Password</h2>
            <form action="./../../../app/Controller/profilecontroller.php" method="post">
                <label for="newpassword">Enter New Password</label><br />
                <input type="password" name="newpassword" /><br />
                <label for="renewpassword">Retype New Password</label><br />
                <input type="password" name="renewpassword" id="renewpassword" /><br />
                <input type="submit" value="Change Password" name="submit" />
            </form>
        </div>
        <?php if(@$_GET['empMessage']==true) { ?>
				<span style="color: red; font-size: 1.3em"> <?php echo $_GET['empMessage']; ?>
                </span><br />
			<?php } ?>
            <?php if(@$_GET['successMessage']==true) { ?>
				<span style="color: green; font-size: 1.3em"> <?php echo $_GET['successMessage']; ?>
                </span><br />
			<?php } ?>
        <!-- <div class="changepasswd">
            <h2>Change Email Address</h2>
            <form action="" method="post">
                <label for="newpassword">Enter New Password</label><br />
                <input type="password" name="newpassword" /><br />
                <label for="renewpassword">Retype New Password</label><br />
                <input type="password" name="renewpassword" id="renewpassword" /><br />
                <input type="submit" value="Change Password" />
            </form>
        </div> -->
    </div>
</div>
