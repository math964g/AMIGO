<?php

$ownerEmail = 'awesome@mail.dk';

require 'dbConnect.php';

$userInterest = [];
$interestDisplay = [];

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

$userInterestName = " SELECT Interest_Name FROM interests ORDER BY Interest_ID";
$resultInterest = mysqli_query($conn, $userInterestName);
$resultCheckInterest = mysqli_num_rows($resultInterest);

// If we have data in the database, by it being greater than 0, then we run the code
if ($resultCheckInterest > 0) {
  // We fetch each row of data, and insert it into our $row variable
  while ($row = mysqli_fetch_assoc($resultInterest)) {
    array_push($interestDisplay, $row['Interest_Name']);
  }
}
// print_r($interestDisplay);
echo "Interest_ID" . $userInterest[0] . "Interest name" . $interestDisplay[($userInterest[0] - 1)];
 ?>
