<?php

$server = "localhost";
$username = "root";
$password = "";
$database = "amigo_db";

$conn = mysqli_connect($server, $username, $password, $database);

$first = $_POST['first'];
$last = $_POST['last'];
$birth = $_POST['birth'];
$edu = $_POST['edu'];
$mail = $_POST['mail'];
$pw = $_POST['pw'];
$tickets = $_POST['tickets'];
$spin = $_POST['spin'];

$sql = "INSERT INTO users (First_Name, Last_Name, Birthday, Education, Email, Password, Tickets, Spin_Eligibility)
VALUES ('$first', '$last', '$birth', '$edu', '$mail', '$pw', '$tickets', '$spin')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}


?>
