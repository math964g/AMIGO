<?php

session_start();

$DBserver = "localhost";
$DBusername = "root";
$DBpassword = "";
$DBdatabase = "amigo_db";

$conn = mysqli_connect($DBserver, $DBusername, $DBpassword, $DBdatabase);

if (isset($_POST['add-interest'])) {


  $ownerEmail = $_SESSION['name'];
  $interestID = $_POST['interest'];

  if (empty($interest)) {
    header("Location: ../profile.php?error=noInterestAdded");
    exit();
  }

  else {
    $sql = "INSERT INTO user_interests (Email, Interest_ID)
    VALUES ('$ownerEmail', '$interestID')";
  }

  if ($conn->query($sql) === TRUE) {
    header("Location: ../profile.php?success");
    exit();

  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

}


 ?>
