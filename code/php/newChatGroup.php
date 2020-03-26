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

// if (isset($_POST["userMessage"])) {
//
//   $cheese = $_POST["userMessage"];
//
//   echo $cheese;
//
// }


// Save data

  require 'dbConnect.php';

    $server = "localhost";
    $user = "root";
    $pw = "";
    $db = "amigo_db";
    // Create connection
    $conn = new mysqli($server, $user, $pw, $db);
    $chatId = 0;
    $userEmail = "";
    $msgId = 1;
    $timestamp = date('Y-m-d H:i:s');
    $msgDetails = "";
    $insertmsg = "INSERT INTO message (Chat_ID, Email, Message_ID, Timestamp, Details) VALUES ($chatId, $userEmail, $msgId, $timestamp, $msgDetails)";
    $result = $conn->query($insertmsg);

    // Auto increment is a thing, in the database. Don't do this again, noob
    // Get the highest msgID
    $getMsgId = "SELECT MAX(Message_ID) as 'high_chat_id' FROM (message)";
    $res = mysqli_query($conn, $getMsgId);
    $data = mysqli_fetch_array($res);

    echo "Chat ID: " . $data['high_chat_id'];




    // Check connection
    if ($conn->connect_error) {

      die("Connection failed: " . $conn->connect_error);

    }
    // echo "Connected successfully";

    if (isset($_POST["userMessage"])) {

      $msgDetails = $_POST["userMessage"];

      if ($msgDetails != "") {

        $chatId = 1;
        $userEmail = "john@lennon.com";
        $msgId = $data['high_chat_id'] + 1;

        $sql = "INSERT INTO message (Chat_ID, Email, Message_ID, Details)
        VALUES ('$chatId', '$userEmail', '$msgId', '$msgDetails')";

        if ($conn->query($sql) === TRUE) {
          echo "New record created successfully";
        } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
        }
      }
    }


    $conn->close();


    ?>








  </body>
</html>
