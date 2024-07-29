<?php
include('../connexion.php');

if (isset($_GET['course_id'])) {
  $course_id = intval($_GET['course_id']);
  $sql = "SELECT courses.*, chauffeurs.nom, chauffeurs.prenom FROM courses JOIN chauffeurs ON courses.chauffeur_id = chauffeurs.chauffeur_id WHERE course_id = ?";
  $stmt = $connexion->prepare($sql);
  $stmt->bind_param('i', $course_id);
  $stmt->execute();
  $result = $stmt->get_result();
  
  if ($result->num_rows > 0) {
    $course = $result->fetch_assoc();
    $courseDetails = [
      'point_depart' => $course['point_depart'],
      'point_arrivee' => $course['point_arrivee'],
      'date_heure' => $course['date_heure'],
      'chauffeur' => $course['nom'] . ' ' . $course['prenom'],
      'statut' => $course['statut']
    ];
    echo json_encode($courseDetails);
  } else {
    echo json_encode(['error' => 'Course non trouvée']);
  }
}
?>
