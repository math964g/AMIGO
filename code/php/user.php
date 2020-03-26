<!DOCTYPE html>
<html>
  <head>
    <title></title>
  </head>
  <body>

    <form action="insertInfo.php" method="POST">

      <input type="text" name="first" placeholder="firstName">
      <br>
      <input type="text" name="last" placeholder="lastName">
      <br>
      <input type="text" name="birth" placeholder="birthday">
      <br>
      <input type="checkbox" name="edu" value="1"> Multimediedesigner
      <input type="checkbox" name="edu" value="2">  Datamatiker
      <input type="checkbox" name="edu" value="3">  Finansøkonom
      <input type="checkbox" name="edu" value="4">  Markedsføringsøkonom
      <br>
      <input type="text" name="mail" placeholder="mail">
      <br>
      <input type="text" name="pw" placeholder="pass">
      <br>
      <input type="text" name="tickets" placeholder="tickets">
      <br>
      <input type="text" name="spin" placeholder="spinE">
      <br>
      <button type="submit" name="submit">Sign Up</button>

    </form>

      <?php

        //  $resultCheck = mysqli_num_rows($result);

          // if ($resultCheck > 0) {
          //   while ($row = mysqli_fetch_assoc($result)) {
          //     echo $row['Last_Name'];
          //   }
          // }

       ?>

  </body>
</html>
