console.log("categorySelector.js loaded successfully!");

let categories = document.getElementsByClassName("categoryItem");

for (var i = 0; i < categories.length; i++) {
  categories[i].addEventListener("click", clickMe);
}

function clickMe() {
  console.log(this);
  this.value
}
