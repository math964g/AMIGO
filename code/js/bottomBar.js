console.log('%c bottomBar.js loaded successfully! ', 'color: #32fa3c');

let menuOptions = document.getElementsByClassName("shortcutItem");

for (let i = 0; i < menuOptions.length; i++) {
  menuOptions[i].addEventListener("click", menuActive);
}

function menuActive() {
  for (let i = 0; i < menuOptions.length; i++) {
    menuOptions[i].classList.remove("activeMenu");
  }

  this.classList.add("activeMenu");
}
