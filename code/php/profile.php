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
           <div id="imagePreview" style="background-image: url(http://i.pravatar.cc/500?img=7);">
           </div>
       </div>
     </section>



      <section class="nameNEducation">
        <h2>Name</h2>
        <br>
        <h3>Education</h3>
      </section>

      <?php include 'loadUserTags.php' ?>

      <section class="choseInterest">
        <form id="interestForm" action="includes/profile.includes.php" method="post">
          <select name="interest" placeholder="lasjdskla">
            <option value="placeholder">Chose interest</option>
            <option value="1">Hockey</option>
            <option value="2">Kage</option>
            <option value="3">Din Mor</option>
            <option value="4">Partying</option>
          </select>
        </form>

        <form action="includes/profile.includes.php" method="post">
          <button form="interestForm" type="submit" name="add-interest"> + </button>
        </form>

      </section>

      <section class="interestPlaceholder">

        <div class="holder1">
          <p> The placeholder</p>
        </div>

        <div class="holder2">
          <p> The placeholder</p>
        </div>

        <div class="holder3">
          <p> The placeholder</p>
        </div>

        <div class="holder4">
          <p> The placeholder</p>
        </div>

        <div class="holder5">
          <p> The placeholder</p>
        </div>

        <div class="holder6">
          <p>The placeholder</p>
        </div>

      </section>



    </section>

  </body>
</html>
