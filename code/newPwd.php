<?php

 ?>

 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie-edge">
     <title>New Password</title>
   </head>
   <body>

     <main>
       <div class="wrapper-main">
         <section class="section-default">

           <?php

            $selector = $_GET["selector"];
            $selector = $_GET["validator"];

            if (empty($selector) || empty($validator)) {
              echo "could not validate your request!";
            }
            else {
              if (ctype_xdigit($selector) !== false && ctype_xdigit($validator) !== false) {

                ?>

                <form id="newpwdform" action="includes/forgotpwd.includes.php" method="post">
                  <input type="hidden" name="selector" value="<?php echo $selector ?>">
                  <input type="hidden" name="validator" value="<?php echo $selector ?>">
                  <input type="password" name="pwd" placeholder="Enter a new password...">
                  <input type="password" name="pwd-repeat" placeholder="Repeat new password...">
                </form>

                <form action="includes/forgotpwd.includes.php" method="post">
                  <button class="ctaButton" form="newpwdform" type="submit" name="newPwdSubmit">Reset password</button>
                </form>

                <?php

              }
            }

            ?>




         </section>
       </div>
     </main>

   </body>
 </html>
