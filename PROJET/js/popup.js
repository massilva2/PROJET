const donorImage = document.querySelector('#donor-image');
const donorPopup = donorImage.nextElementSibling;
const donorCloseButton = donorPopup.querySelector('.close-button');
const donorUsernameInput = donorPopup.querySelector('#username');
const donorTelephoneInput = donorPopup.querySelector('#telephone');
const donorDisponibiliteInput = donorPopup.querySelector('#disponibilite');
const donorForm = donorPopup.querySelector('form');

const historyImage = document.querySelector('#history-image');
const historyPopup = historyImage.nextElementSibling;
const historyCloseButton = historyPopup.querySelector('.close-button');
const donationHistory = historyPopup.querySelector('#donation-history');

const logoutImage = document.querySelector('#logout-image');
const logoutPopup = logoutImage.nextElementSibling;
const logoutCloseButton = logoutPopup.querySelector('.close-button');
const logoutConfirmButton = logoutPopup.querySelector('#confirm-logout');

// Donor Popup
donorImage.addEventListener('click', () => {
  donorPopup.style.display = 'block';
});

donorCloseButton.addEventListener('click', () => {
  donorPopup.style.display = 'none';
});

// remplacer les valeurs factices par les valeurs de votre choix
donorUsernameInput.value = 'Nom d\'utilisateur';
donorTelephoneInput.value = '0123456789';
donorDisponibiliteInput.value = 'disponible';

donorForm.addEventListener('submit', (event) => {
  event.preventDefault(); // empêcher la soumission du formulaire
  // récupérer les valeurs des champs de saisie
  const username = donorUsernameInput.value;
  const telephone = donorTelephoneInput.value;
  const disponibilite = donorDisponibiliteInput.value;
  // faire quelque chose avec les valeurs récupérées
  console.log(`Nom d'utilisateur : ${username}, Téléphone : ${telephone}, Disponibilité : ${disponibilite}`);
  donorPopup.style.display = 'none'; // cacher la popup
});

// Donation History Popup
historyImage.addEventListener('click', () => {
  historyPopup.style.display = 'block';
});

historyCloseButton.addEventListener('click', () => {
  historyPopup.style.display = 'none';
});

// remplacer les valeurs factices par les valeurs de votre choix
const donations = ['Don 1', 'Don 2', 'Don 3'];
donations.forEach((donation) => {
  const li = document.createElement('li');
  li.textContent = donation;
  donationHistory.appendChild(li);
});

// Logout Popup
logoutImage.addEventListener('click', () => {
  logoutPopup.style.display = 'block';
});

logoutCloseButton.addEventListener('click', () => {
  logoutPopup.style.display = 'none';
});

logoutConfirmButton.addEventListener('click', () => {
  // faire quelque chose lors de la confirmation de la déconnexion
  console.log('Déconnexion confirmée');
  logoutPopup.style.display = 'none'; // cacher la popup
});














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









// Récupération de la popup et du bouton pour l'ouvrir
var modal = document.getElementById("myModal");
var btn = document.getElementById("myBtn");

// Récupération du bouton pour fermer la popup
var span = document.getElementsByClassName("close1")[0];

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
