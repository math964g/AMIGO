<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Purchase history</title>
  </head>
  <body>

<h1>Your purchase history</h1>

    <form action="showPurchaseHistory.php" method="post">

      <input type="submit" name="submit" value="Show purchases" />
    </form>


<?php

  $customerEmail = "john@lennon.com";

  require 'dbConnect.php';

  // Grabs all the rewards from the shop
  $showPurchases = "SELECT * FROM `purchase_history` WHERE Email = '$customerEmail';";
  $result = mysqli_query($conn, $showPurchases);
  // Checks if there are any data in the database, by getting the nr. of rows in the table
  $resultCheck = mysqli_num_rows($result);

  // If we have data in the database, by it being greater than 0, then we run the code
  if ($resultCheck > 0) {
    // We fetch each row of data, and insert it into our $row variable
    while ($row = mysqli_fetch_assoc($result)) {
      echo $row['Rewards'] . "<br>";
      echo $row['Cash_In'] . "<br><br>";
    }
  }

  else {
    echo "No purchase history to show";
  }

$conn->close();


?>

  </body>
</html>
