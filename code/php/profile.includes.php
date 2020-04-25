<?php

$DBserver = "localhost";
$DBusername = "root";
$DBpassword = "";
$DBdatabase = "amigo_db";

$conn = mysqli_connect($DBserver, $DBusername, $DBpassword, $DBdatabase);

if (isset($_POST['add-interest'])) {

  $interest = $_POST ['interest'];
  $sql = "INSERT INTO interests (Interest_Name) VALUES ('$interest')"
  header("Location: profile.php?interest=added")
  exit();
}






 ?>
