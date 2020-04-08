<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">
    <link rel="stylesheet" href="stylesheet/signup.css">
    <title>Sign Up</title>
  </head>
  <body>

    <section class="signUpGrid">
      <form class="form" action="includes/signup.includes.php" method="post">
        <input class="first" type="text" name="firstName" placeholder="First Name">
        <br>
        <br>
        <input class="last" type="text" name="lastName" placeholder="Last Name">
        <br>
        <br>
        <input class="birth" type="text" name="birth" placeholder="Birthday">
        <br>
        <br>
        <select class="edu" name="edu" placeholder="education">
          <option value="1">Vælg Uddannelse</option>
          <option value="2">Multimediedesigner</option>
          <option value="3">Laborant</option>
        </select>
        <br>
        <br>
        <input type="text" name="email" placeholder="Email">
        <br>
        <br>
        <input type="password" name="password" placeholder="Password">
        <br>
        <br>
        <input type="password" name="password-repeat" placeholder="Repeat Password">
        <br>
        <br>
        <button class="ctaButton" type="submit" name="signup-submit">Sign Up</button>
        <br>
        <br>
        <label> <a class="alreadyMember" href="index.php"> Already a member? </a> </label>
      </form>
    </section>


  </body>
</html>
