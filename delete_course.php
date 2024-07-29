<?php
include('connexion.php');

$course_id = $_GET['id'];

$sql = "DELETE FROM courses WHERE course_id='$course_id'";
if ($connexion->query($sql) === TRUE) {
  echo "Course supprimée avec succès";
} else {
  echo "Erreur : " . $sql . "<br>" . $connexion->error;
}
?>
