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

// Collection of our global variables
let allEvents = <?php echo json_encode($eventList) ?>;
let musicEvents = [];
let sportEvents = [];
let foodEvents = [];

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

  // Figures out which array category you need
  switch (currentCategory) {
    case "all":
      eventFeedBuilder(allEvents);
      break;
    case "music":
      eventFeedBuilder(musicEvents);
      break;
    case "sport":
      eventFeedBuilder(sportEvents);
      break;
    case "food":
      eventFeedBuilder(foodEvents);
      break;
    // BUG: For some reason it always runs the default case
    default:
      console.log("There was an oopsie");
  }
}

// Builds the internal HTML structure inside the eventFeed, with the variables of the correct category
function eventFeedBuilder(currentEvents) {

// Quick check to see if any events exist. If not give the user a response
// IDEA: This could possibly be expanded with a button to encourage the user to create the first event in this category
if (0 >= currentEvents.length) {
  eventContainer.innerHTML += "<h3>No events under this category yet</h3><br><br>";
}

else {
    for (var i = 0; i < currentEvents.length; i++) {
      eventContainer.innerHTML +=

      '<div class="eventItem" style="background-image: url(' + currentEvents[i].Image_Path + ');"><div class="eventDetailsFilter"><div class="eventDetails"><h2>' + currentEvents[i].Event_Name + '</h2><div class="eventDate">' + currentEvents[i].Date + '</div><div class="eventLocation">' + currentEvents[i].Location + '</div></div></div></div>';
    }
  }
}

for (var i = 0; i < allEvents.length; i++) {

  // Builds category arrays
  switch (allEvents[i].Category_ID) {
    case "1":
        musicEvents.push(allEvents[i]);
      break;
    case "2":
        sportEvents.push(allEvents[i]);
      break;
    case "3":
        foodEvents.push(allEvents[i]);
      break;
    default:
      console.log("You have an unexpected category with at Event_ID: " + eventList[i].Event_ID);
  }
}

// Fills the page with content on load
eventFeedBuilder(allEvents);

</script>
