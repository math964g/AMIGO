console.log('%c bottomBar.js loaded successfully! ', 'color: #32fa3c');

let menuOptions = document.getElementsByClassName("shortcutItem");
let burgerMenu = document.getElementById("burgerMenu");

for (let i = 0; i < menuOptions.length; i++) {
  menuOptions[i].addEventListener("click", menuActive);
}

function menuActive() {
  for (let i = 0; i < menuOptions.length; i++) {
    menuOptions[i].classList.remove("activeMenu");
  }

  this.classList.add("activeMenu");
}

burgerMenu.addEventListener("click", toggleNav);

function toggleNav() {
  console.log("toggling nav");
  document.getElementById("sideMenu").classList.toggle("navActive");

  // Toggles grey filter
  document.getElementById("grey_overlay").classList.toggle("filterActive");
}
