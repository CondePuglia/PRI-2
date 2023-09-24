const dataSpan = document.querySelector(".data");
const immersusSpan = document.querySelector(".immersus");

const textData = "Data";
const textImmersus = "Immersus";
const typingDelay = 600;
const erasingDelay = 300;
const newTextDelay = 2000; // Delay between current and next text
let charIndexData = 0;
let charIndexImmersus = 0;

function typeDataAndImmersus() {
  if (charIndexData < textData.length || charIndexImmersus < textImmersus.length) {
    if (charIndexData < textData.length) {
      dataSpan.textContent += textData.charAt(charIndexData);
      charIndexData++;
    }
    if (charIndexImmersus < textImmersus.length) {
      immersusSpan.textContent += textImmersus.charAt(charIndexImmersus);
      charIndexImmersus++;
    }
    setTimeout(typeDataAndImmersus, typingDelay);
  } else {
    setTimeout(eraseDataAndImmersus, newTextDelay);
  }
}

function eraseDataAndImmersus() {
  if (charIndexData > 0 || charIndexImmersus > 0) {
    if (charIndexData > 0) {
      dataSpan.textContent = textData.substring(0, charIndexData - 1);
      charIndexData--;
    }
    if (charIndexImmersus > 0) {
      immersusSpan.textContent = textImmersus.substring(0, charIndexImmersus - 1);
      charIndexImmersus--;
    }
    setTimeout(eraseDataAndImmersus, erasingDelay);
  } else {
    setTimeout(typeDataAndImmersus, typingDelay);
  }
}

document.addEventListener("DOMContentLoaded", function () {
  setTimeout(typeDataAndImmersus, newTextDelay + 250);
});
