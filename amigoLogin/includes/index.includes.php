<?php

  $DBserver = "localhost";
  $DBusername = "root";
  $DBpassword = "";
  $DBdatabase = "amigo_db";

  $conn = mysqli_connect($DBserver, $DBusername, $DBpassword, $DBdatabase);

  if (!isset($_POST['email'], $_POST['password']) ) {
         header("Location: ../index.php?error=emptyfields");
         exit();
  }

  if ($stmt = $conn ->prepare('SELECT Email, Password FROM users WHERE Email = ?')) {
    $stmt->bind_param('s', $_POST['email']);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
	  $stmt->bind_result($Email, $Password);
	  $stmt->fetch();

	   if ($_POST['password'] === $Password) {
     session_start();
     $_SESSION['email'] = TRUE;


     //Session er startet og tager user til ny destination er password === True
     //send evt. bruger til feed page.
     header("Location: ../index.php?login=successfully");
     exit();

	} else {
		echo 'Incorrect password!';
	}
} else {
	echo 'Incorrect username!';
}

    $stmt->close();
  }
