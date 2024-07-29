<?php
include('connexion.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $nom = $_POST['nom'];
  $prenom = $_POST['prenom'];
  $telephone = $_POST['telephone'];
  $sexe = $_POST['sexe'];
  $disponible = $_POST['disponible'];

  $sql = "INSERT INTO chauffeurs (nom, prenom, telephone, sexe, disponible) VALUES ('$nom', '$prenom', '$telephone', '$sexe', '$disponible')";
  if ($connexion->query($sql) === TRUE) {
    echo "Nouveau chauffeur ajouté avec succès";
  } else {
    echo "Erreur : " . $sql . "<br>" . $connexion->error;
  }
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Ajouter un Chauffeur</title>
</head>
<body>
  <form action="add_chauffeur.php" method="post">
    <label for="nom">Nom :</label>
    <input type="text" name="nom" required><br>
    <label for="prenom">Prénom :</label>
    <input type="text" name="prenom" required><br>
    <label for="telephone">Téléphone :</label>
    <input type="text" name="telephone" required><br>
    <label for="sexe">Sexe :</label>
    <select name="sexe" required>
      <option value="M">Masculin</option>
      <option value="F">Féminin</option>
    </select><br>
    <label for="disponible">Disponible :</label>
    <input type="checkbox" name="disponible" value="1"><br>
    <input type="submit" value="Ajouter">
  </form>
</body>
</html>
