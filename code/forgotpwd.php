<?php
require_once('includes/forgotpwd.includes.php');
if(isset($_POST) & !empty($_POST)){
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$sql = "SELECT * FROM `users` WHERE email = '$email'";
	$res = mysqli_query($conn, $sql);
	$count = mysqli_num_rows($res);
	if($count == 1){

	$r = mysqli_fetch_assoc($res);
	$password = $r['password'];
	$to = $r['email'];
	$subject = "Your Recovered Password";

	$message = "Please use this password to login " . $password;
	$headers = "From : Amigo@AmigoSupport.dk";
	if(mail($to, $subject, $message, $headers)){
		echo "Your Password has been sent to your email id";
	}else{
		echo "Failed to Recover your password, try again";
	}

		echo "Send email to user with password";
	}else{
		echo "User name does not exist in database";
	}
}

 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">
    <title>Forgot Password</title>
    <link rel="stylesheet" href="/amigoLogin/stylesheet/nopwd.css"/>
  </head>
  <body>

    <section class="pwdGrid">


    <form class="nopwd" action="includes/login.includes.php" method="post">
      <input type="text" name="email" placeholder="Email">
      <br><br>
      <input type="text" name="password" placeholder="Repeat Email">
    </form>

    <form class="loginbtn" action="signup.php" method="post">
      <button class="ctaButton" type="submit" name="submit">Reclaim Password</button>
    </form>


    </section>

  </body>
</html>
