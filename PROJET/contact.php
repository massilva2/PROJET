<?php
    //la cnx a la base de donnee
    $_servername ="localhost:3309";
    $username ="root";
    $dbpassword=""; 
    $dbname ="projet";

    

    try {
        $conn = new PDO("mysql:host=$_servername;dbname=$dbname", $username, $dbpassword);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo "la connexion a ete bien etablie";
    } 
    catch(PDOException $e) {
        echo "la connexion a echoue" . $e->getMessage();
    }

    $email = "example@example.com"; // Remplacez par l'adresse e-mail à vérifier

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Votre message a bien ete envoye.";
    } else {
        echo "L'adresse e-mail est invalide.";
    }

    if(isset($_POST['Envoyer'])) {
        $nom = $_POST['nom'];
        $email= $_POST['email'];
        $sujet= $_POST['sujet']; 
        $mssg = $_POST['mssg'];
        if (!empty($nom)) {
            $sql = " INSERT INTO contact ( nom, email , sujet , mssg) VALUES (:nom , :email, :sujet,:mssg)";

            $stmt = $conn -> prepare($sql);

            $stmt->bindParam(':nom', $nom);       
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':sujet', $sujet);
            $stmt->bindParam(':mssg', $mssg);

            $stmt->execute();
        }
    }
    
   

?>
