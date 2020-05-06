<div id="grey_overlay"></div>

<div class="bottomBar">

  <!-- TODO: Make the color/class active if you're on the specific page -->
    <div class="shortcutItem">
      <a href="/code/php/eventFeed.php">
        <img src="../../assets/ico/flag.svg" alt="Event icon">
      </a>
    </div>

  <div class="shortcutItem">
    <img src="../../assets/ico/calender.svg" alt="Calender icon">
  </div>

  <div class="shortcutItem">
    <img src="../../assets/ico/comment.svg" alt="Chat icon">
  </div>

  <div id="burgerMenu" class="shortcutItem">
    <div class="line one"></div>
    <div class="line two"></div>
    <div class="line three"></div>
  </div>

  <script src="../js/bottomBar.js"></script>

</div>


<div class="burgerMenu_container">
  <div id="sideMenu">
    <div class="content_container">

      <div class="profile">
        <img src="../../assets/profile_pic/2.png" alt="">
        <div class="profile_info">
          <h4>Caroline Hansen</h4>
          <p>Tickets: 600</p>
        </div>
      </div>

      <div class="line"></div>

      <div class="options">
          <div onclick="window.location.href='findAmigo.php'" class="menuPoint">
            <img src="../../assets/ico/loupe_orange.svg" alt="">
            <h3>Find AMIGO</h3>
          </div>
          <div onclick="window.location.href='createEvent.php'" class="menuPoint">
            <img src="../../assets/ico/calender_orange.svg" alt="">
            <h3>Create event</h3>
          </div>
        <div class="menuPoint">
          <img src="../../assets/ico/friends_orange.svg" alt="">
          <h3>Things to do</h3>
        </div>
          <div onclick="window.location.href='shop.php'" class="menuPoint">
            <img src="../../assets/ico/wheel_orange.svg" alt="">
            <h3>Lykkehjulet</h3>
          </div>
        <div class="menuPoint">
          <img src="../../assets/ico/medal_orange.svg" alt="">
          <h3>Rewards</h3>
        </div>
          <div onclick="window.location.href='profile.php'" class="menuPoint">
            <img src="../../assets/ico/user_orange.svg" alt="">
            <h3>Profile</h3>
          </div>
      </div>

      <div class="line"></div>

      <div class="settings">
        <p>Contact</p>
        <p>Settings</p>
        <p>Log out</p>
      </div>

    </div>
  </div>
</div>

<!-- DELETE: For testing only -->
<!-- <script>toggleNav();</script> -->
