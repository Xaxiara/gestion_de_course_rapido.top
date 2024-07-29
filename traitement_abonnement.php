<?php
// Connexion à la base de données
include ("connexion.php");

// Vérifier la connexion
if ($connexion->connect_error) {
  die("Échec de la connexion : " . $connexion->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Récupérer l'adresse e-mail du formulaire
  $email = $_POST["email"];

  // Valider l'adresse e-mail
  if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    // Préparer la requête SQL pour insérer l'adresse e-mail
    $stmt = $connexion->prepare("INSERT INTO subscribers (email) VALUES (?)");
    $stmt->bind_param("s", $email);

    // Exécuter la requête
    if ($stmt->execute()) {
      echo "Merci pour votre abonnement !";
    } else {
      if ($connexion->errno == 1062) {
        // Gérer les erreurs d'adresse e-mail en double
        echo "Cette adresse e-mail est déjà abonnée.";
      } else {
        // Gérer d'autres erreurs
        echo "Erreur : " . $stmt->error;
      }
    }

    // Fermer la déclaration
    $stmt->close();
  } else {
    echo "Adresse e-mail invalide.";
  }
}

// Fermer la connexion
$connexion->close();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Accueil - Gestion de Coursiers</title>
  <!-- Intégration Bootstrap 4 -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  
    <!-- Modal de Confirmation d'Abonnement -->
<div class="modal fade" id="subscribeModal" tabindex="-1" role="dialog" aria-labelledby="subscribeModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="subscribeModalLabel">Abonnement Réussi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Merci pour votre abonnement !
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" href="indexApp.php">Fermer</button>
      </div>
    </div>
  </div>
</div>

</html>