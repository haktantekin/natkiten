var bgColorInput;
var pinTextInput;
var defaultColor = "#222222";

window.addEventListener("load", bgColor, false);
window.addEventListener("load", pinTextColor, false);

function bgColor() {
  bgColorInput = document.querySelector("#bgColorInput");
  bgColorInput.value = defaultColor;
  bgColorInput.addEventListener("input", updateBGFirst, false);
  bgColorInput.addEventListener("change", updateBGAll, false);
  bgColorInput.select();
}

function pinTextColor() {
  pinTextInput = document.querySelector("#textColorInput");
  pinTextInput.value = defaultColor;
  pinTextInput.addEventListener("input", updateTextFirst, false);
  pinTextInput.addEventListener("change", updateTextAll, false);
  pinTextInput.select();
}
function updateBGFirst(eventBG) {
  var _pin = document.querySelector(".pin-container");
  if (_pin) {
    _pin.style.backgroundColor = eventBG.target.value;
  }
}

function updateBGAll(eventBG) {
  var _pin = document.querySelector(".pin-container");
  document.querySelectorAll(".pin-container").forEach(function (p) {
    _pin.style.backgroundColor = eventBG.target.value;
  });
}

function updateTextFirst(eventText) {
  var _pinText = document.querySelector(".pin-text");
  if (_pinText) {
    _pinText.style.color = eventText.target.value;
  }
}

function updateTextAll(eventText) {
  var _pinText = document.querySelector(".pin-text");
  document.querySelectorAll(".pin-text").forEach(function (p) {
    _pinText.style.color = eventText.target.value;
  });
}

function textInput() {
  // var x = document.getElementById("inputText").value;
  console.log(localStorage.getItem("quote"));
}

function authorInput() {
  // var x = document.getElementById("author").value;
}
document.addEventListener("DOMContentLoaded", function(){
document.querySelector(".pin-text").innerHTML = localStorage.getItem("quote");
document.querySelector(".author-text").innerHTML = localStorage.getItem("author");
});

function download() {
  document.body.scrollTop = 0; 
  document.documentElement.scrollTop = 0;
  var container = document.getElementById("pin-container");
  html2canvas(container, { allowTaint: true }).then(function (canvas) {
    var link = document.createElement("a");
    document.body.appendChild(link);
    link.download = "html_image.jpg";
    link.href = canvas.toDataURL();
    link.target = '_blank';
    link.click();
  });
}
 
function changeFont(font){
  document.querySelector("body").style.fontFamily = font.value;
}