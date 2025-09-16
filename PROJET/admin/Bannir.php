<?php

$servername = "localhost:3309";
$username = "root";
$password = "";
$dbname = "projet";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Échec de la connexion à la base de données : " . $e->getMessage());
}

if (isset($_POST['bannir'])) {
    $id = $_POST['id'];

    try {
        $stmt = $conn->prepare("DELETE FROM inscription WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        echo "Utilisateur banni avec succès.";
    } catch (PDOException $e) {
        echo "Erreur lors de la suppression de l'utilisateur : " . $e->getMessage();
    }
}
?>
