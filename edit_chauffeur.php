<?php
include('connexion.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $chauffeur_id = $_POST['chauffeur_id'];
  $nom = $_POST['nom'];
  $prenom = $_POST['prenom'];
  $telephone = $_POST['telephone'];
  $sexe = $_POST['sexe'];
  $disponible = isset($_POST['disponible']) ? 1 : 0;

  $sql = "UPDATE chauffeurs SET nom='$nom', prenom='$prenom', telephone='$telephone', sexe='$sexe', disponible='$disponible' WHERE chauffeur_id='$chauffeur_id'";
  if ($connexion->query($sql) === TRUE) {
    echo "Chauffeur mis à jour avec succès";
  } else {
    echo "Erreur : " . $sql . "<br>" . $connexion->error;
  }
} else {
  $chauffeur_id = $_GET['id'];
  $sql = "SELECT * FROM chauffeurs WHERE chauffeur_id='$chauffeur_id'";
  $result = $connexion->query($sql);
  $chauffeur = $result->fetch_assoc();
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Éditer un Chauffeur</title>
</head>
<body>
  <form action="edit_chauffeur.php" method="post">
    <input type="hidden" name="chauffeur_id" value="<?php echo $chauffeur['chauffeur_id']; ?>">
    <label for="nom">Nom :</label>
    <input type="text" name="nom" value="<?php echo $chauffeur['nom']; ?>" required><br>
    <label for="prenom">Prénom :</label>
    <input type="text" name="prenom" value="<?php echo $chauffeur['prenom']; ?>" required><br>
    <label for="telephone">Téléphone :</label>
    <input type="text" name="telephone" value="<?php echo $chauffeur['telephone']; ?>" required><br>
    <label for="sexe">Sexe :</label>
    <select name="sexe" required>
      <option value="M" <?php echo $chauffeur['sexe'] == 'M' ? 'selected' : ''; ?>>Masculin</option>
      <option value="F" <?php echo $chauffeur['sexe'] == 'F' ? 'selected' : ''; ?>>Féminin</option>
    </select><br>
    <label for="disponible">Disponible :</label>
    <input type="checkbox" name="disponible" value="1" <?php echo $chauffeur['disponible'] == 1 ? 'checked' : ''; ?>><br>
    <input type="submit" value="Mettre à jour">
  </form>
</body>
</html>
