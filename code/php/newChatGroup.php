<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>New chat group</title>
  </head>
  <body>

<h1>Create chat group</h1>

    <form action="newChatGroup.php" method="post">
      <label for="chatName">Write chat name</label>
      <input type="text" id="chatName" name="chatName" size="32" />
      <input type="submit" name="submit" value="Send" />
    </form>


<?php

  $chatName = "";

  require 'dbConnect.php';

  if (isset($_POST["chatName"])) {

    $chatName = $_POST["chatName"];

    if ($chatName != "") {

      $sql = "INSERT INTO `chat_group`(`Chat_Name`) VALUES ('$chatName')";

      if ($conn->query($sql) === TRUE) {

        echo "New chat created!";

      } else {

        echo "Error: " . $sql . "<br>" . $conn->error;

      }

    }

  }

$conn->close();


?>








  </body>
</html>
