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
        <div class="user-remove">
            <h2>Verify Product</h2>
            <form method="post">
            <table>
                <tr>
                    <th>User Name</th>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Status</th>
                </tr>
                <?php
                $query = "select * from products where p_status='hide'";
                $crud = new CrudOperation();
                $results = $crud -> getData($query);
                foreach ($results as $result) {
                    echo "<tr>";
                    ?>
                <td><?php echo $result['uname']; ?></td>
                <td><?php echo $result['product_title']; ?></td>
                <td><?php echo $result['price']?></td>
                <td>
                    <button><a href="chstatus.php?eid=<?php echo $result['uname']?>">Verify Product</a></button>
                </td>
                <?php } ?>
                </tr>
            </table>
            </form>
        </div>
    </div>
</div>
<?php 
// include_once("./../includes/footer.php"); 
// if(isset($_GET['del_id'])){
//     $userController = new UserRemove();
//     $userController->removeUser("users", $_GET['del_id']);
// }
?>