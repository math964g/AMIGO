<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Save Message</title>
  </head>
  <body>

<h1>Send new message</h1>

    <form action="saveMessage.php" method="post">
      <label for="userMessage">Write your message</label>
      <input type="text" id="userMessage" name="userMessage" size="32" />
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

    $chatId = 0;
    $userEmail = "";
    $msgId = 1;
    $timestamp = date('Y-m-d H:i:s');
    $msgDetails = "";
    $insertmsg = "INSERT INTO message (Chat_ID, Email, Message_ID, Timestamp, Details) VALUES ($chatId, $userEmail, $msgId, $timestamp, $msgDetails)";
    // If the code doesn't work, comment out the line under this one
    // $result = $conn->query($insertmsg);

    // You dont have to increment in PHP - SQL has an option called auto increment (A_I), which basically does what it says.
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
