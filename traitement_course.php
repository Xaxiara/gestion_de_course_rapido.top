-------------------------------------------------------
------------Script de traitement_course----------------

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