<?php

require 'dbConnect.php';

$picturePath = "'../../assets/event_img/testpic.png'";

$allEvents = "SELECT * FROM `events`;";
$result = mysqli_query($conn, $allEvents);
// Checks if there are any data in the database, by getting the nr. of rows in the table
$resultCheck = mysqli_num_rows($result);

// If we have data in the database, by it being greater than 0, then we run the code
if ($resultCheck > 0) {
  // We fetch each row of data, and insert it into our $row variable

  // echo '<div class="eventFeed">';

  while ($row = mysqli_fetch_assoc($result)) {
    echo '<div class="eventItem" style="background-image: url(' . $picturePath . ');">

      <div class="eventDetailsFilter">

        <div class="eventDetails">

          <h2>' . $row['Event_Name'] . '</h2>

          <div class="eventDate">
            ' . $row['Date'] . '
          </div>

          <div class="eventLocation">
            ' . $row['Location'] . '
          </div>

        </div>

      </div>

    </div>';
  }

  echo "</div>";

}

?>
