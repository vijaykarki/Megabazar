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
            <form action="./../../../app/Controller/category-controller.php" method="post">
                <h1>Add Category</h1>
                <label for="fullname">Catgory Name</label>
                <input type="text" name="categoryname" id="categoryname" placeholder="e.g. Electronics" /><br />
                <input type="submit" value="Add Category" name="submit" id="submit" />
            </form>
            <?php if(@$_GET['empMessage']==true) { ?>
				<span style="color: red; padding: 20px;"> <?php echo $_GET['empMessage']; ?>
                </span><br />
			<?php } ?>
            <?php if(@$_GET['successMessage']==true) { ?>
				<span style="color: green; align-items: centre;"> <?php echo $_GET['successMessage']; ?>
                </span><br />
			<?php } ?>
        </div>
    </div>
</div>
<?php include_once ("./../includes/footer.php"); ?>