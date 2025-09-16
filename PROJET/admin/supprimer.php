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
if (isset($_POST['supprimer'])) {
    $id = $_POST['id'];

    try {
        $stmt = $conn->prepare("DELETE FROM articles WHERE id=:id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        echo "Événement supprimé avec succès.";
    } catch (PDOException $e) {
        echo "Erreur lors de la suppression de l'événement : " . $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>.container {
  max-width: 800px;
  margin: 0 auto;
  padding: 20px;
}

.form-group {
  margin-bottom: 20px;
}

label {
  display: block;
  font-weight: bold;
}

input[type="text"],
textarea {
  width: 100%;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 4px;
}

button {
  padding: 10px 20px;
  background-color: black;
  color: #fff;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

button:hover {
  background-color: #0069d9;
}</style>
</head>
<body>

    
<div class="container">
  <div class="section-title">
    <h2>Supprimer l'article</h2>
  </div>
  <form method="POST">
    <div class="form-group">
      <label for="id">ID de l'article à supprimer:</label>
      <input type="text" class="form-control" id="id" name="id" placeholder="Entrez l'ID de l'article" required>
    </div>
    <button type="submit" name="supprimer" class="btn btn-danger">Supprimer l'article</button>
  </form>
</div>

</body>
</html>