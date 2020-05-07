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
  }

  echo "</div>";

}

// This is MAGIC
// This was some whacky stuff, browser is utf-8 and our database was in windows-1252. We didn't learn about this so we had to call in the big guns for some help.
$eventList = mb_convert_encoding($eventList, "UTF-8", "Windows-1252");
$eventListJson = json_encode($eventList);

// var_export($eventListJson);
// echo $eventListJson;
?>

<script>
console.log('%c categorySelector.js loaded successfully! ', 'color: #32fa3c');

const months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

// Collection of our global variables
let allEvents = JSON.parse('<?php echo $eventListJson ?>');
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

      // This link will help you conquer the Date object
      // https://css-tricks.com/everything-you-need-to-know-about-date-in-javascript/
      let eventTime = new Date(currentEvents[i].Date);

      let minutes = eventTime.getMinutes();

      if (minutes.toString().length < 2) {
        minutes += "0";
      }

      let hours = eventTime.getHours();

      if (hours.toString().length < 2) {
        hours = "0" + hours;
      }

      let day = eventTime.getDate();

      let monthIndex = eventTime.getMonth();
      let monthName = months[monthIndex];

      let year = eventTime.getFullYear();

      formattedEventDate = day + ". " + monthName + "   " + hours + ":" + minutes;

      // This builds the string and inserts the html
      eventContainer.innerHTML +=
      '<div id="' + currentEvents[i].Event_ID +'" class="eventItem" style="background-image: url(' + currentEvents[i].Image_Path + ');"><div class="eventDetailsFilter"><div class="eventDetails"><h2>' + currentEvents[i].Event_Name + '</h2><div class="eventDate">' + formattedEventDate + '</div><div class="eventLocation">' + currentEvents[i].Location + '</div></div></div></div>';
    }
  }

  // Handles the data transfer to the showEvent page
  let listedEvents = document.getElementsByClassName("eventItem");

  for (let i = 0; i < listedEvents.length; i++) {
    listedEvents[i].addEventListener("click", goTo);
  }

  function goTo() {

    for (var i = 0; i < allEvents.length; i++) {

      // If the event_ID matches the clicked event, store the event object and ship it to showEvent.php
      if (allEvents[i].Event_ID == this.id) {

        clickedEvent = allEvents[i];
        console.log(clickedEvent);

        sessionStorage.setItem("eventCollection", JSON.stringify(clickedEvent));
        location.href = "showEvent.php";
      }
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
      console.log("You have an unexpected category with at Event_ID: " + allEvents[i].Event_ID);
  }
}

// Fills the page with content on load
eventFeedBuilder(allEvents);

</script>
