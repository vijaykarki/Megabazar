<?php 
    if (!isset($_SESSION)) {
        session_start();
    }
    if ($_SESSION['user'] == "") {
        header("location:./../pages/login.php");
    }
    include("./../../../app/Controller/category-controller.php");

    if(isset($_GET['del_id'])){
        $categoryController = new RemoveCategory();
        $results = $categoryController->returnCategory();
    }

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
        <div class="user-remove">
            <h2>Remove Category</h2>
            <table>
                <tr>
                    <th>Category Name</th>
                    <th>Remove</th>
                </tr>
                <?php
                    $categoryController = new RemoveCategories();
                    $results = $categoryController->returnCategory();
                    foreach ($results as $result) {
                    echo "<tr>";
                    ?>
                    <td><?php echo $result['category_name']; ?></td>
                    <td>
                        <button><a href="removecategory.php?del_id=<?php echo $result['category_name']?>">Delete Category</a></button>
                    </td>
                <?php } ?>
                </tr>
            </table>
        </div>
    </div>
</div>
<?php include_once("./../includes/footer.php"); 
if(isset($_GET['del_id'])){
    $userController = new RemoveCategories();
    $userController->removeCategory($_GET['del_id']);
}
?>