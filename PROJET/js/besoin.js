// Récupération de la popup et du bouton pour l'ouvrir
var modal = document.getElementById("myModal");
var btn = document.getElementById("myBtn");

// Récupération du bouton pour fermer la popup
var span = document.getElementsByClassName("close")[0];

// Ouverture de la popup lorsqu'on clique sur le bouton
btn.onclick = function() {
  modal.style.display = "block";
}

// Fermeture de la popup lorsqu'on clique sur le bouton de fermeture
span.onclick = function() {
  modal.style.display = "none";
}

// Fermeture de la popup lorsqu'on clique en dehors de celle-ci
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
