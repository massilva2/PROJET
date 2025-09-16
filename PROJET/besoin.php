<?php
    //la cnx a la base de donnee
    $_servername ="localhost:3309";
    $username ="root";
    $dbpassword=""; 
    $dbname ="projet";
    $msgval = "Nom d'utilisateur ou mot de passe incorrect";
    

    try {
        $conn = new PDO("mysql:host=$_servername;dbname=$dbname", $username, $dbpassword);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo "la connexion a ete bien etablie";
    } 
    catch(PDOException $e) {
        echo "la connexion a echoue" . $e->getMessage();
    }

    if(isset($_POST['valider'])) {
        $nom = $_POST['nom'];
        $num = $_POST['num'];
        $Ncard = $_POST['Ncard'];
        $ville = $_POST['ville']; 
        $quantite = $_POST['quantite']; 
        $groupage = $_POST['groupage'];
        
        
        if (!preg_match('/^0[5-7][0-9]{8}$/', $num)) {
            echo "Le numéro de téléphone n'est pas valide.";
        }    
        else {

        }

        $sql = " INSERT INTO receveur ( nom, num , Ncard, ville , quantite ,groupage) 
        VALUES (:nom , :num, :Ncard, :ville , :quantite ,:groupage)";

        $stmt = $conn -> prepare($sql);

        $stmt->bindParam(':nom', $nom);       
        $stmt->bindParam(':num', $num);
        $stmt->bindParam(':Ncard', $Ncard);
        $stmt->bindParam(':ville', $ville);
        $stmt->bindParam(':quantite', $quantite);
        $stmt->bindParam(':groupage', $groupage);

        $stmt->execute();
        header('Location: index.php');
    }
    
   

?>
