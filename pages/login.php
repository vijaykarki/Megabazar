<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <?php include_once("./../includes/mainlink.php");?>
    <title>Login</title>
</head>
<body>
<?php include_once("./../includes/header.php");?>
<section class="form-content">
    <div class="user-form">
        <div class="loginform">
            <form action="./../controller/loginController.php" method="post">
            <h1 class="cont-head"> LOGIN </h1>
            <hr>
            <label for ="email_id">Email</label> <br />
            <input type="email" name="email_id" required><br />
            <label for ="password">Password</label> <br />
            <input type="password" name="password" required> <br />
            <hr>
            <?php if(@$_GET['errMessage']==true) { ?>
				<span style="color: red;"> <?php echo $_GET['errMessage']; ?>
                </span><br />
			<?php } ?>
            <p><a href="#">Forgot your password?</a></p>
            <button name="login">LOGIN</button>
            </form>
        </div>
        <div class="vl"></div>
        <div class="register-form">
            <form action="./../controller/createuser.php" method="post">
            <h1 class="cont-head"> REGISTER </h1>
            <hr>
            <label for="fullname">Full Name</label>
            <br />
            <input type="text" placeholder="Enter your full name" name="fullname" required>
            <br />
            <label for="email">Email</label>
            <br />
            <input type="email" placeholder="Enter Email" name="uname" required>
            <br />
            <label for="psw">Password</label>
            <br />
            <input type="password" placeholder="Enter Password" name="password" required>
            <br />
            <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>
            <button name="register">REGISTER</button>
            </form>
            
        </div>
    </div>
</section>
<?php include_once("./../includes/footer.php");?>
</body>
</html>