function changeBoxColor() {
  let box = document.getElementById("box").style;
  box.backgroundColor = "red";
  box.border = "5px solid blue";
}

function printDataToTheConsole(element) {
  //   element.style.backgroundColor = "red";
  console.log(element.value);
}

let hideBox = document.getElementById("hide-box");

hideBox.addEventListener("click", function (event) {
  // event.target == document.getElementById("hide-box")
  event.target.style.backgroundColor = "green";
  document.getElementById("box").style.display = "none";
});

const menu = document.getElementById('mobile-menu');
document.getElementById('open-menu').addEventListener('click', function () {
  menu.style.width = '500px';
});
document.getElementById('close-menu').addEventListener('click', function () {
  menu.style.width = '0';
});