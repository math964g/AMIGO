<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">
    <link rel="stylesheet" href="../scss/profile.css">
    <!-- <script src="../js/profile.js"></script> -->
    <title>Profile Page</title>
    <script
			  src="https://code.jquery.com/jquery-3.5.0.min.js"
			  integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ="
			  crossorigin="anonymous"></script>
  </head>
  <body>

    <section class="profileGrid">



      <section class="profileHeadline">
        <h1>My Profile</h1>
      </section>



      <section class="avatar-upload">
        <div class="avatar-edit">
           <input id="imageUpload" type='file' accept=".png, .jpg, .jpeg" />
           <label for="imageUpload"></label>
        </div>



       <div class="avatar-preview">
           <div id="imagePreview" style="background-image: url();">
           </div>
       </div>
     </section>



      <section class="nameNEducation">
        <h2>University College Lillebælt</h2>
        <br>
        <p>(Image upload is under construction)</p>
      </section>



      <section class="choseInterest">
        <form id="interestForm" action="includes/profile.includes.php" method="post">
          <select name="interest" placeholder="lasjdskla">
            <option value="placeholder">Chose interest</option>
            <option value="1">Hockey</option>
            <option value="2">Kage</option>
            <option value="3">Fodbold</option>
          </select>
        </form>

        <form class="button" action="includes/profile.includes.php" method="post">
          <button form="interestForm" type="submit" name="add-interest"> + </button>
          <p>Hit the plus to insert your interest!</p>
        </form>

      </section>

      <section id="iPlaceholder" class="interestPlaceholder">

      </section>
      <?php include 'loadUserTags.php' ?>
      <?php include 'bottomBar.php' ?>


    </section>

  </body>
</html>
