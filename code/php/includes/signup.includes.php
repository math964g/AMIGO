<?php

$DBserver = "localhost";
$DBusername = "root";
$DBpassword = "";
$DBdatabase = "amigo_db";

$conn = mysqli_connect($DBserver, $DBusername, $DBpassword, $DBdatabase);

if (isset($_POST['signup-submit'])) {


  $firstName = $_POST['firstName'];
  $lastName = $_POST['lastName'];
  $birth = $_POST['birth'];
  $edu = $_POST['edu'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $passwordRepeat = $_POST['password-repeat'];

if (empty($firstName) || empty($lastName) || empty($birth) || empty($edu) || empty($email) || empty($password) || empty($passwordRepeat)) {
  header("Location: ../signup.php?error=emptyfields");
  exit();
}

else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  header("Location: ../signup.php?error=InvalidEmail");
  exit();
}

else if ($password !== $passwordRepeat) {
  header("Location: ../signup.php?error=CheckPassword");
  exit();
}

else {
  $sql = "INSERT INTO users (First_Name, Last_Name, Birthday, Education, Email, Password, Tickets, Spin_Eligibility)
  VALUES ('$firstName', '$lastName', '$birth', '$edu', '$email', '$password', 0, 0)";
}

if ($conn->query($sql) === TRUE) {
  header("Location: ../login.php?success=signupComplete");
  exit();

} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

}
