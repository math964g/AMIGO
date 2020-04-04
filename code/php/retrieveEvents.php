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



  }

  echo "</div>";

}

?>

<script>
console.log("categorySelector.js loaded successfully!");

let allEvents = <?php echo json_encode($eventList) ?>;
let allArray

let categories = document.getElementsByClassName("categoryItem");

for (let i = 0; i < categories.length; i++) {
  categories[i].addEventListener("click", changeCategory);
}

// Figures out the category and highlights it
function changeCategory() {

  for (let i = 0; i < categories.length; i++) {
    categories[i].classList.remove("active");
  }

  this.classList.add("active");

  let currentCategory = this.id;

  const eventContainer = document.getElementById("eventContainer");
  eventContainer.innerHTML = "";

  switch (currentCategory) {
    case "summer":
      console.log("Spring break bitches!");
      eventFeedBuilder();
      break;
    case "food":
      console.log("tonight, we feast!");
      break;
    // BUG: For some reason it always runs the default case
    default:
      console.log("There was an oopsie");
  }

  function eventFeedBuilder() {
    console.log("Building string........");

    for (var i = 0; i < 5; i++) {
      eventContainer.innerHTML += '<div class="eventItem" style="background-image: url(' + "VALUE" + ');">'

      // '<div class="eventItem" style="background-image: url(' + "VALUE" + ');">
      //
      //   <div class="eventDetailsFilter">
      //
      //     <div class="eventDetails">
      //
      //       <h2>' + "VALUE" + '</h2>
      //
      //       <div class="eventDate">
      //         ' + "VALUE" + '
      //       </div>
      //
      //       <div class="eventLocation">
      //         ' + "VALUE" + '
      //       </div>
      //
      //     </div>
      //
      //   </div>
      //
      // </div>';
    }
  }
}

for (var i = 0; i < allEvents.length; i++) {

  switch (allEvents[i].Category_ID) {
    case "1":
        console.log(allEvents[i].Event_ID);
      break;
    case "2":
        console.log(allEvents[i].Event_ID);
      break;
    case "3":
        console.log(allEvents[i].Event_ID);
      break;
    default:
      console.log("You have an unexpected category with at Event_ID: " + eventList[i].Event_ID);
  }
}

</script>
