<?php

require "header.php";

 ?>

   <main>
     <div class="wrapper-main">
       <section class="section-default">
         <h1>Signup</h1>
         <form class="" action="includes/signup.inc.php" method="post">
            <input type="text" name="firstName" placeholder="First Name">
            <br>
            <input type="text" name="lastName" placeholder="Last Name">
            <br>
            <input type="text" name="birth" placeholder="Birthday">
            <br>
            <input type="radio" name="edu" value="1">  Multimediedesigner
            <input type="radio" name="edu" value="2">  Datamatiker
            <input type="radio" name="edu" value="3">  Finansøkonom
            <input type="radio" name="edu" value="4">  Markedsføringsøkonom
            <br>
            <input type="text" name="email" placeholder="Email">
            <br>
            <input type="password" name="password" placeholder="Password">
            <br>
            <input type="password" name="password-repeat" placeholder="Repeat Password">
            <br>
            <button type="submit" name="signup-submit">Signup</button>
         </form>
      </section>
      </div>
  </main>

 <?php

require "footer.php";

  ?>
