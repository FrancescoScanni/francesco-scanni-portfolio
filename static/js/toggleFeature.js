//variables
let para = document.querySelectorAll(".info");
let vectors=document.querySelectorAll(".vector");

//Exe function
function toggleFeature(index) {
    para[index].classList.toggle("expand");
    vectors[index].classList.toggle("rotateVector");
}
//EL on vector click
document.getElementById("vec1").addEventListener("click", function () {toggleFeature(0);});
document.getElementById("vec2").addEventListener("click", function () {toggleFeature(1);});
document.getElementById("vec3").addEventListener("click", function () {toggleFeature(2);});