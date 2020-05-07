<?php

session_start();

require '../dbConnect.php';

if (isset($_POST['add-interest'])) {

  $ownerEmail = 'awesome@mail.dk'; //test mail
  $interestID = $_POST['interest'];

  $sqlStmt = $conn->prepare("INSERT INTO user_interests (Email, Interest_ID)
  VALUES ('$ownerEmail', $interestID)");

  $sqlStmt -> execute();

  if ($conn -> connect_error) {
    die("connection failed: " .$conn->connect_error);
  }

  header("Location:../profile.php?success=InterestAdded");

}

 ?>
