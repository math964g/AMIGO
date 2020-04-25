<?php

// TODO: Using dummy email until the session one is fixed
// $ownerEmail = $_SESSION['name'];
$ownerEmail = 'john@lennon.com';

require 'dbConnect.php';

$loggedInUser = [];
$allUserInterests = [];
$tempArray = [];
$currentArray = "";


// Selects the user and their interest from the DB, and insert it into an array
$userInterestData = "SELECT * FROM `user_interests` WHERE Email = '$ownerEmail';";
$result = mysqli_query($conn, $userInterestData);
$resultCheck = mysqli_num_rows($result);

// If we have data in the database, by it being greater than 0, then we run the code
if ($resultCheck > 0) {
  // We fetch each row of data, and insert it into our $row variable
  while ($row = mysqli_fetch_assoc($result)) {
    $loggedInUser[0] = $row['Email'];
    array_push($loggedInUser, $row['Interest_ID']);
  }

  // TODO: Delete this when done with testing
  // print_r($loggedInUser);

}

$allUsersInterestData = "SELECT * FROM `user_interests`";
$result = mysqli_query($conn, $allUsersInterestData);
$resultCheck = mysqli_num_rows($result);

if ($resultCheck > 0) {

  // A good explanation for multidimensional arrays can be found on the next line
  // https://www.geeksforgeeks.org/multidimensional-arrays-in-php/
  while ($row = mysqli_fetch_assoc($result)) {

    if ($currentArray != $row['Email']) {
      $currentArray = $row['Email'];

      $allUserInterests = array(

        $currentArray => array(
          $row['Interest_ID']
        ),
      );
    }

    else {
      echo $currentArray . ": Pushing to array under same name - ";
      // array_push($allUserInterests, $row);
      // echo "\nPushed value to: $currentArray";
      // echo $currentArray;
    }
    // array_push($allUserInterests, $row);
  }

  // print_r($allUserInterests);

}

$conn->close();

 ?>
