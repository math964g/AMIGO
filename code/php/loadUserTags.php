<?php

$ownerEmail = 'bingbong@123.dk';

require 'dbConnect.php';

$userInterest = [];

$userInterestData = "SELECT * FROM `user_interests` WHERE Email = '$ownerEmail';";
$result = mysqli_query($conn, $userInterestData);
$resultCheck = mysqli_num_rows($result);

// If we have data in the database, by it being greater than 0, then we run the code
if ($resultCheck > 0) {
  // We fetch each row of data, and insert it into our $row variable
  while ($row = mysqli_fetch_assoc($result)) {
    array_push($userInterest, $row['Interest_ID']);
  }
}
print_r($userInterest);

 ?>
