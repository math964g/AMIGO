<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">
    <title>Reset password</title>
    <link rel="stylesheet" href="../scss/nopwd.css"/>
  </head>
  <body>

    <main>
      <div class="wrapper-main">
        <section class="pwdGrid">
          <!-- <h1>Reset Your Password</h1>
          <p>Instructions will be send to your email.</p> -->

          <div class="amigoImg">
            <img src="logo/elMuchacho1.png" alt="elMuchacho">
          </div>

          <form id="nopwd" class="nopwd" action="includes/reset-request.includes.php" method="post">
            <input type="text" name="email" placeholder="Reset password is currently out of order"> <!-- Enter your e-mail address... -->
          </form>

          <form class="loginbtn" action="signup.php" method="post">
            <button form="nopwd" class="ctaButton" type="submit" name="reset-request-submit"> <a href="login.php"></a>Reclaim Password</button>
          </form>

        </section>

      </div>
    </main>





  </body>
</html>
