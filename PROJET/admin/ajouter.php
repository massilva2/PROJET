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

ini_set('display_errors','0');
if (isset($_POST['titre']) && isset($_FILES['image'])) {
    $titre = $_POST['titre'];
    $image = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];

    // Déplacez le fichier téléchargé vers un dossier de destination
    $destination = "img\\" . $image;
    move_uploaded_file($image_tmp, $destination);

    try {
        $stmt = $conn->prepare("INSERT INTO articles (titre, image) VALUES (:titre, :image)");
        $stmt->bindParam(':titre', $titre);
        $stmt->bindParam(':image', $destination);
        $stmt->execute();
        echo "Article ajouté avec succès.";
    } catch (PDOException $e) {
        echo "Erreur lors de l'ajout de l'article : " . $e->getMessage();
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
</head>
<body>
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
    <div class="container">
        <div class="section-title">
          <h2>Ajouter un article</h2>
        </div>
        <form method="POST"enctype="multipart/form-data">
          <div class="form-group">
            <label for="titre">Titre de l'article:</label>
            <input type="text" class="form-control" id="titre" name="titre" placeholder="Entrez le titre de l'article" required>
          </div>
          <div class="form-group">
            <label for="image">Image:</label>
            <input type="file" class="form-control-file" id="image" name="image" required>
          </div>
          <button type="submit" class="btn btn-primary">Ajouter l'article</button>
        </form>
      </div>
</body>
</html>