<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>New event</title>
  </head>
  <body>

<h1>Create event</h1>

    <form action="createEvent.php" method="post">
      <label for="eventName">Event name: </label>
      <input type="text" id="eventName" name="eventName" size="32" />
      <br>

      <label for="eventDescription">Description: </label>
      <input type="text" id="eventDescription" name="eventDescription" size="32" />
      <br>

      <label for="eventDate">Date: </label>
      <input type="text" id="eventDate" name="eventDate" size="32" />
      <br>

      <label for="eventLocation">Location: </label>
      <input type="text" id="eventLocation" name="eventLocation" size="32" />
      <br>

      <input type="radio" name="selectedCategory" value="1"> Sport
      <input type="radio" name="selectedCategory" value="2">  Music
      <input type="radio" name="selectedCategory" value="3">  Food

      <input type="submit" name="submit" value="Send" />
    </form>


<?php

  $ownerEmail = 'john@lennon.com';

  require 'dbConnect.php';

  if (isset($_POST["eventName"], $_POST["eventDescription"], $_POST["eventDate"], $_POST["eventLocation"], $_POST["selectedCategory"])) {

    $eventName = $_POST["eventName"];
    $eventDescription = $_POST["eventDescription"];
    $eventDate = $_POST["eventDate"];
    $eventLocation = $_POST["eventLocation"];
    $selectedCategory = $_POST["selectedCategory"];

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
