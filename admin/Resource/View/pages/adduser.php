<?php
    session_start();
    if (isset($_SESSION['user'])) {
        $user = $_SESSION['user'];
    } else {
        header("location:./../pages/login.php");
    }
    include_once ("./../includes/header.php");
    include_once ("./../includes/navigation-bar.php");
    
?>
<div class="body-part">
    <div class="side">
        <?php
            include_once ("./../includes/sidebar.php");
        ?>
    </div>
    <div class="form-content">
        <div class="user-add-form">
            <form action="./../../../app/Controller/userController.php" method="post">
                <h1>Add User</h1>
                <label for="fullname">Full Name</label>
                <input type="text" name="fullname" id="fullname" placeholder="e.g. Vijay Karki" />
                <label for="email">Email Address</label>
                <input type="email" name="email" id="email" placeholder="e.g. example@example.com" />
                <label for="password">Password</label>
                <input type="password" id="password" name="password" />
                <label for="position">Position</label>
                <input type="text" name="position" id="position" /><br />
                <input type="submit" value="Add User" name="submit" id="submit" />
            </form>
            <?php if(@$_GET['empMessage']==true) { ?>
				<span style="color: red; font-size: 1.3em"> <?php echo $_GET['empMessage']; ?>
                </span><br />
			<?php } ?>
            <?php if(@$_GET['successMessage']==true) { ?>
				<span style="color: green; font-size: 1.3em"> <?php echo $_GET['successMessage']; ?>
                </span><br />
			<?php } ?>
        </div>
    </div>
</div>
<?php include_once ("./../includes/footer.php"); ?>