<?php
  session_start(); 
  include('bd/connexionDB.php'); 
  ini_set('display_errors','0');

  if(!isset($_SESSION['id'])){ 
    header('Location: index.php'); 
    exit; 
  }

  $afficher_profil = $DB->query(" SELECT *  FROM inscription WHERE id = ?", array($_SESSION['id']));
  
  $afficher_profil = $afficher_profil->fetch(); 




  
  if(!empty($_POST)){
      extract($_POST);
      $valid = true;
  
      if (isset($_POST["modification"])){
          $nom = htmlentities(trim($nom));
          $numero1 = htmlentities(trim($numero1));
          $mail = htmlentities(strtolower(trim($mail)));
          $ville = htmlentities(strtolower(trim($ville)));
          $typecnx = htmlentities(strtolower(trim($typecnx)));

      if(empty($nom)){
          $valid = false;
          $er_nom = "Il faut mettre un nom";
      }
      
      if(empty($numero1)){
          $valid = false;
          $er_numero1 = "Il faut mettre un numero";
      }
      
      if(empty($mail)){
          $valid = false;
          $er_mail = "Il faut mettre un mail";
          
          }elseif(!preg_match("/^[a-z0-9\-_.]+@[a-z]+\.[a-z]{2,3}$/i", $mail)){
          $valid = false;
          $er_mail = "Le mail n'est pas valide";
          
          }else{
          $req_mail = $DB->query("SELECT mail
          FROM inscription
          WHERE mail = ?",
          array($mail));

          $req_mail = $req_mail->fetch();

          if ($req_mail['mail'] <> "" && $_SESSION['mail'] != $req_mail['mail']){
          $valid = false;
          $er_mail = "Ce mail existe déjà";
          }

          if(empty($ville)){
              $valid = false;
              $er_ville = "Il faut mettre une ville";
          }

          if(empty($typecnx)){
              $valid = false;
              $er_typecnx = "Il faut mettre le type de contact";
          }
      }



  
      if ($valid){
      
          $DB->insert("UPDATE inscription SET nom = ?, mail = ?, numero1  = ?, ville = ?, typecnx = ?
          WHERE id = ?",
          array($nom, $mail, $numero1, $ville, $typecnx , $_SESSION['id']));
          $_SESSION['nom'] = $nom;
          $_SESSION['mail'] = $mail;
          $_SESSION['numero1'] = $numero1;
          $_SESSION['ville'] = $ville;
          $_SESSION['typecnx'] = $typecnx;

      
          header('Location: Compte.php');
          
          exit;
      }
  }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profil Utilisateur</title>
  <style>
    body {
      background-color: #f2f2f2;
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }

    h1{
  color: red;
  font-size: 24px;
  margin-bottom: 20px;
  text-align: center; 
  display: flex;
  align-items: center;
  justify-content: center; 
}
    

    #profile {
      max-width: 600px;
      margin: 20px auto;
      background-color: #ffffff;
      padding: 20px;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h2 {
      color: #333333;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 20px;
    }

    th, td {
      padding: 10px;
      text-align: left;
    }

    th {
      background-color: #eeeeee;
    }

    a.button {
      display: inline-block;
      padding: 10px 20px;
      background-color: #ff4d4d;
      color: #ffffff;
      text-decoration: none;
      border-radius: 5px;
      margin-top: 10px;
    }

    a.button:hover {
      background-color: #ff3333;
    }

    .logout {
      text-align: right;
    }

    .logout-link {
      color: #ff3333;
    }

    /* Styles pour la fenêtre modale */
    .modal {
      display: none;
      position: fixed;
      z-index: 1;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.4);
    }

    .modal-content {
      background-color: rgb(247, 225, 225);
      margin: 20px auto;
      padding: 20px;
      border: 1px solid #888;
      max-width: 400px;
      position: relative;
    }

    .modal-content label {
      display: block;
      margin-bottom: 10px;
    }

    .modal-content h2 {
      color: red;
      font-size: 24px;
      margin-bottom: 20px;
      
    }

    .modal-content input,
    .modal-content select {
      color: #000000;
      border: none;
      border-radius: 5px;
      padding: 10px;
      margin-bottom: 10px;
      width: 85%;
    }

    .modal-header {
      display: flex;
      align-items: center;
      justify-content: space-between;
      margin-bottom: 20px;
    }

    .modal-title {
      color: #333333;
      margin: 0;
      align-items: center;
    }

    .modal-close {
      color: #999999;
      cursor: pointer;
      font-size: 24px;
    }

    .modal-body {
      margin-bottom: 20px;
    }

    .modal-footer {
      text-align: right;
    }

    .modal-footer button {
      padding: 10px 20px;
      background-color: #ff4d4d;
      color: #ffffff;
      text-decoration: none;
      border: none;
      border-radius: 5px;
      cursor: pointer;  
      margin-right: 10px;
    }
    .modal-footer button:hover {
      background-color: #ff3333;
    }
</style>
</head>
<body>
<div id="profile">
   
    <h1> Bienvenue </h1>
    <form method="POST">
      <table>
        <tr>
          <th  >Nom</th>
          <td><?= $afficher_profil['nom'] ?></td>
        </tr>
        <tr>
          <th >Numéro de Téléphone</th>
          <td>
          <span><?= $afficher_profil['numero1'] ?></span>
          </td>
        </tr>
        <tr>
          <th>Email</th>
          <td><?= $afficher_profil['mail'] ?></td>
        </tr>
        <tr>
          <th>Ville</th>
          <td><?= $afficher_profil['ville'] ?></td>
        </tr>

        <tr>
          <th>Type de Contact</th>
          <td><?= $afficher_profil['typecnx'] ?></td>
        </tr>
        
      </table>

      <a class="button" href="#" onclick="openModal()">Modifier mon profil</a>

      <h2>Historique de Don de Sang</h2>
      <table>
        <tr>
          <th>Date</th>
          <th>Type de Don</th>
          <th>Lieu</th>
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td></td>
        </tr>
      </table>
      <div class="availability">
          <h2>Gestion de la Disponibilité</h2>
          <div class="checkbox-wrapper">
            <form method="POST">
              
              <input type="checkbox" id="availability-checkbox" checked>
              <label for="availability-checkbox">Disponible</label>
              <input type="checkbox" id="availability-checkbox" no-checked>
              <label for="availability-checkbox">Non Disponible</label>


            </form>
          </div>
          <p class="availability-text">Mettez à jour votre disponibilité pour les futurs dons de sang.</p>
        </div>
    </form>
    
    <p class="logout">
      <a class="button logout-link" href="index.php">Déconnexion</a>
    </p>
  </div>

  <div id="editModal" class="modal">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title"  >Modifier le Profil</h2>
        <span class="modal-close" onclick="closeModal()">&times;</span>
      </div>
      <form   method ="POST" action="">
        <div class="modal-body">
          <label for="name-input">Nom:</label>
          <input type="text" id="name-input" name="nom" value="<?php if(isset($nom)){ echo $nom; }else{ echo $afficher_profil['nom'];}?>">

          <label for="phone-input">Numéro de Téléphone:</label>
          <input type="text" id="phone-input" name="numero1" value="<?php if(isset($numero1)){ echo $numero1; }else{ echo $afficher_profil['numero1'];}?>"required>

          <label for="email-input">Email:</label>
          <input type="email" id="email-input" name="mail"value="<?php if(isset($mail)){ echo $mail; }else{ echo $afficher_profil['mail'];}?>">

          <label for="city-input">Ville:</label>
          <input type="text" id="city-input" name="ville"value="<?php if(isset($ville)){ echo $ville; }else{ echo $afficher_profil['ville'];}?>">


          <label for="contact-type-input">Type de Contact:</label>
          <input type="text" id="contact-type-input" name="typecnx" value="<?php if(isset($typecnx)){ echo $typecnx; }else{ echo $afficher_profil['typecnx'];}?>">
        </div>
        
        <div class="modal-footer">
          <button type="submit" name= "modification"  onclick="saveProfile()">Enregistrer</button>
          <a class="button" href="#" onclick="closeModal()">Annuler</a>
        </div>
     </form>
    </div>
    
  </div>
  </div>
  
  

  <script>
    function openModal() {
      document.getElementById('editModal').style.display = 'block';
    }

    function closeModal() {
      document.getElementById('editModal').style.display = 'none';
    }

    function saveProfile() {
      var newName = document.getElementById('name-input').value;
      var newPhone = document.getElementById('phone-input').value;
      var newEmail = document.getElementById('email-input').value;
      var newCity = document.getElementById('city-input').value;
      var newContactTime = document.getElementById('contact-time-input').value;
      var newContactType = document.getElementById('contact-type-input').value;
      closeModal();
    }
  </script>
</body>
</html>
