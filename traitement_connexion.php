<?php
session_start();

// Connexion à la base de données
include ("../connexion.php");

if ($connexion->connect_error) {
    die("Connection failed: " . $connexion->connect_error);
}

// Récupération des données du formulaire
$email = $_POST['email'];
$password = $_POST['password'];

// Vérification des informations d'identification
$sql = "SELECT * FROM users WHERE email = ?";
$stmt = $connexion->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Récupération de l'utilisateur
    $user = $result->fetch_assoc();

    // Vérification du mot de passe
    if (password_verify($password, $user['password'])) {
        // Informations d'identification correctes
        $_SESSION['email'] = $email;
        header("Location: ../vues/profil_utilisateur_App.php");
        exit();
    } else {
        // Mot de passe incorrect
        echo "Adresse e-mail ou mot de passe incorrect.";
    }
} else {
    // Utilisateur non trouvé
    echo "Adresse e-mail ou mot de passe incorrect.";
}

$stmt->close();
$connexion->close();
?>
