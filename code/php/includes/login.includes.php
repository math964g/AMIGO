<?php
  session_start();

  require '../dbConnect.php';
  if (!isset($_POST['Email'], $_POST['Password'])) {
    header("Location: ../login.php?error=emptyfields");
    exit();
  }

  if ($stmt = $conn->prepare('SELECT Email, Password FROM users WHERE Email = ?')) {

	$stmt->bind_param('s', $_POST['Email']);
	$stmt->execute();

	$stmt->store_result();

  if ($stmt->num_rows > 0) {
	$stmt->bind_result($Email, $Password);
	$stmt->fetch();


	  if ($_POST['Password'] === $Password) {
    $_SESSION['username'] = $_POST['Email'];
    header("Location: ../eventFeed.php");
	 }

   else {
    header("Location: ../login.php?error=WrongPassword");
    exit();
	}


  } else {
    header("Location: ../login.php?error=WrongEmail");
    exit();
  }


	 $stmt->close();
    }
