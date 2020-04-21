<?php // print_r($_POST); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../scss/createEvent.css">
    <title>Create event</title>
  </head>
  <body>

    <div class="topBar">

      <div class="returnButton">

        <div class="returnArrow"></div>

      </div>

      <h1>AMIGO</h1>

      <div class="editEvent">

        <div class="lineVertical"></div>
        <div class="lineHorizontal"></div>

      </div>

    </div>

<div class="eventContainer">

  <div id="eventPicture" style="background-image: url('../../assets/event_img/amigo.jpg');"></div>

  <div class="eventDetailBox">

    <form action="createEvent.php" method="post">
      <label for="eventName">Event name: </label>
      <br>
      <input type="text" id="eventName" name="eventName" size="32" />
      <br>

      <label for="eventDate">Date: </label>
      <br>
      <input type="datetime-local" id="eventDate" name="eventDate" size="32" />
      <br>

      <label for="eventLocation">Location: </label>
      <br>
      <input type="text" id="eventLocation" name="eventLocation" size="32" />
      <br>




      <div class="selectCategory">
        <label for="">Select category:</label>
        <select id="selectedCategory" name="selectedCategory">
          <option value="none">Select a category</option>
          <option value="1">Sport</option>
          <option value="2">Music</option>
          <option value="3">Food</option>
        </select>
      </div>

      <label for="eventDescription">Description: </label>
      <br>
      <textarea type="text" id="eventDescription" name="eventDescription" size="32" /></textarea>
      <br>

      <input class="ctaButton" type="submit" name="submit" value="Create event" />
    </form>

  </div>

</div>

  <?php include 'bottomBar.php'; ?>

<?php

  $ownerEmail = 'john@lennon.com';

  require 'dbConnect.php';

  if (isset($_POST["eventName"], $_POST["eventDescription"], $_POST["eventDate"], $_POST["eventLocation"], $_POST["selectedCategory"])) {

    $eventName = $_POST["eventName"];
    $eventDescription = $_POST["eventDescription"];
    $eventDate = $_POST["eventDate"];
    $eventLocation = $_POST["eventLocation"];
    $selectedCategory = $_POST["selectedCategory"];

    // print_r($_POST);

    if ($eventName != "" && $eventDescription != "" && $eventDate != "" && $eventLocation != "" && $selectedCategory != "") {

      $sql = "INSERT INTO `events`(`Owner_Email`, `Event_Name`, `Description`, `Date`, `Location`, `Category_ID`)
      VALUES ('$ownerEmail', '$eventName', '$eventDescription', '$eventDate', '$eventLocation', '$selectedCategory')";

      if ($conn->query($sql) === TRUE) {

        echo "New event created!";

      } else {

        echo "Error: " . $sql . "<br>" . $conn->error;

      }

    }

    else {
      echo "Please enter information";
    }

  }

$conn->close();


?>

  </body>
</html>
