<?php
include('connexion.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $email = $_POST['email'];
  $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

  $sql = "INSERT INTO users (email, password) VALUES ('$email', '$password')";
  if ($connexion->query($sql) === TRUE) {
    echo "Nouvel utilisateur ajouté avec succès";
  } else {
    echo "Erreur : " . $sql . "<br>" . $connexion->error;
  }
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Ajouter un Utilisateur</title>
</head>
<body>
  <form action="add_user.php" method="post">
    <label for="email">Email :</label>
    <input type="email" name="email" required><br>
    <label for="password">Mot de passe :</label>
    <input type="password" name="password" required><br>
    <input type="submit" value="Ajouter">
  </form>
</body>
</html>
