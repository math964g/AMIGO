<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">
    <link rel="stylesheet" href="../scss/profile.css">
    <script src="../js/profile.js"></script>
    <title>Profile Page</title>
    <script
			  src="https://code.jquery.com/jquery-3.5.0.min.js"
			  integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ="
			  crossorigin="anonymous"></script>
  </head>
  <body>

    <section class="profileGrid">

      <article class="profileHeadline">
        <h1>My Profile</h1>
      </article>

      <article class="avatar-upload">

        <div class="avatar-edit">
           <input id="imageUpload" type='file' accept=".png, .jpg, .jpeg" />
           <label for="imageUpload"></label>
        </div>


       <div class="avatar-preview">
           <div id="imagePreview" style="background-image: url(http://i.pravatar.cc/500?img=7);">
           </div>
       </div>

     </article>


      <article class="nameNEducation">
        <h2>Name</h2>
        <br>
        <h3>Education</h3>
      </article>

      <article class="interest">
        <form id="interestForm" action="profile.includes.php" method="post">
          <select class="selectInterest" name="interest">
            <option value="placeholder">Chose interest</option>
            <option value="football">Football</option>
            <option value="computer">Computer</option>
            <option value="dancing">Dancing</option>
            <option value="party">Partying</option>
          </select>
        </form>

        <form action="index.html" method="post">
          <button form="interestForm" type="submit" name="add-interest">+</button>
        </form>


      </article>

    </section>

  </body>
</html>
