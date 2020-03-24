<?php

$server = "localhost";
$user = "root";
$pw = "";
$db = "amigo_db";
$conn = new mysqli($server, $user, $pw, $db);
$sql = "SELECT name, age FROM hero";
$result = $conn->query($sql);

// Create connection

// Check connection
if ($conn->connect_error) {

  die("Connection failed: " . $conn->connect_error);

}
echo "Connected successfully";

// if ($result->num_rows > 0) {
//
//   // Output data of each row
//   while ($row = $result->fetch_assoc()) {
//     echo $row["name"]. " - Age: " . $row["age"]. "<br/>";
//
//   }
// }
//
//   else {
//     echo "0 results";
//   }
  $conn->close();


?>
