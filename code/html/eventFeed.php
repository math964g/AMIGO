<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../scss/main.css">
  <title></title>
</head>

<body>

  <div class="topBar">

    <div class="returnButton">

      <div class="returnArrow"></div>

    </div>

    <h1>AMIGO</h1>

    <div class="addEvent">

      <div class="lineVertical"></div>
      <div class="lineHorizontal"></div>

    </div>

  </div>

  <div class="categorySlider">

    <div class="categoryItem active">
      <p>All</p>
    </div>

    <div class="categoryItem">
      <p>Food</p>
    </div>

    <div class="categoryItem">
      <p>Sport</p>
    </div>

    <div class="categoryItem">
      <p>Music</p>
    </div>

    <div class="categoryItem">
      <p>Video Games</p>
    </div>

    <div class="categoryItem">
      <p>Summer</p>
    </div>


  </div>

  <div class="eventFeed">

    <?php include '../php/retrieveEvents.php'; ?>

  </div>

  <div class="footerBar">

    <div class="footerColumn">

      <h2>Social media</h2> <br>
      <p>Facebook</p>
      <p>Instagram</p>
      <p>Twitter</p>

    </div>

    <div class="footerColumn">

      <h2>About us</h2> <br>
      <p>Job</p>
      <p>FAQ</p>
      <p>Support</p>
      <p>Contact</p>
      <p>Feedback</p>

    </div>

  </div>

  <script src="../js/categorySelector.js">

  </script>

</body>

</html>
