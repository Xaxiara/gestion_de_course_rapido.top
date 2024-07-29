<?php
include('connexion.php');

$chauffeur_id = $_GET['id'];

$sql = "DELETE FROM chauffeurs WHERE chauffeur_id='$chauffeur_id'";
if ($connexion->query($sql) === TRUE) {
  echo "Chauffeur supprimé avec succès";
} else {
  echo "Erreur : " . $sql . "<br>" . $connexion->error;
}
?>
