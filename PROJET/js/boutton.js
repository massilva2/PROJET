
var nb_benevoles = 95;
var nb_benevoles_span = document.getElementById("nb_benevoles");
var incr_btn1 = document.getElementById("incr_btn1");
var decr_btn1 = document.getElementById("decr_btn1");

var incr_btn2 = document.getElementById("incr_btn2");
var decr_btn2 = document.getElementById("decr_btn2");

var incr_btn3 = document.getElementById("incr_btn3");
var decr_btn3 = document.getElementById("decr_btn3");

incr_btn1.addEventListener("click", function() {
nb_benevoles++;
nb_benevoles_span.textContent = nb_benevoles;
});

decr_btn1.addEventListener("click", function() {
if (nb_benevoles > 0) {
    nb_benevoles--;
    nb_benevoles_span.textContent = nb_benevoles;
}
});


var nb_centres = 36;
var nb_centres_span = document.getElementById("nb_centres");
var incr_btn2 = document.getElementById("incr_btn2");
var decr_btn2 = document.getElementById("decr_btn2");

incr_btn2.addEventListener("click", function() {
nb_centres++;
nb_centres_span.textContent = nb_centres;
});

decr_btn2.addEventListener("click", function() {
if (nb_centres > 0) {
    nb_centres--;
    nb_centres_span.textContent = nb_centres;
}
});



var nb_lideurs = 23;
var nb_lideurs_span = document.getElementById("nb_lideurs");
var incr_btn3 = document.getElementById("incr_btn3");
var decr_btn3 = document.getElementById("decr_btn3");

incr_btn3.addEventListener("click", function() {
nb_lideurs++;
nb_lideurs_span.textContent = nb_lideurs;
});

decr_btn3.addEventListener("click", function() {
if (nb_lideurs > 0) {
    nb_lideurs--;
    nb_lideurs_span.textContent = nb_lideurs;
}
});

