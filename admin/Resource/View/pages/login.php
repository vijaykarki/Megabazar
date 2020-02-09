
<?php
    session_start();
    include("./../includes/header.php");
?>
<div class="imagecontainer">
        <!-- <img src="./../../../public/image/ragnar.jpg" alt=""> -->
    </div>
    <div class="loginform">
        <form action="./../../../app/Controller/login-controller.php" method="post">
            <label for="username">Email Id</label>
            <input type="text" name="username" id="username" placeholder="e.g. example@gmail.com"/>
            <label for="password">Password</label>
            <input type="password" name="password" id="password" placeholder="e.g. 123@Abc"/>
            <input type="submit" name="login" id="login" value="Login">
            <?php if(@$_GET['empMessage']==true) { ?>
				<span style="color: red;"> <?php echo $_GET['empMessage']; ?>
                </span><br />
			<?php } ?>
            <?php if(@$_GET['errMessage']==true) { ?>
				<span style="color: red;"> <?php echo $_GET['errMessage']; ?>
                </span><br />
			<?php } ?>
            <a class="forgetpassword" href="http://" target="_blank" rel="noopener noreferrer">Forget your password?</a>
        </form>
    </div>    

