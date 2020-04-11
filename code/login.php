<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">
    <title>Login</title>
    <link rel="stylesheet" href="/amigoLogin/stylesheet/loginstyle.css"/>
  </head>
  <body>

    <section class="loginGrid">

      <form class="loginInfo" action="includes/login.includes.php" method="post">
        <input type="text" name="email" placeholder="Email">
        <br><br>
        <input type="password" name="password" placeholder="password">
        <br> <br>
        <label> <a class="forgotPassword" href="signup.php"> Forgotten password? </a> </label>
      </form>

      <form class="loginbtn" action="signup.php" method="post">
        <button class="ctaButton" type="submit" name="submit">Log In</button>
        <br> <br>
        <label> <a class="notSignedUp" href="signup.php"> Don't have an account yet? </a> </label>
      </form>

    </section>




  </body>
</html>
