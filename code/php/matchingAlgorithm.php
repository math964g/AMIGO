<?php

// TODO: Using dummy email until the session one is fixed
// $ownerEmail = $_SESSION['name'];
$ownerEmail = 'john@lennon.com';

require 'dbConnect.php';

$loggedInUser = [];
$allUserInterests = [];
// TODO: Delete, probably not going to use these 2
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

      array_push($allUserInterests, $row);

  }

  // print_r($allUserInterests);

}

$conn->close();

// TODO: Delete this later - using it now for testing and a note
// -------------------------------------------------------------------------------------
if (in_array("john@lennon.com", $allUserInterests[0])) {
  // echo "Found";
  // array_push($allUserInterests[0], $allUserInterests[1]['Interest_ID']);
  // I slice out from $allUserInterests, starting at pos 1, slicing out 1 element
  // array_splice($allUserInterests, 1, 1);
  // $allUserInterests.splice(1, count($allUserInterests[1]));
  // print_r($allUserInterests);
}

else {
  // echo "Not found";
}
// -------------------------------------------------------------------------------------

// TODO: Delete this, however this method could work too
foreach ($allUserInterests as $value) {
  // print_r($value);
}

$allMatches = [];
$currentMatch = [];


function saveCurrentMatch($currentMatch, $allMatches) {
  print_r($currentMatch);
  array_push($allMatches, $currentMatch);
  print_r($allMatches);
}

// A loop for every user and their interests
for ($i=0; $i < count($allUserInterests); $i++) {

  // Loops through all the users, one item at a time, to find the most compatible match
  foreach ($allUserInterests[$i] as $arrayItem) {

    // Checks if the element is the email, by using strpos (string position?) to see if it contains "@"
    if (strpos($arrayItem, "@")) {
      echo "\n@ found in: " . $arrayItem . "\n";
      print_r($currentMatch);
      echo $arrayItem . "\n";

      // If array is not empty or if array is not the same as the last
      if (empty($currentMatch) || $currentMatch[0] != $arrayItem) {

        // Makes sure we don't push any empty match data
        if (empty($currentMatch)) {
          echo "\n\n\nI'm empty\n\n\n";
        }

        else {
          saveCurrentMatch($currentMatch, $allMatches);
          echo "\n\n\nWe just pushed it \n\n\n";
          // Resets our array
          array_splice($currentMatch, 0);
        }

        $currentMatch[0] = $arrayItem;
        echo "\nSaving old match...\n" . "New current match set!\n\n";
      }

      else {
        echo "Same user confirmed \n";
      }
    }

    // It pushes the element to an array
    else {
      echo "Try again: '" . $arrayItem . "' does not contain @ \n";

      if (in_array($arrayItem, $loggedInUser)) {
        // TODO: This is suppose to be the % in the end instead of the interests
        // Pushes interest to array
        array_push($currentMatch, $arrayItem);
        echo "Common interest found!\n";
        // Add to succes number and max count for specific user
      }

      else {
        echo "Incompatible\n";
        // Add to max count for specific user
      }

      // Save the percent for variable checking, and save the email as well, to be able to grab it later and match with the user
    }
  }

  if ($i == 4) {

    echo "\n\n\nHeurika!\n";
    print_r($allMatches);
  }
}



























// // TODO: Using dummy email until the session one is fixed
// // $ownerEmail = $_SESSION['name'];
// $ownerEmail = 'john@lennon.com';
//
// require 'dbConnect.php';
//
// $loggedInUser = [];
// $allUserInterests = [];
// $tempArray = [];
// $currentArray = "";
//
//
// // Selects the user and their interest from the DB, and insert it into an array
// $userInterestData = "SELECT * FROM `user_interests` WHERE Email = '$ownerEmail';";
// $result = mysqli_query($conn, $userInterestData);
// $resultCheck = mysqli_num_rows($result);
//
// // If we have data in the database, by it being greater than 0, then we run the code
// if ($resultCheck > 0) {
//   // We fetch each row of data, and insert it into our $row variable
//   while ($row = mysqli_fetch_assoc($result)) {
//     $loggedInUser[0] = $row['Email'];
//     array_push($loggedInUser, $row['Interest_ID']);
//   }
//
//   // TODO: Delete this when done with testing
//   // print_r($loggedInUser);
//
// }
//
// $allUsersInterestData = "SELECT * FROM `user_interests`";
// $result = mysqli_query($conn, $allUsersInterestData);
// $resultCheck = mysqli_num_rows($result);
//
// if ($resultCheck > 0) {
//
//   // A good explanation for multidimensional arrays can be found on the next line
//   // https://www.geeksforgeeks.org/multidimensional-arrays-in-php/
//   while ($row = mysqli_fetch_assoc($result)) {
//
//     if ($currentArray != $row['Email']) {
//       $currentArray = $row['Email'];
//
//       $allUserInterests = array(
//
//         $currentArray => array(
//           $row['Interest_ID']
//         ),
//       );
//     }
//
//     else {
//       echo $currentArray . ": Pushing to array under same name - ";
//       // array_push($allUserInterests, $row);
//       // echo "\nPushed value to: $currentArray";
//       // echo $currentArray;
//     }
//     // array_push($allUserInterests, $row);
//   }
//
//   // print_r($allUserInterests);
//
// }
//
// $conn->close();

 ?>
