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
  VALUES (?, ?)");

  $sqlStmt -> bind_Param('si', $ownerEmail, $interestID);
  $sqlStmt -> execute();


  if ($conn -> query($sqlStmt) === FALSE) {
    header("Location:../profile.php?success=InterestAdded");
    exit();
  }

}



 ?>
