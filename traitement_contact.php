<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération des données du formulaire
    $nom = $_POST["nom"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    // Validation des données (vous pouvez ajouter des validations supplémentaires selon vos besoins)

    // Envoi du message
    $destinataire = "support@gestiondecourse.com";
    $sujet = "Message de contact depuis l'application de gestion de course";
    $contenu = "Nom: $nom\n";
    $contenu .= "Email: $email\n\n";
    $contenu .= "Message:\n$message";

    // Envoi du mail
    $envoi = mail($destinataire, $sujet, $contenu);

    // Vérification de l'envoi du mail
    if ($envoi) {
        echo "<div class='alert alert-success' role='alert'>Votre message a été envoyé avec succès.</div>";
    } else {
        echo "<div class='alert alert-danger' role='alert'>Une erreur est survenue lors de l'envoi du message. Veuillez réessayer plus tard.</div>";
    }
}
?>
