<?php
include('connexion.php');

$id = $_GET['id'];

$sql = "DELETE FROM users WHERE id='$id'";
if ($connexion->query($sql) === TRUE) {
  echo "Utilisateur supprimé avec succès";
} else {
  echo "Erreur : " . $sql . "<br>" . $connexion->error;
}
?>
