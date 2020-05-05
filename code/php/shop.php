<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../scss/master.css">
  <link rel="stylesheet" href="../scss/shop.css">
  <title>Amigo shop</title>
</head>

<body>

  <div class="topBar">

    <div onclick="goBack()" class="returnButton">

      <div class="returnArrow"></div>

    </div>

    <h1>AMIGO</h1>

  </div>

  <div class="wof_container">

    <div class="arrow_container">
      <div class="prizeArrow"></div>
    </div>

    <div class="wof">
      <div class="middle"></div>
      <div class="sector one">
        <p>60</p>
      </div>
      <div class="sector two">
        <p>40</p>
      </div>
      <div class="sector three">
        <p>200</p>
      </div>
      <div class="sector four">
        <p>20</p>
      </div>
    </div>

  </div>

  <button id="spinButton" class="ctaButton" type="button" name="button">Spin</button>

    <?php include 'bottomBar.php'; ?>

  <script src="../js/wofSpin.js"></script>

</body>

</html>
