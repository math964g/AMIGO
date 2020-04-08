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













//
//   if (isset($_POST['login-submit'])) {
//
//   $loginMail = $_POST['email'];
//   $loginPassword = $_POST['password'];
//
//   if (empty($loginMail) || empty($loginPassword)) {
//     header("Location: ../index.php?error=emptyfields");
//     exit();
//   }
//
//   else {
//     $sql = "SELECT * FROM users WHERE Email=?; ";
//     $stmt = mysqli_stmt_init($conn);
//     if (!mysqli_stmt_prepare($stmt, $sql)) {
//       header("Location: ../index.php?error=sqlerror");
//       exit();
//     }
//     else {
//       mysqli_stmt_bind_param($stmt, "ss", $loginMail, $loginMail);
//       mysqli_stmt_execute($stmt);
//       $result = mysqli_stmt_get_result($stmt);
//       if ($row = mysqli_fetch_assoc($result)) {
//         $pwdCheck = password_verify($loginPassword, $row['password']);
//         if ($pwdCheck == false) {
//           header("Location: ../index.php?error=wrongPassword");
//           exit();
//         }
//         else if ($pwdCheck == true){
//           session_start();
//           $_SESSION['userMail'] = $row['Email'];
//
//           header("Location: ../index.php?login=successfully");
//           exit();
//         }
//       }
//       else {
//         header("Location: ../index.php?error=noUser");
//         exit();
//       }
//     }
//   }
// }
