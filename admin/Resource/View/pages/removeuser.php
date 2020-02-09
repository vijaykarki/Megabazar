<?php 
    if (!isset($_SESSION)) {
        session_start();
    }
    if ($_SESSION['user'] == "") {
        header("location:./../pages/login.php");
    }
    include_once("./../../../app/Controller/user-remove-controller.php");
    ?>

<?php
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
            <h2>Remove User</h2>
            <table>
                <tr>
                    <th>Name</td>
                    <th>Email</td>
                    <th>Remove</td>
                </tr>
                <?php
                $userController = new UserRemove();
                $results = $userController->listUser();
                foreach ($results as $result) {
                    echo "<tr>";
                    ?>
                    <td><?php echo $result['full_name']; ?></td>
                    <td><?php echo $result['uname']; ?></td>
                    <td>
                        <button><a href="removeuser.php?del_id=<?php echo $result['uname']?>">Delete User</a></button>
                    </td>
                <?php } ?>
                </tr>
            </table>

        </div>
    </div>
</div>
<?php include_once("./../includes/footer.php"); 
if(isset($_GET['del_id'])){
    $userController = new UserRemove();
    $userController->removeUser("users", $_GET['del_id']);
}
?>