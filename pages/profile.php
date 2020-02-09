<!DOCTYPE html>
<html lang="en">
<head>
    <?php include_once("./../includes/mainlink.php");?>
    <meta charset="UTF-8">
    <title>Profile</title>
</head>
<body>
<section class="allcontent">
    <?php  
    include_once("./../includes/header.php");
    ?>
     <section class="form-content">
        <div class="postad-form">
            <h1 class="cont-head">Profile</h1>
            <div class="Userinfo">
                    <?php
                    $fetch = new Fetch();
                    $uname=$_SESSION['uname'];
                    $results=$fetch->userFetch($uname);
                    foreach($results as $result)
                    {
                        ?>
                        <label for="fullName"> Full Name</label>
                        <?php echo($result['full_name']);
                        ?>
                        <br />
                        <label for="fullName"> Email</label>
                        <?php echo($result['uname']);
                        ?>
                        <br />
                        <label for="fullName"> Contact Number</label>
                        <?php echo($result['phone']);
                        ?><br />
                        <button> <a href="./updateprofile.php" >Update </a> </button><br />
                    <?php
                    }
                    ?>
            </div>
            </div>
    </section>
    <div>
    <?php
            include_once("./../includes/footer.php");
        ?>
    </div>
</body>
</html>