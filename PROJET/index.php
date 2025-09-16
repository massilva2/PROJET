<?php
  session_start(); 
  include('bd/connexionDB.php'); 
  // On récupère les informations de tous les utilisateurs
  $afficher_profils = $DB->query("SELECT * FROM articles");

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Donate Blood</title>
  

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="css/styleIndex.css" rel="stylesheet">
</head>

<body>

  <!-- ======= Top Bar ======= -->
  <div id="topbar" class="d-flex align-items-center fixed-top">
    <div class="container d-flex justify-content-between">
      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-envelope"></i> <a href="mailto:contact@example.com">freha-ville@gmail.com</a>
        <i class="bi bi-phone"></i> 026-45-75-10
      </div>
      <div class="d-none d-lg-flex social-links align-items-center">
        <a href="https://www.facebook.com/FREHAVILLE" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="#" class="whatsapp"><i class="bi bi-whatsapp"></i></a>
        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
      </div>
    </div>
  </div>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto">
        <a href="index.php"> <img src="img/logo.png" ><span>atra</span> </a>
      </h1>
    
      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto active" href="#home">Acceuil</a></li>
          <li><a class="nav-link scrollto" href="#about">A propos</a></li>
          <li><a class="nav-link scrollto" href="#services">Evénements</a></li>      
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
      
      <button id="myBtn">Besoin de sang ?</button>
      <div id="myModal" class="modal">
        <div class="modal-content">
          <span class="close">&times;</span>
          <h2>Besoin de sang ?</h2>
          <br>
          <form method="POST" action="besoin.php">
            <div class="inputfield">
              <label for="nom">Nom & Prenom:</label>
              <input type="text" class="input" name="nom" required>
            </div>
            <br>
            <div class="inputfield">
              <label for="num">Numéro de téléphone:</label>
              <input type="text" class="input" name="num" pattern="0[5-7][0-9]{8}" required>
            </div>
            <br>
            <div class="inputfield">
              <label for="num">N° carte d'identite:</label>
              <input type="text" class="input" name="Ncard"  required>
            </div>
            <br>
            
            <label for="ville">Ville:</label>
            <select name="ville" required>
            <option value=""></option>
              <option value="Tizi-Ouzou">Tizi-Ouzou</option>
              <option value="Azazga">Azazga</option>
              <option value="Béjaïa">Béjaïa</option>
              <option value="Boghni">Boghni</option>
              <option value="Bouïra">Bouïra</option>
              <option value="Draâ Ben Khedda">Draâ Ben Khedda</option>
              <option value="Iferhounène">Iferhounène</option>
              <option value="Larbaâ Nath Irathen">Larbaâ Nath Irathen</option>
              <option value="Makouda">Makouda</option>
              <option value="Mekla">Mekla</option>
              <option value="Ouadhias">Ouadhias</option>
              <option value="Tigzirt">Tigzirt</option>
              <option value="Timizart">Timizart</option>
              <option value="Tirmitine">Tirmitine</option>
            </select>
            <br><br>
            
            <label for="Q">Quantite:</label>
            <select name="quantite" required>
            <option value=""></option>
    
              <option value="1"> 1L </option>
              <option value="2"> 2L </option>
              <option value="3"> 3L </option>
              </select>
            <br><br>

            <label for="groupage">Groupe sanguin:</label>
            <select name="groupage" required>
            <option value=""></option>
              <option value="A+">A+</option>
              <option value="A-">A-</option>
              <option value="B+">B+</option>
              <option value="B-">B-</option>
              <option value="O+">O+</option>
              <option value="O-">O-</option>
              <option value="AB+">AB+</option>
              <option value="AB-">AB-</option>
            </select>
            <br><br>
            <div class="inputfield1">
              <button type="submit" name="valider" id="myBtn" onclick="showconfi()">Valider</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <script src="js/besoin.js"></script>
  </header><!-- End Header -->



  <!-- ======= Home Section ======= -->
  <section id="home" class="d-flex align-items-center">
    <div class="container">
      <h1>Vous n'avez pas besoin <br>d'être médecin<br>pour sauver une vie</h1>
      <h2>Le don de sang est un geste simple et généreux <br> qui peut aider à sauver des vies,alors <br> n'hésitez pas à donner et à faire la différence <br> dans la vie de quelqu'un aujourd'hui</h2>
      <a href="login.php" class="btn-get-started scrollto"> Donner du sang </a>
      <a href="information.html" class="btn-get-started scrollto"> S'informer </a>
    </div>
  </section><!-- End Home -->
<br><br><br><br><br><br><br><br>
  <main id="main">
    
    <!-- ======= Featured Services Section ======= -->
    <section id="featured-services" class="featured-services">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
              <div class="icon"><i class="fas fa-heartbeat"></i></div>
              <h4 class="title"><a href="">Bien-veillance</a></h4>
              <p class="description">Chaque année, UN MILLION de malades sont soignés.</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="400">
              <div class="icon"><i class="fa fa-stethoscope"></i></div>
              <h4 class="title"><a href="">Depistage</a></h4>
              <p class="description">Pour savoir dès maintenant si vous pouvez faire un don , faites le teste et rejoignez nous .</p>
            </div>
          </div>
          
          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="300">
              <div class="icon"><i class="fas fa-hands-helping"></i></div>
              <h4 class="title"><a href="">Solidarité</a></h4>
              <p class="description">Une heure de votre temps suffit a sauver TROIS vies !</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="200">
              <div class="icon"><i class="fas fa-heart"></i></div>
              <h4 class="title"><a href="">Génerosité</a></h4>
              <p class="description">Vous vous sentez en forme ? Parfait, c'est donc le moment idéal !</p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Featured Services Section -->

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>A propos</h2>
          <p>L'association Secours Sauvetage Freha est une organisation à but non lucratif dédiée à aider les personnes en difficulté.
            Nous sommes impliqués dans plusieurs domaines, y compris la collecte de dons de sang, les secours en cas d'urgence,l'aide financière et alimentaire...
            Nous croyons en la solidarité et en l'empathie envers nos concitoyens, et nous nous efforçons de faire une différence positive dans leur vie. 
          </p>

        </div>

       <div class="row">
         <div class="col-xl-5 col-lg-6 video-box d-flex justify-content-center align-items-stretch position-relative">
           <a href="https://www.youtube.com/watch?v=lKta6hI3lx8" class="glightbox play-btn mb-4"></a>
         </div>

    <div class="col-xl-7 col-lg-6 icon-boxes d-flex flex-column align-items-stretch justify-content-center py-5 px-lg-5">
            
            <div class="icon-box">
              <div class="icon"><i class="fas fa-tint"></i></div>
              <h4 class="title"><a href="">Dons de sang</a></h4>
              <p class="description"> Nous organisons régulièrement des campagnes de dons de sang pour répondre 
                aux besoins des hôpitaux et des patients nécessitant des transfusions sanguines.</p>
            </div>

            <div class="icon-box">
              <div class="icon"><i class="fa fa-medkit"></i></div>
              <h4 class="title"><a href="">Secourisme</a></h4>
              <p class="description">Nous sommes des bénévoles 
                dévoués et engagés à aider notre communauté et à améliorer la qualité de vie de ceux qui en ont besoin. </p>
            </div>

            <div class="icon-box">
              <div class="icon"><i class="fas fa-exclamation-triangle"></i></div>
              <h4 class="title"><a href="">Urgence </a></h4>
              <p class="description">Apporter une assistance immédiate aux personnes touchées 
                par des catastrophes naturelles ou des situations d'urgence.</p>
            </div>


            <div class="icon-box">
              <div class="icon"><i class="fas fa-hand-holding-usd"></i></div>
              <h4 class="title"><a href="">Aide financières & alimentaire </a></h4>
              <p class="description">Nous offrons des aides financières et alimentaires  pour les aider 
              à surmonter les difficultés économiques et à subvenir à leurs besoins alimentaires de base.</p>
            </div>
            
          </div>
        </div>

      </div>
    </section><!-- End About Section -->

   <!-- ======= Counts Section ======= -->
  <section id="counts" class="counts">
    <div class="container" data-aos="fade-up">

      <div class="row no-gutters">

        <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
          <div class="count-box">
            <i class="fas fa-hands-helping"></i>
            <span data-purecounter-start="0" data-purecounter-end="95" data-purecounter-duration="1" class="purecounter"></span>
            <p><strong>Bénévoles</strong> engagés librement,  pour mener une action non rémunérée en direction d'autrui.</p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
          <div class="count-box">
            <i class="far fa-hospital"></i>
            <span data-purecounter-start="0" data-purecounter-end="36" data-purecounter-duration="1" class="purecounter"></span>
            <p><strong>Centres</strong></p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
          <div class="count-box">
            <i class="fas fa-users"></i>
            <span data-purecounter-start="0" data-purecounter-end="23" data-purecounter-duration="1" class="purecounter"></span>
            <p><strong>Lideurs</strong></p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
          <div class="count-box">
            <i class="fas fa-tint"></i>
            <span data-purecounter-start="0" data-purecounter-end="250" data-purecounter-duration="1" class="purecounter"></span>
            <p><strong>Donneurs potentiels</strong> </p>
          </div>
        </div>

      </div>

    </div>
  </section><!-- End Counts Section -->

 <!-- ======= Services Section ======= -->
 <section id="services" class="services">
  <form method="POST">
    <div class="container">
      <div class="section-title">
        <h2>Evénements</h2>
        <p>Notre association est une vitrine de nos activités et programmes proposés aux membres et à la communauté. Nous offrons une variété de services et de ressources pour aider nos membres à atteindre leurs objectifs personnels et professionnels. Nous sommes fiers de notre engagement envers notre communauté et nous nous efforçons de fournir des services de haute qualité pour répondre à leurs besoins.</p>
      </div>
      <?php 
      $event_count = 0; 
      while ($afficher_profil = $afficher_profils->fetch()) {
        if ($event_count % 3 == 0) { 
          echo '<div class="row justify-content-center">';
        }
      ?>
      <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0">
        <div class="ser-box">
          <img name="image" id="image" src="<?= $afficher_profil['image'] ?>" width="250" height="250">
          <h4 name="titre"><a href=""><?= $afficher_profil['titre'] ?></a></h4>
        </div>
      </div>
      <?php
        if ($event_count % 3 == 2) { 
          echo '</div>';
        }
        $event_count++; 
      }
      
      if ($event_count % 3 != 0) {
        echo '</div>';
      }
      ?>
    </div> 
  </form>
</section>
<!-- End Services Section -->


  
    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title">
          <h2>Contact</h2>
          <p>Si vous avez des questions, des commentaires ou des préoccupations, nous sommes là pour vous aider. Notre équipe de professionnels est disponible pour répondre à toutes vos demandes, par e-mail ou par téléphone. Nous sommes toujours ravis de recevoir des commentaires de nos clients et de travailler avec vous pour répondre à vos besoins. N'hésitez pas à nous contacter à tout moment, nous sommes là pour vous aider.</p>
        </div>
      </div>

      <!--Google map-->
      <div class="mapouter"><div class="gmap_canvas"><iframe class="gmap_iframe" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=1500&amp;height=400&amp;hl=en&amp;q=Freha centre &amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe><a href="https://www.gachacute.com/">Gacha Cute</a></div><style>.mapouter{position:relative;text-align:right;width:1500px;height:400px;}.gmap_canvas {overflow:hidden;background:none!important;width:1500px;height:400px;}.gmap_iframe {width:1500px!important;height:400px!important;}</style></div>
      
      <div class="container">
        <div class="row mt-5">

          <div class="col-lg-4">
            <div class="info">
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h4>Localisation:</h4>
                <p>Freha centre, la descente de la contine scolaire, immeuble orange</p>
              </div>

              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Email:</h4>
                <p>freha-ville@gmail.com</p>
              </div>

              <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>Téléphone:</h4>
                <p>026-45-75-10</p>
              </div>
            </div>
          </div>

          <div class="col-lg-8 mt-5 mt-lg-0">
            <form  method="POST" action="contact.php" >
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="nom" class="form-control" id="nom" placeholder="Nom" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
                </div>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="sujet" id="sujet" placeholder="Sujet" required>
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="mssg" rows="5" placeholder="Message" required></textarea>
              </div>
              <div class="text-center">
                <button type="submit" id="myBtn" name="Envoyer">Envoyez un message</button></div>
            </form>

          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6">
            <div class="footer-info">
              <h3>FREHA-VILLE</h3>
              <p>
                Freha Centre,<br>
                La Descente De La Cantine Scolaire, <br>
                Immeuble M'Henni,Batisse Orange<br>
                <strong>Téléphone:</strong>026-45-75-10<br>
                <strong>Email:</strong> freha-ville@gmail.com<br>
              </p>
              <div class="social-links mt-3">
                <a href="https://www.facebook.com/groups/577400563258704" class="facebook"><i class="bx bxl-facebook"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Liens </h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Acceuil</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#about">A propos</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#services">Evénements</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#contact">Contacte</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Nos événements</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Couffins Ramadan</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Formation Chauffeur Ambulancier Professionnel </a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Formation Premier Secours</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#"></a>Mataam Rahma</li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Don De Sang</a></li>
            </ul>
          </div>


        </div>
      </div>
    </div>

  
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/glightbox/js/glightbox.min.js"></script>
  <script src="vendor/php-email-form/validate.js"></script>
  <script src="vendor/purecounter/purecounter.js"></script>
  <script src="vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Template Main JS File -->
  <script src="js/main.js"></script>
  <script>
    function showconfi(){
      alert("votre demande a bien ete envoyer");
    }
</script>


</body>

</html>