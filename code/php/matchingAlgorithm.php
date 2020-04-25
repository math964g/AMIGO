<?php

// TODO: Using dummy email until the session one is fixed
// $ownerEmail = $_SESSION['name'];
$ownerEmail = 'john@lennon.com';

require 'dbConnect.php';

$userInformation = [];
$userInterests = [];

$userData = "SELECT * FROM `user_interests` WHERE Email = '$ownerEmail';";
$result = mysqli_query($conn, $userData);
$resultCheck = mysqli_num_rows($result);

// If we have data in the database, by it being greater than 0, then we run the code
if ($resultCheck > 0) {
  // We fetch each row of data, and insert it into our $row variable
  while ($row = mysqli_fetch_assoc($result)) {
    $i = 1;
    $userInformation[0] = $row['Email'];
    $userInformation[$i] = $row['Interest_ID'];
    $i + $i;
    echo $i;
  }

  print_r($userInformation);

}

else {
  echo "No purchase history to show";
}

$conn->close();

 ?>
