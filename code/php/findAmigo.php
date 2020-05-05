<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../scss/findAmigo.css">
  <title>Find AMIGO</title>
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
    <!-- TODO: Change the onclick for the implemented amntching algorithm -->
    <button onclick="window.location.href='searchAmigo.php'" class="ctaButton" type="button" name="button">Find AMIGO</button>
  </div>

  <?php include 'bottomBar.php'; ?>

</body>

</html>
