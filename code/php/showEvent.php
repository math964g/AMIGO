<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../scss/master.css">
    <link rel="stylesheet" href="../scss/showEvent.css">
    <title>Show event</title>
  </head>
  <body>

    <div class="topBar">

      <div class="returnButton">

        <div class="returnArrow"></div>

      </div>

      <h1>AMIGO</h1>

      <div class="editEvent">

        <div class="lineVertical"></div>
        <div class="lineHorizontal"></div>

      </div>

    </div>

<div class="eventContainer">

  <div class="eventPicture"></div>

  <div class="eventDetailBox">

    <h2 class="eventHeader">Kage nede på Nelle's</h2>

    <div class="eventTime">
      <p>10. April - 11:22</p>
    </div>

    <div class="eventParticipation">

      <div class="participantNumber">
        12 people are going
      </div>

      <div class="participantPictures">
        <img src="../../assets/profile_pic/1.png" alt="1">
        <img class="profileMini" src="../../assets/profile_pic/2.png" alt="2">
        <img class="profileMini" src="../../assets/profile_pic/3.png" alt="3">
      </div>

      <p class="showMore">Show</p>

      <button id="joinBtn" class="ctaButton" type="button" name="button">Join</button>

    </div>

    <div id="borderline"></div>

    <h3>Event details</h3>

    <p id="eventDetailText">Jens hansen havde en bondegård i åh i åh årrrh Jens hansen havde en bondegård i åh i åh årrrh Jens hansen havde en bondegård i åh i åh årrrh Jens hansen havde en bondegård i åh i åh årrrh Jens hansen havde en bondegård i åh i åh årrrh</p>

  </div>

</div>

  <div class="bottomBar">

    <div class="shortcutItem">
      <img src="../../assets/ico/user.svg" alt="Event icon">
    </div>

    <div class="shortcutItem">
      <img src="../../assets/ico/calender.svg" alt="Calender icon">
    </div>

    <div class="shortcutItem">
      <img src="../../assets/ico/comment.svg" alt="Chat icon">
    </div>

    <div class="shortcutItem">
      <img src="../../assets/ico/user.svg" alt="Menu icon">
    </div>

    <script src="../js/bottomBar.js"></script>

  </div>

  </body>
</html>


<script>

// Retrieves the clicked event object from sessionStorage
let eventList = JSON.parse(sessionStorage.getItem("eventCollection"));

console.log(eventList);

</script>
