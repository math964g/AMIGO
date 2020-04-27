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
$successCounter = 0;
$interestsMatchedCounter = 0;

// We use & to create a reference. Without it $allMatches becomes a local variable.
function calculateMatchPercent(&$currentMatch, $successCounter, $interestsMatchedCounter) {

  // ERROR HANDLING: Makes sure there won't be an error if the math is divided by 0
  if ($successCounter >= 1 && $interestsMatchedCounter >= 1) {
    $matchPercent = (($successCounter / $interestsMatchedCounter) * 100);
    echo "Match procent: " . $matchPercent;
  } else {
    $matchPercent = 0;
  }
  // Adds match percent to the second spot in the array
  array_splice($currentMatch, 1, 0, $matchPercent);
}

function saveMatch(&$allMatches, $currentMatch) {
  // Pushes the match into $allMatches
  array_push($allMatches, $currentMatch);
}

// A loop for every user and their interests
for ($i=0; $i < count($allUserInterests); $i++) {

  // A loop for the specific user
  foreach ($allUserInterests[$i] as $arrayItem) {

    // Checks if the element is the email, by using strpos (string position?) to see if it contains "@"
    if (strpos($arrayItem, "@")) {

      // If array is not empty or if array is not the same as the last
      if (empty($currentMatch) || $currentMatch[0] != $arrayItem) {

        // TODO: Gotta make sure how to make this a !=, that was i can save the else statement after, and copy over
        // Makes sure we don't push any empty match data
        if (empty($currentMatch)) {
          print_r($currentMatch);
          echo "Bing to the Bong\n\n\n";
        }

        else {

          // Get match %
          calculateMatchPercent($currentMatch, $successCounter, $interestsMatchedCounter);

          // Save match
          saveMatch($allMatches, $currentMatch);

          // Resets our array
          array_splice($currentMatch, 0);

          // Resets counter values
          $successCounter = 0;
          $interestsMatchedCounter = 0;
        }

        // Specifies the email to always be in the first spot of the array (makes things easier later)
        $currentMatch[0] = $arrayItem;
      }

      // TODO: When everything works accordingly, this else can be deleted
      // else {
      // }
    }

    // It pushes the element to an array
    else {

      // Checks for common interests
      if (in_array($arrayItem, $loggedInUser)) {

        // Pushes interest to array
        array_push($currentMatch, $arrayItem);
        // Add to succes number and max count for specific user
        $successCounter++;
        $interestsMatchedCounter++;
      } else {
        // Add to max count for specific user
        $interestsMatchedCounter++;
      }
    }
  }
}

// Get match %
calculateMatchPercent($currentMatch, $successCounter, $interestsMatchedCounter);

// Save match
saveMatch($allMatches, $currentMatch);

print_r($currentMatch);
print_r($allMatches);

// TODO: Find the most optimal match from the constructed array.
// Simple if statement to get the highest one until nothing is left in the array
$topMatch = [];
$contestingMatches = [];
$contestingMatchesCheck = false;

for ($i=0; $i < count($allMatches); $i++) {

  $newMatch = $allMatches[$i];

  if (empty($topMatch) || $topMatch[1] < $newMatch[1]) {
    $topMatch = $newMatch;
  } else if ($topMatch[1] > $newMatch[1]) {
    $topMatch = $topMatch;
  } else if ($topMatch[1] == $newMatch[1]) {

    $contestingMatchesCheck = true;

    // TODO: HELP - Is not in array
    if (in_array($topMatch, $contestingMatches)) {
      echo "added top match to array";
      array_push($contestingMatches, $topMatch);
    }

    if (in_array($newMatch, $contestingMatches)) {
      echo "added new match to array";
      array_push($contestingMatches, $newMatch);
    }

    echo "\n\nSame match percent between: " . $topMatch[0] . " & " . $newMatch[0] ."\n\n";
    // IDEA: It's possible to create a lot more rules in here for deciding.
    // Maybe nr. 1 only has  3 common interests while nr. 2 has 17 common interests.
    // In that case matching with nr. 2 would be ideal


    $randomNumber = mt_rand(1,2);

    if ($randomNumber === 1) {
      $topMatch = $topMatch;
    } else {
      $topMatch = $newMatch;
    }


  }

  if ($i === (count($allMatches) - 1) && $contestingMatchesCheck === true) {
    echo "FIGHT TO THE DEATH";
    print_r($contestingMatches);

    $randomNumber = mt_rand(1,2);

    $topMatch = $contestingMatches[$randomNumber];
  }
}

echo "\nYour optimal match is: " . $topMatch[0] . "!\n";
print_r($topMatch);






















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
