<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">
    <title>Login</title>
    <link rel="stylesheet" href="stylesheet/style.css">
  </head>
  <body>

      <section class="gridContainer">
        <form class="loginForm" action="includes/index.includes.php" method="post">
          <input class="mail" type="text" name="email" placeholder="Email">
          <br>
          <br>
          <input class="pwd" type="password" name="password" placeholder="Password">
          <br>
          <a class="forgotPwd" href="#">Forgot Password?</a>
          <br>
          <br> <br>
          <button class="ctaButton" type="submit" name="submit">Log In</button>
        </form>
      </section>



  </body>
</html>
