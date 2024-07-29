<?php
include('connexion.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $course_id = $_POST['course_id'];
  $point_depart = $_POST['point_depart'];
  $point_arrivee = $_POST['point_arrivee'];
  $date_heure = $_POST['date_heure'];
  $chauffeur_id = $_POST['chauffeur_id'];
  $statut = $_POST['statut'];

  if (isset($_POST['statut'])) {
    $statut = $_POST['statut'];
} else {
    // Le cas où la clé 'statut' n'est pas définie
    $statut = 'En cours'; // valeur par défaut appropriée
}

  $sql = "UPDATE courses SET point_depart='$point_depart', point_arrivee='$point_arrivee', date_heure='$date_heure', chauffeur_id='$chauffeur_id', statut='$statut' WHERE course_id='$course_id'";
  if ($connexion->query($sql) === TRUE) {
    echo "Course mise à jour avec succès";
  } else {
    echo "Erreur : " . $sql . "<br>" . $connexion->error;
  }
} else {
  $course_id = $_GET['id'];
  $sql = "SELECT * FROM courses WHERE course_id='$course_id'";
  $result = $connexion->query($sql);
  $course = $result->fetch_assoc();
}
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Editer la course</title>
        <link rel="stylesheet" href="../css/bootstrap.min.css">
    </head>
<body>
<div class="container mt-4">
  <form action="edit_course.php" method="post">
    <input type="hidden" name="course_id" value="<?php echo $course['course_id']; ?>">
    <label for="point_depart">Point de Départ :</label>
    <input type="text" name="point_depart" value="<?php echo $course['point_depart']; ?>" required><br>
    <label for="point_arrivee">Point d'Arrivée :</label>
    <input type="text" name="point_arrivee" value="<?php echo $course['point_arrivee']; ?>" required><br>
    <label for="date_heure">Date et Heure :</label>
    <input type="datetime-local" name="date_heure" value="<?php echo $course['date_heure']; ?>" required><br>
    <label for="chauffeur_id">Chauffeur :</label>
    <select name="chauffeur_id">
      <?php
      $sql = "SELECT chauffeur_id, nom, prenom FROM chauffeurs";
      $result = $connexion->query($sql);
      while ($row = $result->fetch_assoc()) {
        $selected = $row['chauffeur_id'] == $course['chauffeur_id'] ? "selected" : "";
        echo "<option value='" . $row['chauffeur_id'] . "' $selected>" . $row['nom'] . " " . $row['prenom'] . "</option>";
      }
      ?>
    </select><br>
    <label for="statut">Statut :</label>
        <select name="course_id">
        <?php
        $sql = "SELECT statut FROM courses";
        $result = $connexion->query($sql);
        while ($row = $result->fetch_assoc()) {
            $selected = $row['course_id'] == $course['course_id'] ? "selected" : "";
            echo "<option value='" . $row['course_id'] . "' $selected>" . $row['statut'] ."</option>";
        }
        ?>
        </select><br>
    <input type="submit" value="Mettre à jour">
  </form>
    
  <script src="../js/jquery-3.5.1.min.js"></script>
  <script src="../js/bootstrap.bundle.min.js"></script>


  <script>
    // Attendre que la page soit complètement chargée
    $(document).ready(function() {
      // Écouter l'événement de soumission du formulaire
      $('#editCourseForm').on('submit', function(e) {
        e.preventDefault(); // Empêcher la soumission par défaut

        // Envoyer les données du formulaire via AJAX ou traiter le formulaire normalement ici
        $.ajax({
          url: $(this).attr('action'),
          method: $(this).attr('method'),
          data: $(this).serialize(),
          success: function(response) {
            // Redirection vers index.php après succès
            window.location.href = "index.php";
          },
          error: function(xhr, status, error) {
            console.error('Erreur lors de la soumission du formulaire : ' + error);
          }
        });
      });
    });
  </script>
</body>
</html>
