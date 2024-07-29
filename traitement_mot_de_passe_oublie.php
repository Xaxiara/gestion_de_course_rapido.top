<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Connexion à la base de données
    include ("../connexion.php");

    // Récupération des données du formulaire
    $email = $_POST['email'];

    // Vérification si l'e-mail existe dans la base de données
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $connexion->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Génération d'un nouveau mot de passe temporaire
        $new_password = bin2hex(random_bytes(4)); // Génère un mot de passe aléatoire de 8 caractères
        $hashed_password = password_hash($new_password, PASSWORD_BCRYPT);

        // Mise à jour du mot de passe dans la base de données
        $update_sql = "UPDATE users SET password = ? WHERE email = ?";
        $update_stmt = $connexion->prepare($update_sql);
        $update_stmt->bind_param("ss", $hashed_password, $email);

        if ($update_stmt->execute()) {
            // Envoi de l'e-mail avec le nouveau mot de passe
            $to = $email;
            $subject = "Réinitialisation de votre mot de passe";
            $message = "Bonjour,\n\nVotre nouveau mot de passe est : $new_password\n\nMerci de le changer après votre première connexion.\n\nCordialement,\nL'équipe support de gestion des courses chez Rapido.Top";
            $headers = "From: no-reply@votre_domaine.com";

            if (mail($to, $subject, $message, $headers)) {
                echo "<script>alert('Un e-mail avec votre nouveau mot de passe a été envoyé.'); window.location.href = 'connexion.php';</script>";
            } else {
                echo "Erreur lors de l'envoi de l'e-mail.";
            }
        } else {
            echo "Erreur lors de la mise à jour du mot de passe : " . $update_stmt->error;
        }
    } else {
        echo "Aucun compte trouvé avec cette adresse e-mail.";
    }

    $stmt->close();
    $connexion->close();
}
?>