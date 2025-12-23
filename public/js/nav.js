// This file was created to assist with the navigation in mobile. and I have intentionally left my  debugging, to show some of my struggles, I had to overcome. 

"use strict";

console.log("nav.js FILE LOADED");
// alert("nav.js loaded");
document.addEventListener("DOMContentLoaded", function () {
    console.log("DOM ready");
  const toggle = document.querySelector(".nav-toggle");
  const nav = document.querySelector(".main-nav");
  console.log("toggle:", toggle);
  console.log("nav:", nav);


  if (!toggle || !nav) {
    console.error("Nav toggle or main nav not found");
    return;
  }

  toggle.addEventListener("click", function () {
    console.log("was clicked");
    nav.classList.toggle("open");
  });
});
