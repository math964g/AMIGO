<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Shop</title>
  </head>
  <body>

<h1>AMIGO shop</h1>

<?php

require 'dbConnect.php';

$customerEmail = "john@lennon.com";

  // The variables $userTickets and $rewardPrice are for testing purposes only
  $getUserTicketCount = "SELECT Tickets FROM users WHERE Email = '$customerEmail';";
  $userTicketCountResult = mysqli_query($conn, $getUserTicketCount);
  $userTickets = mysqli_fetch_array($userTicketCountResult);

  // If i don't specify the slot, then i get the price twice? WHY does it load the price in twice ???
  $userTickets = $userTickets[0];

  echo "User tickets: " . $userTickets;


  // Grabs all the rewards from the shop
  $shopRewardList = "SELECT * FROM `shop`;";
  $result = mysqli_query($conn, $shopRewardList);
  // Checks if there are any data in the database, by getting the nr. of rows in the table
  $resultCheck = mysqli_num_rows($result);

  // If we have data in the database, by it being greater than 0, then we run the code
  if ($resultCheck > 0) {
    // We fetch each row of data, and insert it into our $row variable

    echo '<form action="purchaseItem.php" method="post">';

    while ($row = mysqli_fetch_assoc($result)) {
      echo '<input type="radio" name="selectedItem" value="' . $row['Rewards'] . '">' . $row['Rewards'] . ": " . $row['Price'] . "<br>";
    }

    echo '<br><input type="submit" name="submit" value="Checkout" /></form>';

  }

// Deducts tickets and adds purchased item to the user
if (isset($_POST["selectedItem"])) {

  $selectedItem = $_POST["selectedItem"];

  echo $selectedItem;

  $getRewardPrice = "SELECT Price FROM shop WHERE Rewards = '$selectedItem';";
  $rewardPriceResult = mysqli_query($conn, $getRewardPrice);
  $rewardPrice = mysqli_fetch_array($rewardPriceResult);
  // If i don't specify the slot, then i get the price twice? WHY does it load the price in twice ???
  // Takes the string and turns it into an int value
  $rewardPrice = intval($rewardPrice[0]);

  // $newTicketValue = $userTickets - $rewardPrice;

  echo "<br>" . $userTickets . "<br>";

  echo $rewardPrice . "<br>";
  echo $newTicketValue = ($userTickets - $rewardPrice);

  // Query for deducting tickets of the purchase
  $deductTickets = "UPDATE users SET Tickets = '$newTicketValue' WHERE Email = '$customerEmail';";
  mysqli_query($conn, $deductTickets);

  // Get the date/time of the purchase
  $date = date("Y-m-d h:i:s");

  // Inserts the purchased item into user purchase history
  $addToPurchaseHistory = "INSERT INTO `purchase_history`(`Rewards`, `Email`, `Timestamp`, `Cash_In`)
  VALUES ('$selectedItem', '$customerEmail', '$date', '0');";
  mysqli_query($conn, $addToPurchaseHistory);

}

$conn->close();

?>

  </body>
</html>
