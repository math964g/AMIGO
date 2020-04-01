<?php

require 'dbConnect.php';

$picturePath = "'../../assets/event_img/testpic.jpg'";

$allEvents = "SELECT * FROM `events` ORDER BY `Event_ID` DESC;";
$result = mysqli_query($conn, $allEvents);
// Checks if there are any data in the database, by getting the nr. of rows in the table
$resultCheck = mysqli_num_rows($result);
$eventList = array();

// If we have data in the database, by it being greater than 0, then we run the code
if ($resultCheck > 0) {
  // We fetch each row of data, and insert it into our $row variable

  // echo '<div class="eventFeed">';

  while ($row = mysqli_fetch_assoc($result)) {

    // Creates an array with all events
    $eventList[] = $row;

    // Converts the time to human

    // Converts the string to date format
    $dt = strtotime($row['Date']);

    $day = date("d", $dt);
    $month = date("F", $dt);
    $time = date("H", $dt) . ":" . date("i", $dt);

    // Builds the time into a beautiful string
    $eventDate = $day . ". " . $month . " - " . $time;


    echo '<div class="eventItem" style="background-image: url(' .  $row['Image_Path'] . ');">

      <div class="eventDetailsFilter">

        <div class="eventDetails">

          <h2>' . $row['Event_Name'] . '</h2>

          <div class="eventDate">
            ' . $eventDate . '
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

// echo json_encode($eventList);

?>

<script>
console.log("categorySelector.js loaded successfully!");

let categories = document.getElementsByClassName("categoryItem");

for (let i = 0; i < categories.length; i++) {
  categories[i].addEventListener("click", changeCategory);
}

function changeCategory() {

  for (let i = 0; i < categories.length; i++) {
    categories[i].classList.remove("active");
  }

  console.log(this);
  this.classList.add("active");
}

let eventList = <?php echo json_encode($eventList) ?>;
console.log(eventList);
console.log(eventList[1].Date);
</script>
