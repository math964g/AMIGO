console.log('%c wofSpin.js loaded successfully! ', 'color: #32fa3c');

let spinButton = document.getElementById("spinButton");
let circleRotation = document.getElementsByClassName("wof")[0];

let rotation = 0;
// Sets a variable to handle our interval
let spinner = null;

spinButton.addEventListener("click", spinMe);

// Function which calls for a spin
function spinMe() {
  
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
  if (rotation >= 360) {
    // Using the spinner variable, we handle the setInterval inside the spinMe function
    clearInterval(spinner);
    rotation = 0;
  }

  circleRotation.style.transform = "rotate(" + rotation + "deg)";
  rotation++;
}
