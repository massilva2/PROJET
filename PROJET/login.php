<?php
  session_start();
  include("bd/connexionDB.php");
  ini_set('display_errors','0');
  

  if(!empty($_POST)){
  extract($_POST);
  $valid = true;
  
  if (isset($_POST['connexion'])){
  $mail = htmlentities(strtolower(trim($mail)));
  $userPassword= trim($userPassword);
  
  if(empty($mail)){ 
  $valid = false;
  $er_mail = "Il faut mettre un mail";
  }
  
  if(empty($userPassword)){
  $valid = false;
  $er_mdp = "Il faut mettre un mot de passe";
  }
  
  $req = $DB->query("SELECT *
  FROM inscription WHERE mail = ? AND userPassword = ?", array($mail, crypt($userPassword, "$6$500iuytrdxcvbnmjhytgfdt$")));
  $req = $req->fetch();
  if($req['id'] == ""){
  $valid = false;
  $er_mail = "Le mail ou le mot de passe est incorrecte";
  }
  
  
  if($req['token'] <> NULL){
  $valid = false;
  $er_mail = "Le compte n'a pas été validé";	
  }
  

  if ($valid){
  $_SESSION['id'] = $req['id']; 
  $_SESSION['nom'] = $req['nom'];
  $_SESSION['mail'] = $req['mail'];
  $_SESSION['numero1'] = $req['numero1'];
  $_SESSION['groupesanguin'] = $req['groupesanguin'];

  
  
  header('Location: Compte.php');
  exit;
  }
  }
  }
  ?>



<!DOCTYPE html>
<html>
<head>
	<title>Connexion</title>
    <style>
      body {

      background-color: #f2f2f2;
      background-image: url("img/image.jpg");
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

      input[type="email"], input[type="password"] {
      padding: 10px;
      margin-bottom: 20px;
      border-radius: 5px;
      border: none;
      background-color: #f4f4f4;
      }

      button {
      background-color: #800000;
      color: #fff;
      border: none;
      border-radius: 5px;
      padding: 10px;
      cursor: pointer;
      }

      button:hover {
      background-color: #dd0e07;
      }
      @media (max-height: 600px) {
      /* Styles for tablets and smaller devices */
      main {
        margin: 20px;
      }
      body{
       background-color:  rgb(247, 225, 225);
      }

      }

      @media only screen and (max-width: 400px) {
        /* Styles for mobile devices */

        main {
         
          margin: 10px;
          padding: 10px;
        }
      }
    </style>
</head>
<body>
<main>
    <header>
      <h1>Se connecter</h1>
    </header>
    <br>
    <form method="POST">
      <label for="email">Adresse email :</label>

      <?php
      if (isset($er_mail)){
      ?>
      <div><?= $er_mail ?></div>
      <?php
      }
      ?>
      
      <input type="email" placeholder="Adresse mail" name="mail"  required>

      <label for="password">Mot de passe :</label>

      <?php
      if (isset($er_mdp)){
      ?>
      <div><?= $er_mdp ?></div>
      <?php
      }
      ?>

      <input type="password" placeholder="Mot de passe" name="userPassword" required>
      <button type="submit" name="connexion">Se connecter</button>
    </form>
    <p>Pas encore inscrit ? <a href="Formulaire.php">Créer un compte</a></p>
    </main>
</body>



