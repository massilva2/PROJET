<?php

$password1 ='$2y$12$q63l9hLmsZn2cQH1NM3d6OdjePsc0Y/hhvNDlWtuKIZ9Wws3B.oaC';
  // Vérification si le formulaire a été soumis
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération des données saisies dans le formulaire
    $pseudo = $_POST["pseudo"];
    $mdp = $_POST["mdp"];
    $_SESSION['mdp'] = "password";
    // Vérification si les identifiants sont corrects
    if ($pseudo === "admin" && password_verify($_POST["mdp"], $password1)) {
      // Si les identifiants sont corrects, on redirige vers la page d'accueil de l'admin
      header("Location: admin.php");
      
      exit();
    } else {
      // Si les identifiants sont incorrects, on affiche un message d'erreur
      $message = "Nom d'utilisateur ou mot de passe incorrect";
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Espace de connexion admin</title>
  <link rel="stylesheet" href="stylecnx.css">
  <style>
    body {

background-color: #f2f2f2;
background-repeat: no-repeat;
background-size: 100%;
}


h1 {
text-align: center;
margin: 10;
color: #800000;
}



main {
max-width: 600px;
margin: 50px auto;
background-color: #fff;
padding: 20px;
border-radius: 5px;
box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
}


form {
display: flex;
flex-direction: column;
}

label {
display: flex;
margin-bottom: 10px;
}

input{
color: #000000;
border: none;
border-radius: 5px;
padding: 10px;
cursor: pointer;
border: 2px solid #ccc;
}

button[type="submit"] {
background-color: #800000;
color: #fff;
border: none;
border-radius: 5px;
padding: 10px;
cursor: pointer;
}

button[type="submit"]:hover {
background-color: #dd0e07;
}

a {
text-decoration: none;
color: #800000;
}
@media screen and (max-width: 600px) {
/* Styles spécifiques pour les appareils avec une largeur maximale de 600px */
form {
  max-width: 300px;
}
}
  </style>
</head>
<body>
<main>
    <header>
      <h1>Espace Admin</h1>
    </header>
  <br>
    <form method="POST" action="" align="center">
      <label for="email">Nom d'utilisateur : </label>
      <input type="text" name="pseudo"  required ><br>

      <label for="password">Mot de passe :</label>
      <input type="password" name="mdp"  required> <br>

      <button type="submit">Se connecter</button>
    </form>
  </main>
  


  <?php
    // Affichage du message d'erreur (s'il y en a un)
    if (isset($message)) {
      echo "<p class=\"message\">$message</p>";
    }
  ?>
  <style>
   .message {
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -150%);
    background-color: gray;
    padding: 20px;
    text-align: center;
    border: none;
  }
  </style>
</body>
</html>


