<?php
    session_start();
    include("bd/connexionDB.php");
    ini_set('display_errors','0');

 
    if(!empty($_POST)){
    extract($_POST);
    $valid = true;
 
 
    if (isset($_POST['inscription'])){
    $nom = htmlentities(trim($nom)); 
    $mail = htmlentities(strtolower(trim($mail))); 
    $ville = htmlentities(trim($ville)); 
    $userPassword= trim($userPassword); 
    $numero1 = trim($numero1); 
    $numero2 = trim($numero2); 
    $typedon = trim($typedon); 
    $groupesanguin = trim($groupesanguin);
    $typecnx = trim($typecnx);
    $dispo = trim($dispo);
    
   
    if(empty($nom)){
    $valid = false;
    $er_nom = ("Le nom d' utilisateur ne peut pas être vide");
    }
    

 
    $errors = array();
    if (!preg_match('/^0[5-7][0-9]{8}$/', $numero1)) {
        $errors[] = "Le premier numéro de téléphone n'est pas valide.";
    }
    if (!preg_match('/^0[5-7][0-9]{8}$/', $numero2)) {
        $errors[] = "Le deuxième numéro de téléphone n'est pas valide.";
    }
    if ($numero1 === $numero2) {
        $errors[] = "Les numéros de téléphone doivent être différents.";
    }



 
    if(empty($mail)){
    $valid = false;
    $er_mail = "Le mail ne peut pas être vide";
    
  
    }elseif(!preg_match("/^[a-z0-9\-_.]+@[a-z]+\.[a-z]{2,3}$/i", $mail)){
    $valid = false;
    $er_mail = "Le mail n'est pas valide";
 
    }else{
    

    $req_mail = $DB->query("SELECT mail FROM inscription WHERE mail = ?",
    array($mail));
    
    $req_mail = $req_mail->fetch();
    
    if ($req_mail['mail'] <> ""){
    $valid = false;
    $er_mail = "Ce mail existe déjà";
    }
    }

 

    if(empty($userPassword)) {
    $valid = false;
    $er_mdp = "Le mot de passe ne peut pas être vide";
    
    }
 
  
    if($valid){
        $userPassword = crypt($userPassword, "$6$500iuytrdxcvbnmjhytgfdt$");
    
   
    $DB->insert("INSERT INTO inscription (nom, mail, userPassword, ville, numero1, numero2, typedon,  groupesanguin, typecnx, dispo) VALUES
    (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)",
    array($nom, $mail, $userPassword, $ville, $numero1, $numero2, $typedon,  $groupesanguin, $typecnx, $dispo ));
    
    header('Location: login.php');
    exit;
    }
    }
    }
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donate</title>
    
</head>
<body>
    <style>
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body {
  background-color: #f2f2f2;
  background-image: url("img/image.jpg");
  background-repeat: no-repeat;
  background-size: 100%;
}

.wrapper {
  max-width: 600px;
  margin: 50px auto;
  background-color: #fff;
  padding: 20px;
  border-radius: 5px;
  box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
}

.wrapper .title {
  font-size: 24px;
  font-weight: bold;
  margin-bottom: 20px;
}

.wrapper .form {
  display: flex;
  flex-wrap: wrap;
}



.wrapper .form .inputfield {
  width: 100%;
  margin-bottom: 15px;
  align-items: center;
}

.wrapper .form .inputfield label {
  display: flex;
  margin-bottom: 8px;
}


.wrapper .form .inputfield .input{
  width: 100%;
  outline: none;
  border: 1px solid #d5dbd9;
  font-size: 15px;
  padding: 8px 10px;
  border-radius: 3px;
  transition: all 0.3s ease;
  
}
.wrapper .form .inputfield .custom_select{
  position: relative;
  width: 100%;
  height: 37px;
}

.wrapper .form .inputfield .custom_select:before{
  content: "";
  position: absolute;
  top: 12px;
  right: 10px;
  border: 8px solid;
  border-color: #b1aeae transparent transparent transparent;
  pointer-events: none;
}

.wrapper .form .inputfield .custom_select select{
  -webkit-appearance: none;
  -moz-appearance:   none;
  appearance:        none;
  outline: none;
  width: 100%;
  height: 100%;
  border: 0px;
  padding: 8px 10px;
  font-size: 15px;
  border: 1px solid #d5dbd9;
  border-radius: 3px;
}


.wrapper .form .inputfield .input:focus,
.wrapper .form .inputfield .textarea:focus,
.wrapper .form .inputfield .custom_select select:focus{
  border: 1px solid #000000;
}

.wrapper .form .inputfield p{
   font-size: 14px;
   color: #757575;
}

.wrapper .form .inputfield:last-child{
  margin-bottom: 0;
}


.error1, .error2 {
  display: none;
  color: red;
  font-size: 14px;
  margin-top: 5px;
}

.error1:before, .error2:before {
  content: "⚠️ ";
}


input[type="password"] {
  display: block;
  width: 100%;
  padding: 0.5rem;
  font-size: 1rem;
  border: 2px solid #ccc;
  border-radius: 0.25rem;
  transition: border-color 0.2s ease-in-out;
}

input[type="password"]:focus {
  outline: none;
  border-color: #f45e5e;
}

.inputfield1 button {
  background-color: #800000;
  color: #fff;
  border: none;
  border-radius: 5px;
  padding: 10px;
  cursor: pointer;
  width: 550px;
}
  
.inputfield1 button[type="submit"]:hover {
  background-color: #dd0e07;
}

@media (max-width:420px) {
  .wrapper .form .inputfield{
    flex-direction: column;
    align-items: flex-start;
  }
  .wrapper .form .inputfield label{
    margin-bottom: 5px;
  }
  .wrapper .form .inputfield.terms{
    flex-direction: row;
  }
  .inputfield1 button {
    padding: 5px;
    width: 50px;
 }
}
    </style>
    <div class="wrapper">
        <div class="title">
          Inscription
        </div>
        <form method="POST">
            <div class="form">
            <div class="inputfield">
                <label>Nom d'utilisateur : </label>
                <?php
                // S'il y a une erreur sur le nom alors on affiche
                if (isset($er_nom)){
                ?>
                <div><?= $er_nom ?></div>
                <?php
                }
                ?>
                <input class="input" type="text"  name="nom" value="<?php if(isset($nom)){ echo $nom; }?>" required>
            </div>  
            <div class="inputfield">
               <label>Adresse email : </label>
                <?php
                if (isset($er_mail)){
                ?>
                <div ><?= $er_mail ?></div>
                <?php
                }
                ?>
                <input class="input" type="email" name="mail" value="<?php if(isset($mail)){ echo $mail; }?>" required>
            </div>

            <div class="inputfield">
                    <label for="password">Mot de passe :</label>
                    <?php
                    if (isset($er_mdp)){
                    ?>
                    <div  ><?= $er_mdp ?></div>
                    <?php
                    }
                    ?>
                    <input  type="password" class="input" name="userPassword" value="<?php if(isset($mdp)){ echo $mdp; }?>"  required>
            </div>
            <div class="inputfield">
                <label>Ville : </label>
                <div class="custom_select">
                    <select type="text" name="ville" required>
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
                    
                </div>
                </div> 

                <div class="inputfield">
                    <label>Numéro de téléphone N°1 :</label>
                    <input type="text" class="input" name="numero1" pattern="0[5-7][0-9]{8}" required>
                    <div class="error1" >Le numero saisie est incorrect</div>
                    <div class="error2" style="display: none;">Les numéros de téléphone doivent être différents.</div>
                </div> 
                <div class="inputfield">
                    <label>Numéro de téléphone N°2:</label>
                    <input type="text" class="input" name="numero2" pattern="0[5-7][0-9]{8}" >
                    <div class="error1">Le numero saisie est incorrect</div>
                    <div class="error2" style="display: none;">Les numéros de téléphone doivent être différents.</div>
                </div> 
            
                <div class="inputfield">
                    <label>Groupe sanguin : </label>
                    <div class="custom_select">
                    <select name="groupesanguin" type="text" required>
                        <option value=""></option> 
                        <option value="A+">A+</option> 
                        <option value="A-">A-</option> 
                        <option value="B+">B+</option> 
                        <option value="B-">B-</option> 
                        <option value="O-">O-</option> 
                        <option value="O+">O+</option> 
                        <option value="AB+">AB+</option> 
                        <option value="AB-">AB-</option> 
                    </select>
                </div>
            </div> 
               <div class="inputfield">
                    <label>Type de don : </label>
                    <div class="custom_select">
                    <select name="typedon" type="text" required>
                        <option value=""></option>
                        <option value="sang total">Sang total</option> 
                        <option value="aphérèse">Aphérèse</option> 
                        <option value=" plasma"> Plasma</option> 
                        <option value="plaquettes ">Plaquettes</option>  
                    </select>
                </div>
                <div class="inputfield">
                    <label>Type de connexion : </label>
                    <div class="custom_select">
                    <select name="typecnx" type="text" required>
                        <option value=""></option> 
                        <option value="Message">Message</option> 
                        <option value="Appel">Appel</option> 
                        <option value="Message & Appel ">Message & Appel</option>  
                    </select>
                </div>
            </div> 
            <div class="inputfield">
                <label>Disponibilite : </label>
                <div class="custom_select">
                    <select type="text"  name="dispo" required>
                        <option value=""></option>
                        <option value="">24 heures</option> 
                        <option value="">6:00 to 18:00 </option> 
                        <option value="">18:00 to 6:00 </option>  
                    </select>
                </div>
            </div> 
            <div class="inputfield1">
                <button type="submit" name="inscription">S'inscrire</button>
            </div>
            </div>
        </form>
        
    </div>

    <script src="js/worning.js"></script>
    
</body>
</html>
