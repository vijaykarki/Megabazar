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
                    <form action="./../controller/updateuser.php" method="post">
                        <label for="fullName"> Full Name</label>
                        <br />
                        <input type="text" name="fullname">;
                        <br />
                        <label for="fullName"> Email</label>
                        <br />
                        <input type="email" name="uname">
                        <br />
                        <label for="contact"> Contact Number</label>
                        <br />
                        <input type="number" name="phone" maxlength="10">
                        <br />
                        <label for="addsress"> Address</label>
                        <br />
                        <input type="text" name="address">
                        <br />
                        <button name="update"> UPDATE </button>
                    
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