<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Connexion à la base de données
    include ("connexion.php");
    
    // Récupération des données du formulaire
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    
    if ($password !== $confirm_password) {
        echo "Les mots de passe ne correspondent pas.";
        exit();
    }
    
    // Hachage du mot de passe
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);
    
    // Insertion de l'utilisateur dans la base de données
    $sql = "INSERT INTO users (email, password) VALUES (?, ?)";
    $stmt = $connexion->prepare($sql);
    $stmt->bind_param("ss", $email, $hashed_password);
    
    if ($stmt->execute()) {
        echo "Inscription réussie. Vous pouvez maintenant vous connecter.";
        header("Location: connexionApp.php");
        exit();
    } else {
        echo "Erreur : " . $stmt->error;
    }
    
    $stmt->close();
    $connexion->close();
}
    ?>
    
