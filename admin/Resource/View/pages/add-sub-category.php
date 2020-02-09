<?php
session_start();
if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
} else {
    header("location:./../pages/login.php");
}
include_once("./../includes/header.php");
include_once("./../includes/navigation-bar.php");
include_once("./../../../app/Controller/sub-category-controller.php");
?>
<div class="body-part">
    <div class="side">
        <?php
        include_once("./../includes/sidebar.php");
        ?>
    </div>
    <div class="form-content">
        <div class="user-add-form">
            <form action="" method="post">
                <h1>Add Sub Category</h1>
                <select name="category_id" id="category_id">
                    <option value="">Select Catgeories</option>
                    <?php
                    $sub = new SubCategoryController();
                    $results = $sub->returnCategory();
                    foreach ($results as $result) { ?>
                        <option value="<?php echo $result['category_id'] ?>"> <?php echo $result['category_title'] ?></option>
                    <?php }
                    ?>
                </select>
                <label for="fullname">Sub Catgory Name</label>
                <input type="text" name="subcategoryname" id="subcategoryname" placeholder="e.g. Dell " /><br />
                <input type="submit" name="submit" id="submit" value="Add Sub Category"/>
            </form>
            <?php if (@$_GET['empMessage'] == true) { ?>
                <span style="color: red; padding: 20px;"> <?php echo $_GET['empMessage']; ?>
                </span><br />
            <?php } ?>
            <?php if (@$_GET['successMessage'] == true) { ?>
                <span style="color: green;"> <?php echo $_GET['successMessage']; ?>
                </span><br />
            <?php } ?>
        </div>
    </div>
</div>
<?php 
include_once("./../includes/footer.php");

if(isset($_POST['submit'])){
    $cat_id = $_POST['category_id'];
    $sub = new SubCategoryController();
    $sub->insertSubCategory($_POST['subcategoryname'], $cat_id);
}

?>