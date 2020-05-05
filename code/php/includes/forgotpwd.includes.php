<?php

require '../dbConnect.php';

if (isset($_POST["reset-request-submit"])) {


  $selector = bin2hex(random_bytes(8));
  $token = random_bytes(32);

  $url = "amigoLogin/newPwd.php?selector=" . $selector . "&validator=" .
  bin2hex($token);

  $expires = date("U") + 1800;

  $userEmail = $_POST["email"];

  $sql = "DELETE FROM pwdreset WHERE pwdResetEmail=?;";
  $stmt = mysqli_stmt_init($conn);
  if(!mysqli_stmt_prepare($stmt, $sql)){
    echo "There was an error!";
    exit();
  } else {
    mysqli_stmt_bind_param($stmt, "s", $userEmail);
    mysqli_stmt_execute($stmt);
  }

  $sql = "INSERT INTO pwdreset (pwdResetEmail, pwdResetSelector, pwdResetToken, pwdResetExpires) VALUES (?, ?, ?,
    ?);";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
      echo "There was an error!";
      exit();
    } else {
      $hashedToken = password_hash($token, PASSWORD_DEFAULT);
      mysqli_stmt_bind_param($stmt, "ssss", $userEmail, $selector, $hashedToken, $expires);
      mysqli_stmt_execute($stmt);
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);

    $to = $userEmail

    $subject= 'Reset your password for Amigo';

    $message = '<p> Vi har modtaget en forspørgsel på ændring af password. Har du ikke sendt denne forspørgsel kan du blot ignorere denne besked </p>';

    $message .= '<p>Her er dit link til at gendanne dit password </br>';
    $message .= '<a href=""' . $url . '">' . '</a></p>';


    $headers = "From: AmigoSupport <AmigoSupport@gmail.com>\r\n";
    $headers .= "Reply-To: AmigoSupport@gmail.com\r\n";
    $headers .= "Content-type: text/html\r\n";

    mail($to, $subject, $message, $headers);

    header("Location: ../forgotpwd.php?reset=success");

}
  else {
    header("Location../login.php");
  }
 ?>
