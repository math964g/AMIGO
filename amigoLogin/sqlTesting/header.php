<?php
session_start();
 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="description" content="whatever man stop asking">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="stylesheet.css">
    <title></title>
  </head>
  <body>

    <header>
      <nav>
      <ul>
        <li> <a href="index.php">Home</a> </li>
        <li> <a href="#">portfolio</a> </li>
        <li> <a href="#">about me</a> </li>
        <li> <a href="#">contact</a> </li>
      </ul>
      </nav>

      <br>

      <div>
        <form action="includes/login.inc.php" method="post">
          <input type="text" name="email" placeholder="E-mail...">
          <input type="password" name="password" placeholder="Password...">
          <button type="submit" name="login-submit">Login</button>
        </form>
        <a href="signup.php">Signup</a>
          <form action="includes/logout.inc.php" method="post">
            <button type="submit" name="logout-submit">Logout</button>
          </form>
      </div>
    </header>

  </body>
</html>
