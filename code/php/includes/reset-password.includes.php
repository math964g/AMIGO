<?php

  $DBserver = "localhost";
  $DBusername = "root";
  $DBpassword = "";
  $DBdatabase = "amigo_db";

  $conn = mysqli_connect($DBserver, $DBusername, $DBpassword, $DBdatabase);

  if (isset($_POST["reset-password-submit"])) {


  $selector = $_POST["selector"];
  $validator = $_POST["validator"];
  $password = $_POST["pwd"];
  $pwdRepeat = $_POST["pwd-repeat"];

  if (empty($password) || empty($pwdRepeat)) {
    header("Location: ../newPwd.php?newpwd=EmptyFields");
    exit();

  } else if ($password != $pwdRepeat) {
    header("Location: ../newPwd.php?newpwd=NotTheSamePassword");
    exit();
  }

  $currentDate = date("U");

  $sql = "SELECT * pwdreset WHERE pwdResetSelector=? AND pwdResetExpires >= ?";
  $stmt = mysqli_stmt_init($conn);
  if(!mysqli_stmt_prepare($stmt, $sql)){
    echo "There was an error!";
    exit();

  } else {

    mysqli_stmt_bind_param($stmt, "s", $selector);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);
    if (!$row = mysqli_fetch_assoc($result)) {
      echo "You need to re-submit your reset request.";
      exit();
    } else {
      $tokenBin = hex2bin($validator);
      $tokenCheck = password_verify($tokenBin, $row["pwdResetToken"]);

      if ($tokenCheck === false) {
      echo "You need to re-submit your reset request.";
      exit();
    } elseif ($tokenCheck === true) {

        $tokenEmail = $row['pwdResetEmail'];

        $sql = "SELECT * FROM users WHERE Email=?;";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
          echo "There was an error!";
          exit();

        } else {
          mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
          mysqli_stmt_execute($stmt);
          $result = mysqli_stmt_get_result($stmt);
          if (!$row = mysqli_fetch_assoc($result)) {
          echo "There was an error.";
          exit();
        } else {

          $sql = "UPDATE users SET Password=? WHERE Email=?";
          $stmt = mysqli_stmt_init($conn);
          if(!mysqli_stmt_prepare($stmt, $sql)) {
          echo "There was an error!";
          exit();
        } else {
          $newPwdHash = password_hash($password, PASSWORD_DEFAULT);
          mysqli_stmt_bind_param($stmt, "ss", $newPwdHash, $tokenEmail);
          mysqli_stmt_execute($stmt);



          $sql = "DELETE FROM pwdreset WHERE pwdResetEmail=?;";
          $stmt = mysqli_stmt_init($conn);
          if(!mysqli_stmt_prepare($stmt, $sql)) {
            echo "There was an error!";
            exit();
          } else {
            mysqli_stmt_bind_param($stmt, "s", $userEmail);
            mysqli_stmt_execute($stmt);
            header("Location../login.php?newPwd=PasswordUpdated");
              }
            }
          }
        }
      }
    }
  }
}



 ?>
