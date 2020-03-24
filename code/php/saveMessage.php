<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>PHP test page</title>
  </head>
  <body>

<h1>My testing page</h1>

    <form action="test.php" method="post">
      <label for="formfield1">Formfield uno</label>
      <input type="text" id="formfield1" name="formfield1" size="32" />
      <input type="submit" name="submit" value="Send" />
    </form>

    <?php

if (isset($_POST["formfield1"])) {

  $cheese = $_POST["formfield1"];

  echo $cheese;

}

    ?>

  </body>
</html>
