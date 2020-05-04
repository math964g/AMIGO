<?php

session_start();

$DBserver = "localhost";
$DBusername = "root";
$DBpassword = "";
$DBdatabase = "amigo_db";

$conn = mysqli_connect($DBserver, $DBusername, $DBpassword, $DBdatabase);

if (isset($_POST['add-interest'])) {

  $ownerEmail = 'awesome@mail.dk'; //test mail
  $interestID = $_POST['interest'];

  $sqlStmt = $conn->prepare("INSERT INTO user_interests (Email, Interest_ID)
  VALUES ('$ownerEmail', $interestID)");

  // $getInterest = $conn->prepare("SELECT Interest_Name FROM interests WHERE Email = $ownerEmail");
  // $sqlStmt -> bind_Param('si', $ownerEmail, $interestID);
  $sqlStmt -> execute();

  if ($conn -> connect_error) {
    die("connection failed: " .$conn->connect_error);
  }

  header("Location:../profile.php?success=InterestAdded");

  $userInterest = [];

  $userInterestData = "SELECT * FROM `user_interests` WHERE Email = '$ownerEmail';";
  $result = mysqli_query($conn, $userInterestData);
  $resultCheck = mysqli_num_rows($result);

  // If we have data in the database, by it being greater than 0, then we run the code
  if ($resultCheck > 0) {
    // We fetch each row of data, and insert it into our $row variable
    while ($row = mysqli_fetch_assoc($result)) {
      array_push($userInterest, $row['Interest_ID']);
    }
  }
  echo "WHAT THE FUCK MATE";
  print_r($userInterest);

}

 ?>
