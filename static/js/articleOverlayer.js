//variables
let lastArticles = document.querySelectorAll(".lastArt");
let overlay = document.querySelector(".overlay");
let seeMore = document.querySelector(".seeMore");
//renderize onload
document.addEventListener("DOMContentLoaded", function () {
    for (let i = 0; i < lastArticles.length; i++) {
        lastArticles[i].classList.toggle("removeSdw");
    }
});
//see more button
seeMore.addEventListener("click", function () {
    showOthArticles();
});

//showing articles
function showOthArticles() {
    for (let i = 0; i < lastArticles.length; i++) {
        lastArticles[i].classList.toggle("removeSdw");
        lastArticles[i].classList.toggle("lastA");
    }
    overlay.style.visibility = "hidden";
    seeMore.style.display = "none";
}