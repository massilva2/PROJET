// Récupérer le bouton et la fenêtre modale
var btn = document.getElementById("loginBtn");
var modal = document.getElementById("loginModal");

// Récupérer le bouton de fermeture
var span = document.getElementsByClassName("close")[0];

// Ouvrir la fenêtre modale quand l'utilisateur clique sur le bouton
btn.onclick = function() {
  modal.style.display = "block";
}

// Fermer la fenêtre modale quand l'utilisateur clique sur le bouton de fermeture
span.onclick = function() {
  modal.style.display = "none";
}

// Fermer la fenêtre modale quand l'utilisateur clique en dehors de la fenêtre
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
