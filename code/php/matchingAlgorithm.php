<?php

// TODO: Using dummy email until the session one is fixed
// $ownerEmail = $_SESSION['name'];
$ownerEmail = 'john@lennon.com';

require 'dbConnect.php';

$loggedInUser = [];
$allUserInterests = [];

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

$allMatches = [];
$currentMatch = [];
$successCounter = 0;
$interestsMatchedCounter = 0;

// We use & to create a reference. Without it $allMatches becomes a local variable.
function calculateMatchPercent(&$currentMatch, $successCounter, $interestsMatchedCounter) {

  // ERROR HANDLING: Makes sure there won't be an error if the math is divided by 0
  if ($successCounter >= 1 && $interestsMatchedCounter >= 1) {
    $matchPercent = (($successCounter / $interestsMatchedCounter) * 100);
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

        // Makes sure we don't push any empty match data
        if (!empty($currentMatch)) {

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

// TODO: Find the most optimal match from the constructed array.
// Simple if statement to get the highest one until nothing is left in the array
$topMatch = [];
$contestingMatches = [];
$contestingMatchesCheck = false;

for ($i=0; $i < count($allMatches); $i++) {

  $newMatch = $allMatches[$i];

  if (!empty($topMatch) && $topMatch[1] == $newMatch[1]) {

    $contestingMatchesCheck = true;

    if (!in_array($topMatch, $contestingMatches)) {
      array_push($contestingMatches, $topMatch);
    }

    if (!in_array($newMatch, $contestingMatches)) {
      array_push($contestingMatches, $newMatch);
    }
    // IDEA: It's possible to create a lot more rules in here for deciding.
    // Maybe nr. 1 only has  3 common interests while nr. 2 has 17 common interests.
    // In that case matching with nr. 2 would be ideal
  }
  elseif (empty($topMatch) || $topMatch[1] < $newMatch[1]) {
    $topMatch = $newMatch;
  }

  if ($i === (count($allMatches) - 1) && $contestingMatchesCheck === true) {
    print_r($contestingMatches);

    $randomNumber = mt_rand(0,1);
    var_export($contestingMatches);
    $topMatch = $contestingMatches[$randomNumber];
  }
}

echo "\nYour optimal match is: " . $topMatch[0] . "!\n";
print_r($topMatch);

?>
