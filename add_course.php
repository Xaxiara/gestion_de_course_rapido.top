<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ajouter une Course</title>
  <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>
<body>
<div class="container mt-4">
  <h2>Ajouter une Course</h2>
  <form action="add_course.php" method="POST">
    <div class="form-group">
      <label for="point_depart">Point de départ</label>
      <input type="text" class="form-control" id="point_depart" name="point_depart" required>
    </div>
    <div class="form-group">
      <label for="point_arrivee">Point d'arrivée</label>
      <input type="text" class="form-control" id="point_arrivee" name="point_arrivee" required>
    </div>
    <div class="form-group">
      <label for="date_heure">Date et heure</label>
      <input type="datetime-local" class="form-control" id="date_heure" name="date_heure" required>
    </div>
    <div class="form-group">
      <label for="chauffeur_id">Chauffeur</label>
      <select class="form-control" id="chauffeur_id" name="chauffeur_id" required>
        <option value="">Sélectionner un chauffeur</option>
        <?php
        include('connexion.php');
        $sql = "SELECT * FROM chauffeurs";
        $result = $connexion->query($sql);
        if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
            echo "<option value='{$row['chauffeur_id']}'>{$row['nom']} {$row['prenom']}</option>";
          }
        }
        ?>
      </select>
    </div>
    <div class="form-group">
      <label for="statut">Statut</label>
      <select class="form-control" id="statut" name="statut" required>
        <option value="">Sélectionner un statut</option>
        <option value="En attente">En attente</option>
        <option value="En cours">En cours</option>
        <option value="Terminé">Terminé</option>
      </select>
    </div>
    <button type="submit" class="btn btn-primary">Ajouter la Course</button>
    <a href="index.php" class="btn btn-secondary">Annuler</a>
  </form>
</div>

<script src="../js/jquery-3.5.1.min.js"></script>
<script src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
include('connexion.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $point_depart = $_POST['point_depart'];
  $point_arrivee = $_POST['point_arrivee'];
  $date_heure = $_POST['date_heure'];
  $chauffeur_id = $_POST['chauffeur_id'];
  $statut = $_POST['statut'];

  $sql = "INSERT INTO courses (point_depart, point_arrivee, date_heure, chauffeur_id, statut) VALUES ('$point_depart', '$point_arrivee', '$date_heure', '$chauffeur_id', '$statut')";
  if ($connexion->query($sql) === TRUE) {
    echo "Nouvelle course ajoutée avec succès";
  } else {
    echo "Erreur : " . $sql . "<br>" . $connexion->error;
  }
}
?>