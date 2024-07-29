<?php
include('connexion.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $id = $_POST['id'];
  $email = $_POST['email'];

  if (!empty($_POST['password'])) {
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $sql = "UPDATE users SET email='$email', password='$password' WHERE id='$id'";
  } else {
    $sql = "UPDATE users SET email='$email' WHERE id='$id'";
  }

  if ($connexion->query($sql) === TRUE) {
    echo "Utilisateur mis à jour avec succès";
  } else {
    echo "Erreur : " . $sql . "<br>" . $connexion->error;
  }
} else {
  $id = $_GET['id'];
  $sql = "SELECT * FROM users WHERE id='$id'";
  $result = $connexion->query($sql);
  $user = $result->fetch_assoc();
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Éditer un Utilisateur</title>
</head>
<body>
  <form action="edit_user.php" method="post">
    <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
    <label for="email">Email :</label>
    <input type="email" name="email" value="<?php echo $user['email']; ?>" required><br>
    <label for="password">Mot de passe (laisser vide pour ne pas changer) :</label>
    <input type="password" name="password"><br>
    <input type="submit" value="Mettre à jour">
  </form>
</body>
</html>
