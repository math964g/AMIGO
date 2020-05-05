<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../scss/searchAmigo.css">
  <title>Searching AMIGO</title>
</head>

<body>

  <div class="topBar">

    <div onclick="goBack()" class="returnButton">

      <div class="returnArrow"></div>

    </div>

    <h1>AMIGO</h1>

  </div>

  <div class="center_container">
    <div class="pulseBall">
      <img src="../../assets/ico/logo2.svg" alt="">
    </div>
    <p>Searching for Amigos...</p>
  </div>

  <?php session_start(); ?>
  <?php include 'bottomBar.php'; ?>
  <?php include 'matchingAlgorithm.php' ?>

</body>

</html>
