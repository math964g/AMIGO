<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">
    <title>Login</title>
    <link rel="stylesheet" href="../scss/loginstyle.css"/>
  </head>
  <body>

    <section class="loginGrid">

      <article class="amigoImg">
        <img src="logo/elMuchacho1.png" alt="elMuchacho">
      </article>

      <form id="linfo" class="loginInfo" action="includes/login.includes.php" method="post">
        <input type="text" name="Email" placeholder="Email">
        <br><br>
        <input type="password" name="Password" placeholder="password">
        <br> <br>
        <label> <a class="forgotPassword" href="reset-password.php"> Forgotten password? </a> </label>
      </form>

      <form class="loginbtn" action="includes/login.includes.php" method="post">
        <button form="linfo" class="ctaButton" type="submit" name="submit">Log In</button>
        <br> <br>
        <label> <a class="notSignedUp" href="signup.php"> Don't have an account yet? </a> </label>
      </form>

    </section>




  </body>
</html>
