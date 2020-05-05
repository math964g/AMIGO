console.log('%c wofSpin.js loaded successfully! ', 'color: #32fa3c');

let spinButton = document.getElementById("spinButton");
let circleRotation = document.getElementsByClassName("wof")[0];

let rotation = 0;
// Sets a variable to handle our interval
let spinner = null;
let addDegree = 360;
let spinStop = 0;

spinButton.addEventListener("click", spinMe);

// Function which calls for a spin
function spinMe() {
  spinStop = Math.floor(Math.random() * 360) + addDegree;

  // ----------------------------------------------------------
  // Makes it so you can only click the button once
  // IDEA: This should be remove later, when a check is implemented to see if the user is elgible for a spin
  spinButton.removeEventListener("click", spinMe);
  // ----------------------------------------------------------

  console.log("Spin to win bois");
  // Defining our variable to the interval we want to handle - Number is speed
  spinner = setInterval(spinDegree, 1);
}

// Handles the spinning part
function spinDegree() {
  console.log(spinStop);

  circleRotation.style.transform = "rotate(" + rotation + "deg)";
  rotation++;

  if (rotation >= spinStop) {
    // Using the spinner variable, we handle the setInterval inside the spinMe function
    clearInterval(spinner);

    if (rotation >= (0 + addDegree) && rotation <= (90 + addDegree)) {
      console.log("You won 60 tickets");
    }

    else if (rotation >= (90 + addDegree) && rotation <= (180 + addDegree)) {
      console.log("You won 200 tickets");
    }

    else if (rotation >= (180 + addDegree) && rotation <= (270 + addDegree)) {
      console.log("You won 20 tickets");
    }

    else if (rotation >= (270 + addDegree) && rotation <= (360 + addDegree)) {
      console.log("You won 40 tickets");
    }

    else {
      console.log("Unexpected error");
    }

    rotation = 0;
  }
}
