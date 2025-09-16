<?php
  session_start(); 
  include('../bd/connexionDB.php'); 
  // On récupère les informations de tous les utilisateurs
  $afficher_profils = $DB->query("SELECT * FROM inscription");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="styleAdmin.css">

</head>
<body>

<style>
      /* Styles pour la barre de navigation */
      .navbar {
      background-color: black;
      overflow: hidden;
    }

    .navbar a {
      float: left;
      display: block;
      color: white;
      text-align: center;
      padding: 14px 16px;
      text-decoration: none;
      font-size: 17px;
    }

    .navbar a:hover {
      background-color: #ddd;
      color: #000;
    }

    .navbar a.active {
      background-color: black;
      color: white;
    }

    /* Styles pour la navigation responsive */
    @media screen and (max-width: 600px) {
      .navbar a {
        float: none;
        display: block;
        text-align: left;
      }

      .navbar-right {
        float: none;
      }
    }
       /* Styles pour le bouton de déconnexion */
       .logout-button {
      float: right;
      margin-right: 20px;
    }

    .logout-button a {
      display: inline-block;
      color: #fff;
      text-decoration: none;
      padding: 10px;
      border: 1px solid #000;
    }

    .logout-button a:hover {
      background-color: #000;
      color: #fff;
    }
    form .btn-reply{
      display: inline-block;
      padding: 10px 20px;
      background-color: black;
      color: white;
      text-decoration: none;
      border-radius: 4px;
      border: none;
      cursor: pointer;
      font-size: 16px;
    }
    form .btn-reply:hover{
      background-color: black;
    }
    .btn-reply {
      display: inline-block;
      padding: 10px 20px;
      background-color: black;
      color: white;
      text-decoration: none;
      border-radius: 4px;
      border: none;
      cursor: pointer;
      font-size: 16px;
    }

    .btn-reply:hover {
      background-color: black;
    }

    input {
      color: #000000;
      
      border-radius: 5px;
      border:black;
      padding: 10px;
      margin-bottom: 10px;

      
    }


    
</style>
   <div class="navbar">
      <a class="active" href="#1">Gestion des Utilisateurs</a>
      <a href="#2">Gestion Messages </a>
      <a href="#3">Gestion des Notification</a>
      <a href="#4" class="navbar-right">Gestion des evenement</a>
      <div class="logout-button">
      <a href="connexion.php">Déconnexion</a>
    </div>
    </div>
    <div class="user-management">
    <section id="1" >
        <h2>Gestion des Utilisateurs</h2>
        <table>
            <thead>
              <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Numero</th>
                <th>Adresse E-mail</th>
                <th>Groupe Sanguin</th>
                <th>Statut</th>

                
              </tr>
            </thead>
            <tbody>
            <?php while ($afficher_profil = $afficher_profils->fetch()) { ?>
              <tr>
                <td><?= $afficher_profil['id'] ?></td>
                <td><?= $afficher_profil['nom'] ?></td>
                <td><?= $afficher_profil['numero1'] ?></td>
                <td><?= $afficher_profil['mail'] ?></td>
                <td><?= $afficher_profil['groupesanguin'] ?></td>
                <td>
                      <label>
                          <input type="radio" name="statut_<?= $afficher_profil['id'] ?>" value="actif" checked> Actif
                      </label>
                      <label>
                          <input type="radio" name="statut_<?= $afficher_profil['id'] ?>" value="inactif"> Inactif
                      </label>
                  </td>
                  <td>

                
                    <input type="hidden" name="id" value="<?= $afficher_profil['id'] ?>">

                    
                  <a href="mailto:" class="btn-reply">E-mail</a>
                 
              </td>
              </tr>
            <?php } ?>
          </tbody>
     </table>
    
            </section >
            
</div>
  <form method="POST" action="Bannir.php">
  <input type="text" name="id" required>
  <button type="submit" name="bannir" class="btn-reply">Bannir</button>
  </form>

    <br><br><br><br>
    <?php
      $afficher_profils = $DB->query("SELECT * FROM contact");
    ?>

      <div id="2" class="admin-messages">
        <h2>Messages de contact</h2>
        <table>

          <thead>
            <tr>
              <th>Id</th>
              <th>Nom</th>
              <th>Adresse e-mail</th>
              <th>Sujet</th>
              <th>Message</th>
            </tr>
          </thead>
          <tbody>
          <?php while ($afficher_profil = $afficher_profils->fetch()) { ?>
            <tr>
              <td><?= $afficher_profil['id'] ?></td>
              <td><?= $afficher_profil['nom'] ?></td>
              <td><?= $afficher_profil['email'] ?></td> 
              <td><?= $afficher_profil['sujet'] ?></td>
              <td><?= $afficher_profil['mssg'] ?></td>
              <td>
                    <!-- Bouton "Répondre" avec un lien vers Gmail -->
                    <a href="mailto:<?= $afficher_profil['email'] ?>" class="btn-reply">Répondre</a>
                </td>
            </tr>
          <?php } ?>
          </table>
      </div>
      <script src="js/boutton.js"></script>

      <br> <br> <br> 
      <?php
      $afficher_profils = $DB->query("SELECT * FROM receveur");
      ?>
      <div id="3" class="notifications">
        <h2>Gestion des Notifications</h2>
        <table>
        <form method ="POST" action="">
        <thead>
        <tr>
          <th>Id</th>
          <th>Nom</th>
          <th>groupage</th>
          <th>quantite</th>
          <th>numero</th>
          <th>Date/heure</th>
          <th>notification</th>
        </tr>
        </thead>
        <tbody>

        <?php while ($afficher_profil = $afficher_profils->fetch()) { ?>

        <tr>
          <td><?= $afficher_profil['id'] ?></td>
          <td><?= $afficher_profil['nom'] ?></td>
          <td> <?= $afficher_profil['groupage'] ?></td>
          <td><?= $afficher_profil['quantite'] ?></td>
          <td><?= $afficher_profil['num'] ?></td>
          <td><?php echo date('d-m-Y / H:i:s'); ?></td>
          <td> <span class="message">Une nouvelle demande de Sang </span></td>
        </tr>
        <?php } ?>
      </form>
        </table>
      
      </div>


<br>


      <section id="events" class="events">
        <div class="container" data-aos="fade-up">
        <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        h1 {
            text-align: center;
        }

        .button-container {
            display: flex;
            justify-content: space-between;
            margin-top: 30px;
        }

        .button {
            background-color: black;
            color: #fff;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 4px;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .button:hover {
            background-color: black;
        }
    </style>
          <div id="4" class="section-header">
            <h2>Gestion des événements</h2>
            <p>Retrouvez ici tous les événements passés et à venir de notre association.</p>
           <form method="POST">    
           <div class="button-container">
             
            <a href="ajouter.php " class="button">Ajouter un evenement</a>
            <a href="supprimer.php" class="button">Supprimer un evenement</a>
        </div>
           </form>
    </section>
      




</body>
</html>